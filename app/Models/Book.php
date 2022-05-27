<?php

namespace App\Models;

use App\Helpers\Media\Src\IMedia;
use App\Helpers\Media\Src\MediaInitialization;
use Illuminate\Database\Eloquent\Model;

class Book extends Model implements IMedia
{
    use MediaInitialization;

    public function setMainDirectoryPath(): string
    {
        return "book";
    }
    protected $table = "book";
    protected $fillable = [];

    public function category(){
        return $this->belongsTo( SubCategory::class, "category_id");
    }

    public function getFullNameAttribute(){
        return  $this->getFullName($this->category);
    }

    public function comment(){
        return $this->hasMany(BookComment::class, "book_id");
    }

    //Logicly Methods
    private function getFullName($category) : string{
        $name = '';
        if($category->parent) {
            $name = $this->getFullName($category->parent);
            $name .= $category->name;
        }else{
            $name .= $category->main->name . " - ";
            $name .= $category->name;
        }
        if($category->level < $category->main->limit_levels_of_sub_categories)
            $name .= " - ";
        return $name;
    }
}
