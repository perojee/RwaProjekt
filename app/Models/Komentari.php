<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentari extends Model 
{
    public function artikli()
    {
        return $this->belongsTo(Artikli::class, "artikal_id");
    }
    use HasFactory;
}
