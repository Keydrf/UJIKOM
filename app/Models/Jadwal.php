<?php

namespace App\Models;

use App\Models\Negara;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function negara1()
    {
        return $this->belongsTo(Negara::class, 'id_negara1', 'id');
    }
    public function negara2()
    {
        return $this->belongsTo(Negara::class, 'id_negara2', 'id');
    }
    public function cabangolahraga()
    {
        return $this->belongsTo(CabangOlahraga::class, 'id_cabangolahraga', 'id');
    }
}
