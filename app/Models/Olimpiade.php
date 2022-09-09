<?php

namespace App\Models;

use App\Models\CabangOlahraga;
use App\Models\Negara;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Olimpiade extends Model
{
    use HasFactory;

    protected $table = 'olimpiade';
    protected $guarded = [];

    public function negara()
    {
        return $this->belongsTo(Negara::class, 'id_negara', 'id');
    }
    public function cabangolahraga()
    {
        return $this->belongsTo(CabangOlahraga::class, 'id_olimpiade', 'id');
    }
}
