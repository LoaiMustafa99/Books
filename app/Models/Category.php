<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Category extends Model
{
    protected $fillable = ["name"];
    protected $table = "category";

    public function book(){
        return $this->hasMany(Book::class, "category_id");
    }

    public function subCategories(){
        return $this->hasMany(SubCategory::class, "main_id", "id");
    }


    // Queries Methods
    public function SubCategoriesLevel1(){
        $instance = $this->subCategories();
        $instance->getQuery()->where("parent_id", "=", null);
        return $instance;
    }

    public static function getShownInHomePage(){
        return Category::join("sections", "main_categories.section_id", "=", "sections.id")
            ->where("sections.is_categories_view_in_home_page", true)
            ->where("main_categories.status",true)
            ->get(["main_categories.id as id", "main_categories.name_en as name_en" ,
                "main_categories.name_ar as name_ar", "main_categories.limit_levels_of_sub_categories as limit_levels_of_sub_categories"]);
    }

}
