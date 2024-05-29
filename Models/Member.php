<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory;
    use SoftDeletes;

    //public function books()
//{
    //return $this->hasMany(Book::class);
    
//}
    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
