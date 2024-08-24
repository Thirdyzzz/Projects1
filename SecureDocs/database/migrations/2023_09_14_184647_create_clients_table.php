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
        Schema::create('clients', function (Blueprint $table) {
            $table->client_id();
            $table->string("client_submitby");
            $table->string("client_fname");
            $table->string("client_mname")->nullable();
            $table->string("client_sname");
            $table->string("client_contactnum");
            $table->string("client_emailadd");
            $table->string("client_permadd");
            $table->string("client_bill_status");
            $table->string("client_bill")->nullable();
            $table->string("client_type")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
