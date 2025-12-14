<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\Models\Tenant;

class TenantInstall extends Command
{
    protected $signature = 'tenant:install {slug}';
    protected $description = 'Crea la base de datos del tenant, migra y ejecuta el seeder';

    public function handle()
    {
        $slug = $this->argument('slug');

        // 1. Buscar tenant en core
        $tenant = Tenant::where('slug', $slug)->first();

        if (! $tenant) {
            $this->error("No existe un tenant con slug '{$slug}'");
            return Command::FAILURE;
        }

        $dbName = $tenant->database;

        // 2. Crear base física si no existe (core)
        $this->info("Verificando base de datos {$dbName}...");

        DB::statement(
            "CREATE DATABASE IF NOT EXISTS `$dbName` 
             CHARACTER SET utf8mb4 
             COLLATE utf8mb4_unicode_ci"
        );

        $this->info("✔ Base verificada/creada: {$dbName}");

        // 3. Configurar conexión tenant
        Config::set('database.connections.tenant.database', $dbName);

        DB::purge('tenant');
        DB::reconnect('tenant');

        $this->info("✔ Conexión tenant activada dinámicamente");

        // 4. Migraciones del tenant
        $this->info("Ejecutando migraciones del tenant...");
        Artisan::call('migrate', [
            '--database' => 'tenant',
            '--path'     => 'database/migrations/tenant',
            '--force'    => true,
        ]);
        $this->info(Artisan::output());

        // 5. Seeder del tenant
        $this->info("Ejecutando seeder del tenant...");
        Artisan::call('db:seed', [
            '--database' => 'tenant',
            '--class'    => 'TenantDatabaseSeeder',
            '--force'    => true,
        ]);
        $this->info(Artisan::output());

        $this->info("🎉 Tenant '{$slug}' instalado correctamente.");
        return Command::SUCCESS;
    }
}
