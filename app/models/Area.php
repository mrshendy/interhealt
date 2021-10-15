<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasTranslations;
    protected $fillable = [
        'Name',
        'notes',
        'user_add',

    ];
    public $translatable = ['Name'];
    protected $table = 'Area';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    public function Government(){
        return $this->belongsTo (Government::class, 'Id_government');
    }
    public function Countries(){
        return $this->belongsTo (Countries::class, 'Id_country');
    }
    public function city(){
        return $this->belongsTo (city::class, 'id_city');
    }
}
