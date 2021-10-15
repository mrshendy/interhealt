<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider_Category extends Model
{

    use HasTranslations;
    protected $fillable = [
        'Name',
        'notes',
        'id_type',
        'user_add',

    ];
    public $translatable = ['Name'];
    protected $table = 'Provider_Category';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    public function user_types(){
        return $this->belongsTo (User_type::class, 'id_type');
    }
}
