<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use HasTranslations;
    protected $fillable = [
        'Name',
        'notes',
        'user_add',

    ];
    public $translatable = ['Name'];
    protected $table = 'providers';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    public function user_types(){
        return $this->belongsTo (User_type::class, 'id_type');
    }
}
