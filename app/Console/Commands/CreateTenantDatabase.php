<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateTenantDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:create-db {id}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tenant = \App\Models\Tenant::find($this->argument('id'));

        if (!$tenant) {
            $this->error('Tenant no encontrado.');
            return;
        }

        try {
            DB::statement("CREATE DATABASE `{$tenant->database}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

            $this->info("Base de datos creada correctamente: {$tenant->database}");
        } catch (\Exception $e) {
            $this->error("No se pudo crear la base: " . $e->getMessage());
        }
    }
}
