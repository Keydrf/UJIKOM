<?php

namespace App\Models;

use App\Models\Negara;
use App\Models\Olimpiade;
use App\Models\CabangOlahraga;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemenang extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function negara()
    {
        return $this->belongsTo(Negara::class, 'id_negara', 'id');
    }
    public function olimpiade()
    {
        return $this->belongsTo(Olimpiade::class, 'id_nama', 'id');
    }
    public function cabangolahraga()
    {
        return $this->belongsTo(CabangOlahraga::class, 'id_cabangolahraga', 'id');
    }
}
