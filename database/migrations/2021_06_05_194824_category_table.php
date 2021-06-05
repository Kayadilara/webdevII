<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
        });

        DB::statement("ALTER TABLE products DROP COLUMN type");
        DB::statement("ALTER TABLE products ADD COLUMN category_id int");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE products DROP COLUMN category_id");
        DB::statement("ALTER TABLE products ADD COLUMN type varchar(255)");
        Schema::dropIfExists('categories');
    }
}
