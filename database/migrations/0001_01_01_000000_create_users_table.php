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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenant_id')->nullable();
            $table->string('uuid')->unique();
            $table->string('username')->unique();
            $table->integer('account_type')->default(2); // 0 - root/admin, 1-member ---------- 90 - odu root
            $table->integer('account_status')->default(0); // 0 - Pending KYC or Incomplete + 2 active members and an outsider to endorse application, 1- Awaiting Review or Under Review , 2- After review (declined/blocked), 3 - Approved (Pending Payment)  Minimum Share Capital and pay a Registration Fee, 4 - Payment Verifying or Awaiting Activation, 5- Approved and active, 5 - Approved and active member , 6 - Dormant , 7 - suspended, 8 - Withdrawn, 9 -	Expelled or Terminated

            $table->boolean('is_on_probation')->default(true);

            $table->string('phone')->unique();
            $table->string('photo')->nullable();
            $table->string('email')->unique();
            $table->boolean('require_login_mfa')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('email_verification')->default(false);
            $table->string('email_verification_code')->nullable();
            $table->timestamp('email_verification_code_expires_at')->nullable();
            $table->boolean('admin_privilege')->default(false);
            $table->string('password');
            $table->string('last_seen_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
