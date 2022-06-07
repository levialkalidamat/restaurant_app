<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idDelivery');
            $table->integer('quantityVente');
            $table->decimal('priceVente', 8, 2);
            $table->decimal('totalVente', 8, 2);
            $table->decimal('changeVente', 8, 2)->default(0);
            $table->string('typePaymentVente')->default('cash');
            $table->string('statusPaymentVente')->default('payé');
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
        Schema::dropIfExists('ventes');
    }
};
