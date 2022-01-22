<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class details_request extends Model 
{
    protected $fillable = [
        'id_request',
        'id_Transfer_type',
        'id_specialty',
        'id_conversion_purpose',
        'Request_execution_date',
        'convert_to_type',
        'Id_country',
        'Id_government',
        'id_city',
        'id_Area',
        'id_service_provider_group',
        'user_add',
    ];

    protected $table = 'details_request';
    public $timestamps = true;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

}