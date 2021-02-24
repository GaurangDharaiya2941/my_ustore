<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductExtraDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_extra_details', function (Blueprint $table) {
            $table->id();
			$table->integer('product_id');
			$table->longText('customized_fields')->nullable();
			$table->longText('extra_packages')->nullable();
			$table->string('delivery_notes')->nullable();
			$table->longText('pickup_time')->nullable();
			$table->longText('setup_time')->nullable();
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
        Schema::dropIfExists('product_extra_details');
    }
}
