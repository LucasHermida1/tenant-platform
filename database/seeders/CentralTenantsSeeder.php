<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CentralTenantsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $tenants = [
            [
                'slug'            => 'ait',
                'name'            => 'Asociación de Instructores de Taekwondo',
                'domain'          => null,
                'database'        => 'tenant_ait',

                // Branding básico
                'logo_path'       => 'logos/tenant/ait-logo.png',
                'primary_color'   => '#1e40af',
                'secondary_color' => '#facc15',

                'active'          => true,
            ],
            [
                'slug'            => 'citi',
                'name'            => 'CITI Taekwondo',
                'domain'          => null,
                'database'        => 'tenant_citi',

                // Branding básico
                'logo_path'       => 'logos/tenant/citi-logo.png',
                'primary_color'   => '#0f172a',
                'secondary_color' => '#64748b',

                'active'          => true,
            ],
            [
                'slug'            => 'assut',
                'name'            => 'ASSUT Taekwondo',
                'domain'          => null,
                'database'        => 'tenant_assut',

                // Branding básico
                'logo_path'       => 'logos/tenant/assut-logo.png',
                'primary_color'   => '#991b1b', // rojo institucional (ejemplo)
                'secondary_color' => '#fecaca', // rojo claro para highlights

                'active'          => true,
            ],
        ];

        foreach ($tenants as $tenant) {
            DB::table('tenants')->updateOrInsert(
                ['slug' => $tenant['slug']],
                array_merge($tenant, [
                    'created_at' => $now,
                    'updated_at' => $now,
                ])
            );
        }
    }
}
