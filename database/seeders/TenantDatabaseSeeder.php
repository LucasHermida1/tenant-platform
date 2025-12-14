<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TenantDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $conn = DB::connection('tenant');
        $now  = now();

        /**
         * ======================
         * ROLES BASE
         * ======================
         */
        $roles = [
            'admin'      => 'Administrador',
            'instructor' => 'Instructor',
            'alumno'     => 'Alumno',
        ];

        foreach ($roles as $slug => $label) {
            $conn->table('roles')->updateOrInsert(
                ['slug' => $slug],
                [
                    'label'      => $label,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }

        /**
         * ======================
         * USUARIO ADMIN PRINCIPAL
         * ======================
         */
        $adminRoleId = $conn->table('roles')
            ->where('slug', 'admin')
            ->value('id');

        $conn->table('users')->updateOrInsert(
            ['email' => 'admin@tenant.com'],
            [
                'name'       => 'Administrador',
                'password'   => Hash::make('123456'),
                'role_id'    => $adminRoleId,
                'theme'      => 'light',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        /**
         * ======================
         * USUARIOS DEMO
         * ======================
         */
        $demoUsers = [
            [
                'name'  => 'Instructor Demo',
                'email' => 'instructor@tenant.com',
                'role'  => 'instructor',
            ],
            [
                'name'  => 'Alumno Demo',
                'email' => 'alumno@tenant.com',
                'role'  => 'alumno',
            ],
            [
                'name'  => 'Alumno Avanzado',
                'email' => 'alumno2@tenant.com',
                'role'  => 'alumno',
            ],
        ];

        foreach ($demoUsers as $user) {
            $roleId = $conn->table('roles')
                ->where('slug', $user['role'])
                ->value('id');

            $conn->table('users')->updateOrInsert(
                ['email' => $user['email']],
                [
                    'name'       => $user['name'],
                    'password'   => Hash::make('123456'),
                    'role_id'    => $roleId,
                    'theme'      => 'light',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }

        /**
         * ======================
         * TENANT SETTINGS (BRANDING PROFUNDO)
         * ======================
         *
         * El branding se define según la base del tenant
         * resuelta previamente por tenant:install
         */
        $databaseName = $conn->getDatabaseName();

        $branding = match ($databaseName) {
            'tenant_ait' => [
                'brand_name'      => 'Asociación de Instructores de Taekwondo',
                'slogan'          => 'Disciplina, respeto y evolución',
                'logo_path'       => 'logos/tenant/ait-logo.png',
                'primary_color'   => '#1e40af',
                'secondary_color' => '#facc15',
                'accent_color'    => '#0f172a',
            ],

            'tenant_citi' => [
                'brand_name'      => 'CITI Taekwondo',
                'slogan'          => 'Formación, técnica y compromiso',
                'logo_path'       => 'logos/tenant/citi-logo.png',
                'primary_color'   => '#1e40af',
                'secondary_color' => '#6499e3ff',
                'accent_color'    => '#020617',
            ],

            'tenant_assut' => [
                'brand_name'      => 'ASSUT Taekwondo',
                'slogan'          => 'Tradición, técnica y valores',
                'logo_path'       => 'logos/tenant/assut-logo.png',
                'primary_color'   => '#1e40af',
                'secondary_color' => '#6499e3ff',
                'accent_color'    => '#020617',
            ],

            default => [
                'brand_name'      => 'Tenant',
                'slogan'          => null,
                'logo_path'       => null,
                'primary_color'   => '#1e40af',
                'secondary_color' => '#64748b',
                'accent_color'    => '#0f172a',
            ],
        };

        $conn->table('tenant_settings')->updateOrInsert(
            ['id' => 1],
            array_merge($branding, [
                'created_at' => $now,
                'updated_at' => $now,
            ])
        );
    }
}
