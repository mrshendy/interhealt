<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class provider_attachments extends Model
{

    protected $fillable = [
        'path',
        'Name_file',
        'id_provider',
        'id_type_file',  
        'Id_from_action',
        'user_add',
    ];
    protected $table = 'provider_attachments';
    public $timestamps = true;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    
}
