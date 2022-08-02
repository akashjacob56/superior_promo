<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->increments('id');
            $table->string('office_hours', 255);
            $table->string('toll_free', 12);
            $table->string('local_no', 12);
            $table->string('fax', 20);
            $table->string('general_information', 30);
            $table->string('salesandquotes', 30);
            $table->string('art_department', 30);
            $table->string('billing_question', 30);
            $table->string('samples_requests', 30);
            $table->longText('address_superiorpromos_inc');
            $table->longText('mailing_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_us');
    }
}
