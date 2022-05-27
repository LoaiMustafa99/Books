<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookFavorite extends Model
{
    public function book(){
        return $this->belongsTo(Book::class, "book_id");
    }
}
