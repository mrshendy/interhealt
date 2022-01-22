<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requests extends Model 
{
    protected $fillable = [
        'Patient_name',
        'date_of_birth',
        'email',
        'phone_number',
        'gender',
        'notes',
        'sender_id',
        'status '
    ];

    protected $table = 'Requests';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}