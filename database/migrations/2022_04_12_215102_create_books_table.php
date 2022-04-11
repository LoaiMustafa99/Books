<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->bigInteger("user_id")->unsigned()->index();
            $table->tinyInteger("is_admin")->comment("0: not Admin 1: admin")->default(0);
            $table->string("full_name");
            $table->text("description");
            $table->integer("age");
            $table->date("made_year");
            $table->bigInteger("category_id")->unsigned()->index();

            $table->foreign("category_id")->references("id")->on("sub_categories")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign("user_id")->references("id")->on("users")->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('books');
    }
}
