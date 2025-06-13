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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone', 15)->nullable()->after('email');
            $table->date('date_of_birth')->nullable()->after('phone')->index();
            $table->string('address')->nullable()->after('date_of_birth');
            $table->string('city')->nullable()->after('address');
            $table->string('country')->nullable()->after('city');
            $table->string('occupation')->nullable()->after('country');
            $table->string('role')->default('user'); // or enum
            $table->enum('status', ['Active', 'Inactive', 'Suspended'])->default('Active')->after('occupation');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'first_name', 'last_name', 'phone', 'date_of_birth',
                'address', 'city', 'country', 'occupation', 'status', 'role'
            ]);
        });
    }

};
