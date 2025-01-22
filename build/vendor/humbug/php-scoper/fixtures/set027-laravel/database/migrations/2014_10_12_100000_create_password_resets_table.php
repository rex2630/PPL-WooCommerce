<?php

namespace PPLCZVendor;

use PPLCZVendor\Illuminate\Support\Facades\Schema;
use PPLCZVendor\Illuminate\Database\Schema\Blueprint;
use PPLCZVendor\Illuminate\Database\Migrations\Migration;
class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}
\class_alias('PPLCZVendor\\CreatePasswordResetsTable', 'CreatePasswordResetsTable', \false);
