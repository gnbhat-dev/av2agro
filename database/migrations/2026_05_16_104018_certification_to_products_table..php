<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->string('batch_number')->nullable()->after('slug');

            $table->string('certificate_title')->nullable();

            $table->text('quality_test_report')->nullable();
            
            $table->decimal('purity_percentage', 5, 2)->nullable();

            $table->decimal('moisture_level', 5, 2)->nullable();

            $table->date('test_date')->nullable();

            $table->string('approved_by')->nullable();

            $table->text('additional_remarks')->nullable();

            $table->string('certificate_file')->nullable();

            $table->string('certificate_qr')->nullable();

            $table->timestamp('certificate_generated_at')->nullable();

            $table->boolean('certificate_status')
                ->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->dropColumn([
                'batch_number',
                'certificate_title',
                'quality_test_report',
                'purity_percentage',
                'moisture_level',
                'test_date',
                'approved_by',
                'additional_remarks',
                'certificate_file',
                'certificate_qr',
                'certificate_generated_at',
                'certificate_status',
            ]);
        });
    }
};