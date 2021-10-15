<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_type extends Model
{
    use HasTranslations;
    protected $fillable = [
        'type_name',
        'User_types',
        'notes',
    ];

    public $translatable = ['type_name'];
    protected $table = 'User_types';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
   
}
