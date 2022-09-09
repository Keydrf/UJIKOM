<?php

namespace App\Models;

use App\Models\Pemenang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Negara extends Model
{
    // use SoftDeletes;
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = "id";
    protected $fillable = ['id', 'nama'];
    // protected $dates = ['deleted_at'];

    public function pemenang()
    {
        return $this->hasMany(Pemenang::class, 'id_negara', 'id');
    }

    public function olimpiade()
    {
        return $this->hasMany(Olimpiade::class, 'id_negara', 'id');
    }

    // protected static function boot(){
    //     parent::boot();

    //     static::deleting(function($negara) {
    //         $relationMethods = ['olimpiade', 'pemenang'];

    //         foreach ($relationMethods as $relationMethod) {
    //             if ($negara->$relationMethod()->count() > 0) {
    //                 return false;
    //             }
    //         }
    //     });
    // }


}
