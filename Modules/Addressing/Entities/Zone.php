<?php

namespace Modules\Addressing\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Zone extends Model
{
    use HasFactory;

    protected $table = 'add_zone';
    protected $fillable = [
        'countries', 'lvl1', 'lvl2', 'lvl3', 'lvl4', 'type',
        'code', 'name', 'description', 'active'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'active',
    ];
    protected static function newFactory()
    {
        return \Modules\Addressing\Database\factories\ZoneFactory::new();
    }
}
