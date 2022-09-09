<?php

namespace App\Models;

use App\Models\Pemenang;
use App\Models\Negara;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medali extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function negaras()
    {
        return $this->belongsTo(Negara::class, 'negara', 'id');
    }
    public function pemenangs()
    {
        return $this->belongsTo(Pemenang::class, 'emas', 'id');
    }
}
