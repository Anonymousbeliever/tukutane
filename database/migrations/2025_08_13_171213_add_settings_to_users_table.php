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
            $table->string('theme_preference')->default('light')->after('role');
            $table->string('notification_preference')->default('all')->after('theme_preference');
            $table->string('language_preference')->default('en')->after('notification_preference');
            $table->boolean('email_notifications')->default(true)->after('language_preference');
            $table->boolean('push_notifications')->default(true)->after('email_notifications');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'theme_preference',
                'notification_preference', 
                'language_preference',
                'email_notifications',
                'push_notifications'
            ]);
        });
    }
};
