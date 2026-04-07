<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('highlight_text')->nullable()->after('short_description');
            $table->longText('body_intro')->nullable()->after('highlight_text');

            $table->string('cta_primary_text')->nullable()->after('brochure_url');
            $table->string('cta_primary_url')->nullable()->after('cta_primary_text');

            $table->string('cta_secondary_text')->nullable()->after('cta_primary_url');
            $table->string('cta_secondary_url')->nullable()->after('cta_secondary_text');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'highlight_text',
                'body_intro',
                'cta_primary_text',
                'cta_primary_url',
                'cta_secondary_text',
                'cta_secondary_url',
            ]);
        });
    }
};