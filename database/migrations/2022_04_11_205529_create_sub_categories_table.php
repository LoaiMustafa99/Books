<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->bigInteger("main_id")->unsigned()->index();
            $table->smallInteger("level")->default(1);
            $table->bigInteger("parent_id")->unsigned()->index()->nullable();

            $table->foreign("main_id")->references("id")->on("category")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("parent_id")->references("id")->on("sub_categories")->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_categories');
    }
}
