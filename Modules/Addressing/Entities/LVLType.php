<?php

namespace Modules\Addressing\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LVLType extends Model
{
    use HasFactory;

    protected $table = 'add_lvltype';
    protected $fillable = ['name', 'description', 'active'];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'active',
    ];
    protected static function newFactory()
    {
        return \Modules\Addressing\Database\factories\LVLTypeFactory::new();
    }
}
