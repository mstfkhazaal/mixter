<?php

namespace Modules\Addressing\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LVL3 extends Model
{
    use HasFactory;

    protected $table = 'add_lvl3';
    protected $fillable = ['code', 'name', 'lvl3', 'type', 'description', 'active'];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'active',
    ];
    protected static function newFactory()
    {
        return \Modules\Addressing\Database\factories\LVL3Factory::new();
    }
}
