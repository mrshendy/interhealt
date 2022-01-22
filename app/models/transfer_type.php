<?php


namespace App\models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class transfer_type extends Model
{
    use HasTranslations;
    protected $fillable = [
        'Name',
        'user_add',

    ];
    public $translatable = ['Name'];
    protected $table = 'transfer_type';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
  

}
