<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('loan_id');
            $table->string('user_id', 255)->nullable();
            $table->integer('refered_by')->nullable();
            $table->decimal('loan_amount', 15);
            $table->integer('interest_rate')->nullable();
            $table->integer('loan_term')->nullable();
            $table->string('loan_type', 199)->nullable();
            $table->string('financing_type', 255)->nullable();
            $table->string('bank_service', 255)->nullable();
            $table->string('monthly_emi', 255)->nullable();
            $table->string('full_name', 500)->nullable();
            $table->string('residence_address', 500)->nullable();
            $table->string('office_address', 500)->nullable();
            $table->string('firm_company_name', 255)->nullable();
            $table->integer('work_experience')->nullable();
            $table->date('business_estabish_date')->nullable();
            $table->string('nature_of_work', 255)->nullable();
            $table->string('qualification', 255)->nullable();
            $table->string('month_one_net_salary', 255)->nullable();
            $table->string('month_one_grosssalary', 255)->nullable();
            $table->string('month_two_net_salary', 255)->nullable();
            $table->string('month_two_grosssalary', 255)->nullable();
            $table->string('month_three_net_salary', 255)->nullable();
            $table->string('month_three_grosssalary', 255)->nullable();
            $table->string('year_one_netprofit', 255)->nullable();
            $table->string('year_one_depreciation', 255)->nullable();
            $table->string('year_one_loaninterest', 255)->nullable();
            $table->string('year_one_grossprofit', 255)->nullable();
            $table->string('year_one_sales', 255)->nullable();
            $table->string('year_two_netprofit', 255)->nullable();
            $table->string('year_two_depreciation', 255)->nullable();
            $table->string('year_two_loaninterest', 255)->nullable();
            $table->string('year_two_grossprofit', 255)->nullable();
            $table->string('year_two_sales', 255)->nullable();
            $table->string('year_three_netprofit', 255)->nullable();
            $table->string('year_three_depreciation', 255)->nullable();
            $table->string('year_three_loaninterest', 255)->nullable();
            $table->string('year_three_grossprofit', 255)->nullable();
            $table->string('year_three_sales', 255)->nullable();
            $table->date('dob')->nullable();
            $table->string('marital_status', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('mobile', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('zip_code', 255)->nullable();
            $table->string('exist_loan_type', 255)->nullable();
            $table->decimal('exist_loan_amount', 15)->nullable();
            $table->string('exist_tenor_of_loan', 255)->nullable();
            $table->decimal('exist_emi', 15)->nullable();
            $table->date('exist_sanction_dt')->nullable();
            $table->string('exist_emi_bounce', 255)->nullable();
            $table->string('cibil_problem', 255)->nullable();
            $table->string('loan_requirement', 255)->nullable();
            $table->string('job_business_profile', 255)->nullable();
            $table->string('purpose_of_loan', 255)->nullable();
            $table->string('extra_income', 255)->nullable();
            $table->string('profession_type', 255)->nullable();
            $table->longText('note')->nullable();
            $table->integer('status')->comment('0-Inprocess/1-doumentspending/2-Approved/2-Rejected');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
