<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $table = 'languages';
    protected $fillable = ['name', 'code', 'is_rtl', 'active'];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'active',
    ];
}
