<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "book";
    protected $fillable = [];

    public function category(){
        return $this->belongsTo( SubCategory::class, "category_id");
    }
}
