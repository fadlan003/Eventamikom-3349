<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('partners', function (Blueprint $table) {
            if (! Schema::hasColumn('partners', 'logo_path')) {
                $table->string('logo_path')->nullable()->after('name');
            }

            if (! Schema::hasColumn('partners', 'website_url')) {
                $table->string('website_url')->nullable()->after('logo_path');
            }

            if (Schema::hasColumn('partners', 'logo_url')) {
                $table->dropColumn('logo_url');
            }
        });
    }

    public function down(): void
    {
        Schema::table('partners', function (Blueprint $table) {
            if (! Schema::hasColumn('partners', 'logo_url')) {
                $table->string('logo_url')->nullable()->after('name');
            }

            if (Schema::hasColumn('partners', 'logo_path')) {
                $table->dropColumn('logo_path');
            }

            if (Schema::hasColumn('partners', 'website_url')) {
                $table->dropColumn('website_url');
            }
        });
    }
};
