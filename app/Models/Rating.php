<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = "rating";
    protected $fillable = ["user_id", "book_id", "number_rating"];
}
