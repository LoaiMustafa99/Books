<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ["name"];
    protected $table = "category";

    public function book(){
        return $this->hasMany(Book::class, "category_id");
    }
}
