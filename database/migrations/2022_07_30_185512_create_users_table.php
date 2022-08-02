<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->string('email', 255)->nullable()->unique();
            $table->string('password', 255);
            $table->rememberToken();
            $table->string('avatar', 255)->nullable()->default('users/default.png');
            $table->string('day_telephone', 255)->nullable();
            $table->string('extension', 255)->nullable();
            $table->string('fax', 255)->nullable();
            $table->unsignedBigInteger('authorize_net_id')->nullable();
            $table->char('certificate', 255)->nullable();
            $table->boolean('active')->default(false);
            $table->boolean('can_delete')->default(false);
            $table->boolean('subscribe')->default(false);
            $table->boolean('tax_exempt')->default(false);
            $table->string('tax_exemption_certificate', 255)->nullable();
            $table->boolean('provide_tax_exemption_later')->default(false);
            $table->unsignedInteger('status_id')->default(1);
            $table->string('business_name', 255)->nullable();
            $table->integer('role_id')->default(3);
            $table->unsignedInteger('address_id')->nullable();
            $table->string('last_name', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('company_name', 255)->nullable();
            $table->string('address1', 255)->nullable();
            $table->string('address2', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('zipcode', 255)->nullable();
            $table->integer('update_permissoin')->default(0);
            $table->string('contact_number', 255)->nullable();
            $table->string('optional_contact_number', 255)->nullable();
            $table->string('adhar_card', 255)->nullable();
            $table->string('pan_card', 255)->nullable();
            $table->string('food_license', 255)->nullable();
            $table->string('gst_certificate', 255)->nullable();
            $table->string('residential_certificate', 255)->nullable();
            $table->date('DOB')->nullable();
            $table->string('gst_number', 255)->nullable();
            $table->float('wallet', 15)->nullable();
            $table->unsignedInteger('seller_id')->nullable();
            $table->integer('otp')->nullable();
            $table->dateTime('otp_time')->nullable();
            $table->integer('is_varified')->nullable()->default(0);
            $table->string('reffered_by', 255)->nullable();
            $table->integer('cim_no')->nullable();
            $table->text('password_show')->nullable();
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
        Schema::dropIfExists('users');
    }
}
