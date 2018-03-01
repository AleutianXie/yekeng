<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date')->comment('借款日期');
            $table->string('name')->comment('借款人');
            $table->string('id_no')->comment('借款人身份证号');
            $table->string('spouse')->comment('借款人配偶');
            $table->string('spouse_id_no')->comment('借款人配偶身份证号码');
            $table->string('cautioner')->comment('担保人');
            $table->unsignedDecimal('amount')->comment('借款金额');
            $table->string('agreement')->comment('借款合同');
            $table->string('receipt')->comment('票据');
            $table->string('comment')->nullable()->comment('备注');
            $table->unsignedTinyInteger('status')->default(0)->comment('状态：默认(0),还款中(1),结清(2)');
            $table->unsignedInteger('creater')->comment('创建人');
            $table->foreign('creater')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('interests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('loan_id')->comment('借款ID');
            $table->foreign('loan_id')->references('id')->on('loans');
            $table->string('month')->comment('应还款月份');
            $table->decimal('amount')->comment('还款金额');
            $table->string('receipt')->comment('票据');
            $table->string('comment')->nullable()->comment('备注');
            $table->unsignedInteger('creater')->comment('创建人');
            $table->foreign('creater')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repayments');
        Schema::dropIfExists('loans');
    }
}
