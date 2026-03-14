<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingPageSetting extends Model
{
    protected $table = 'landing_page_settings';

    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'cta_text',
        'show_categories',
        'show_featured',
        'featured_count',
    ];

    protected $casts = [
        'show_categories' => 'boolean',
        'show_featured'   => 'boolean',
        'featured_count'  => 'integer',
    ];

    /**
     * Devuelve el único registro de configuración, o lo crea con valores por defecto.
     */
    public static function getSettings(): self
    {
        return self::firstOrCreate([], [
            'hero_title'       => 'El Futuro es Plegable.',
            'hero_subtitle'    => 'Descubre la tecnología más avanzada del mercado.',
            'cta_text'         => 'Ver productos',
            'show_categories'  => true,
            'show_featured'    => true,
            'featured_count'   => 8,
        ]);
    }
}