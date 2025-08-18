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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
        $table->string('username')->unique();
        $table->string('password');
        $table->string('first_name')->nullable();
        $table->string('last_name')->nullable();
        $table->string('admin_type')->default('super_admin'); // super_admin, staff, etc.
        $table->string('account_status')->default('pending');  // active, suspended, pending
        $table->rememberToken();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
