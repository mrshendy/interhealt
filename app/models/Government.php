<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
class Government extends Model
{

    use HasTranslations;
    protected $fillable = [
        'Name',
        'notes',
        'user_add',

    ];
    public $translatable = ['Name'];
    protected $table = 'Government';
    public $timestamps = true;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    public function Countries(){
        return $this->belongsTo (Countries::class, 'Id_country');
    }


}
