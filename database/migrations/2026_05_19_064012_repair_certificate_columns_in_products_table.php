<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Add Missing Certificate Columns One-by-One
        |--------------------------------------------------------------------------
        */

        Schema::table('products', function (Blueprint $table) {

            if (!Schema::hasColumn('products', 'batch_number')) {
                $table->string('batch_number')
                    ->nullable()
                    ->after('slug');
            }

            if (!Schema::hasColumn('products', 'certificate_title')) {
                $table->string('certificate_title')
                    ->nullable();
            }

            if (!Schema::hasColumn('products', 'quality_test_report')) {
                $table->text('quality_test_report')
                    ->nullable();
            }

            if (!Schema::hasColumn('products', 'purity_percentage')) {
                $table->decimal('purity_percentage', 5, 2)
                    ->nullable();
            }

            if (!Schema::hasColumn('products', 'moisture_level')) {
                $table->decimal('moisture_level', 5, 2)
                    ->nullable();
            }

            if (!Schema::hasColumn('products', 'test_date')) {
                $table->date('test_date')
                    ->nullable();
            }

            if (!Schema::hasColumn('products', 'approved_by')) {
                $table->string('approved_by')
                    ->nullable();
            }

            if (!Schema::hasColumn('products', 'additional_remarks')) {
                $table->text('additional_remarks')
                    ->nullable();
            }

            if (!Schema::hasColumn('products', 'certificate_file')) {
                $table->string('certificate_file')
                    ->nullable();
            }

            if (!Schema::hasColumn('products', 'certificate_qr')) {
                $table->string('certificate_qr')
                    ->nullable();
            }

            if (!Schema::hasColumn('products', 'certificate_generated_at')) {
                $table->timestamp('certificate_generated_at')
                    ->nullable();
            }

            if (!Schema::hasColumn('products', 'certificate_status')) {
                $table->boolean('certificate_status')
                    ->default(false);
            }
        });
    }

    public function down(): void
    {
        //
    }
};