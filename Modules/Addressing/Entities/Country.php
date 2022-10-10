<?php

namespace Modules\Addressing\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    protected $table = 'add_countries';
    protected $fillable = ['code', 'name', 'phone_code', 'active'];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'active',
    ];
    protected static function newFactory()
    {
        return \Modules\Addressing\Database\factories\CountryFactory::new();
    }
}
