<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('patients', function (Blueprint $table) {
        $table->dropColumn(['date_of_birth', 'contact_number', 'address']);
        $table->integer('age')->after('patient_no');
    });
}

public function down(): void
{
    Schema::table('patients', function (Blueprint $table) {
        $table->dropColumn('age');
        $table->date('date_of_birth')->after('patient_no');
        $table->string('contact_number');
        $table->string('address');
    });
}
};
