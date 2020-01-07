<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('invoice_tax', ['tax_tax', 'tax_flat','tax_off'])->nullable();
            $table->enum('invoice_currency', ['yuan','pound','euro','pakistani_rupee','durham','malaysian_ranggit','dollar'])->nullable();
            $table->enum('invoice_discount', ['discount_discount', 'flat_Discount','discount_off'])->nullable();
            $table->string('invoice_name')->nullable();
            $table->date('invoice_billing_date')->nullable();
            $table->date('invoice_due_date')->nullable();
            $table->string('invoice_img')->nullable();
            ////////////////////////////////////////////////
            $table->string('billfrom_business_name')->nullable();
            $table->string('billfrom_addres_line_one')->nullable();
            $table->string('billfrom_addres_line_tow')->nullable();
            $table->string('billfrom_phone')->nullable();
            $table->string('billfrom_email')->nullable();
            $table->string('billfrom_additional_info')->nullable();
            //...............................................
            $table->string('billto_business_name')->nullable();
            $table->string('billto_addres_line_one')->nullable();
            $table->string('billto_addres_line_tow')->nullable();
            $table->string('billto_phone')->nullable();
            $table->string('billto_email')->nullable();
            $table->string('billto_additional_info')->nullable();
            ////////////////////////////////////////////////
            $table->string('invoice_extra_notes')->nullable();
            $table->string('invoice_use_the_space')->nullable();
            $table->string('invoice_select_acolor')->nullable();
            $table->string('invoice_label_stamp')->nullable();
            $table->string('invoice_signature')->nullable();
            $table->string('invoice_designation')->nullable();
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
        Schema::dropIfExists('invos');
    }
}
