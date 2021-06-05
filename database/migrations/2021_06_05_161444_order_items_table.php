<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class OrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function(Blueprint $table)
        {
            $table->id();

            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('order_id')->constrained('orders');
            $table->integer('quantity');

            $table->timestamps();
        });

        DB::statement("ALTER TABLE orders ADD COLUMN fname varchar(255)");
        DB::statement("ALTER TABLE orders ADD COLUMN lname varchar(255)");
        DB::statement("ALTER TABLE orders ADD COLUMN street varchar(255)");
        DB::statement("ALTER TABLE orders ADD COLUMN housenumber int");
        DB::statement("ALTER TABLE orders ADD COLUMN city varchar(255)");
        DB::statement("ALTER TABLE orders ADD COLUMN total int");

        Schema::dropIfExists('order_product');
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');

        DB::statement("ALTER TABLE orders DROP COLUMN fname");
        DB::statement("ALTER TABLE orders DROP COLUMN lname ");
        DB::statement("ALTER TABLE orders DROP COLUMN street");
        DB::statement("ALTER TABLE orders DROP COLUMN housenumber");
        DB::statement("ALTER TABLE orders DROP COLUMN city");
        DB::statement("ALTER TABLE orders DROP COLUMN total");

        Schema::create('order_product', function(Blueprint $table)
        {
            $table->id();

            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('order_id')->constrained('orders');

            $table->integer('price');
            $table->integer('quantity');

            $table->timestamps();
        });
    }
}
