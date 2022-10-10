<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageCode extends Model
{
    use HasFactory;
    protected $table = 'language_codes';
    protected $fillable = ['code', 'value',];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function getList($lang)
    {
        return $this->all();
    }
}
