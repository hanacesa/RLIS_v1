<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function member()
    {
        return $this->belongsTo(member::class);
    }
    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
