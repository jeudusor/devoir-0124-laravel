<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    public function secteur() {

        return $this->belongsTo(Secteur::class);
    }

    public function user() {

        return $this->belongsTo(User::class);
    }
}
