<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title'); //   255 character limit (2^8 -1)
            $table->text('content'); // 65635 character limit (2^16 -1) 
            $table->bigInteger('user_account_id')->unsigned();
            $table->dateTime('posted_at');
            $table->integer('pinned_position')->nullable(); // null is equivalent to -inf when sorting

            $table->foreign('user_account_id')->references('id')->on('user_accounts')
            ->onDelete('cascade')->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
