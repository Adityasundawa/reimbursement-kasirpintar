<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reimbursements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->decimal('amount', 8, 2);
            $table->longText('subject')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('user_created');
            $table->unsignedBigInteger('user_approved')->nullable();
            $table->enum('status', ['waiting', 'rejected', 'approved'])->default('waiting');
            $table->text('file')->nullable();
            $table->boolean('read')->default(false);
            $table->longText('description_reason')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_created')->references('id')->on('users');
            $table->foreign('user_approved')->references('id')->on('users');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reimbursement');
    }
};
