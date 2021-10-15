<?php


namespace App\models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialtiy extends Model
{
    use HasTranslations;
    protected $fillable = [
        'Name',
        'notes',
        'Servicetype_id',
        'user_add',

    ];
    public $translatable = ['Name'];
    protected $table = 'Specialties';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    public function service_types(){
        return $this->belongsTo (service_type::class, 'Servicetype_id');
    }

}
