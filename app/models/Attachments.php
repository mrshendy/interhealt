<?php


namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachments extends Model 
{
    protected $fillable = [
        'Name_file',
        'Api_name',
        'Id_from_action',
        'user_add',
     
    ];

    protected $table = 'attachments';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}