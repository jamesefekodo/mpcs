<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicSystemSetting extends Model
{
    use HasFactory;
    protected $table = 'basic_system_settings';
    protected $fillable = [
        'maintenance_mode',
        'association_name',
        'association_acronym',
        'association_logo',
        'association_slogan',
        'description',
        'account_balance',
    ];

    // caset attributes
    protected function casts(): array
    {
        return [
            'maintenance_mode' => 'boolean',
        ];
    }
}
