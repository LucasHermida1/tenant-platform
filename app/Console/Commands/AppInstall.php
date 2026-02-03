<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class AppInstall extends Command
{
    protected $signature = 'app:install';
    protected $description = 'Instala la aplicación completa (core + tenants demo)';

    public function handle(): int
    {
        $this->info('🚀 Iniciando instalación de la aplicación');

        /**
         * 1. Verificar .env
         */
        if (!File::exists(base_path('.env'))) {
            $this->error('No existe el archivo .env. Copiá .env.example primero.');
            return Command::FAILURE;
        }

        /**
         * 2. APP_KEY
         */
        if (empty(config('app.key'))) {
            $this->info('Generando APP_KEY...');
            Artisan::call('key:generate', ['--force' => true]);
            $this->info(Artisan::output());
        } else {
            $this->info('✔ APP_KEY ya existe');
        }

        /**
         * 3. Migraciones core
         */
        $this->info('Ejecutando migraciones core...');
        Artisan::call('migrate', ['--force' => true]);
        $this->info(Artisan::output());

        /**
         * 4. Seed tenants centrales
         */
        $this->info('Seed de tenants centrales...');
        Artisan::call('db:seed', [
            '--class' => 'CentralTenantsSeeder',
            '--force' => true,
        ]);
        $this->info(Artisan::output());

        /**
         * 5. Instalar tenants demo
         */
        $tenants = ['ait', 'citi', 'assut'];

        foreach ($tenants as $slug) {
            $this->info("Instalando tenant: {$slug}");
            Artisan::call('tenant:install', [
                'slug' => $slug,
            ]);
            $this->info(Artisan::output());
        }

        /**
         * 6. Final
         */
        $this->newLine();
        $this->info('🎉 Instalación completada correctamente');
        $this->info('Accedé a: http://127.0.0.1:8000');
        $this->info('Usuarios demo:');
        $this->line(' admin@tenant.com / 123456');
        $this->line(' instructor@tenant.com / 123456');
        $this->line(' alumno@tenant.com / 123456');

        return Command::SUCCESS;
    }
}
