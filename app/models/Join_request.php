<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Join_request extends Model 
{
    protected $fillable = [
        'Name',
        'phone',
        'email',
        'user_type_id',
        'Specialization_id',
        'Address',
        'lat',
        'long',
        'Agree_to_the_terms',
        
    ];
    protected $table = 'Join_request';
    public $timestamps = true;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

}