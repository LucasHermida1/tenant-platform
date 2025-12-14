<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * TenantSetting
 *
 * Representa la configuración global del tenant.
 * Se espera UNA sola fila por base de datos de tenant.
 *
 * Ejemplos de uso:
 * - branding (nombre, logo, colores)
 * - settings generales del tenant
 */
class TenantSetting extends Model
{
    /**
     * Forzar conexión del tenant
     */
    protected $connection = 'tenant';

    /**
     * Tabla asociada
     */
    protected $table = 'tenant_settings';

    /**
     * Campos permitidos
     */
    protected $fillable = [
        'brand_name',
        'slogan',
        'logo_path',
        'primary_color',
        'secondary_color',
        'accent_color',
    ];

    /**
     * Timestamps
     * Ajustá a false si tu tabla no los tiene
     */
    public $timestamps = true;
}
