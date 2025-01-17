<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallary extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function album(){
        return $this->belongsTo(Album::class);  // One to Many relationship with Album model
    }
}
