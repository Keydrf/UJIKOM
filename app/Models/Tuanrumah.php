<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuanrumah extends Model
{
    use HasFactory;
    protected $table = 'tuanrumahs';
    protected $guarded = [];
    // protected $dates = ['tanggal'];
    public function negara()
    {
        return $this->belongsTo(Negara::class, 'id_tuanrumah', 'id');
    }
}
