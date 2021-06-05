<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ModifyImageColumnProduct extends Migration
{
    public function up()
    {
        DB::statement("ALTER TABLE products MODIFY COLUMN image MEDIUMBLOB");
    }

    public function down()
    {
        DB::statement("ALTER TABLE products MODIFY COLUMN image BLOB");
    }
}
