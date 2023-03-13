<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikli extends Model
{
    public function komentari()
    {
        return $this->hasMany(Komentari::class, "artikal_id");
    }
    use HasFactory;
}
