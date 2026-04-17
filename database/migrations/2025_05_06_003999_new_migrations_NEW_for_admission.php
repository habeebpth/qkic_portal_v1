<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add new fields to students table
        Schema::table('students', function (Blueprint $table) {
            // Address fields from frontend form
            if (!Schema::hasColumn('students', 'location')) {
                $table->string('location')->nullable();
            }
            if (!Schema::hasColumn('students', 'zone_number')) {
                $table->string('zone_number')->nullable();
            }
            if (!Schema::hasColumn('students', 'street_num')) {
                $table->string('street_num')->nullable();
            }
            if (!Schema::hasColumn('students', 'building_num')) {
                $table->string('building_num')->nullable();
            }
            if (!Schema::hasColumn('students', 'landmark')) {
                $table->string('landmark')->nullable();
            }
            
            // Academic fields from frontend form
            if (!Schema::hasColumn('students', 'current_madrasa')) {
                $table->string('current_madrasa')->nullable();
            }
            if (!Schema::hasColumn('students', 'transportation')) {
                $table->string('transportation')->nullable();
            }
            
            // Father details
            if (!Schema::hasColumn('students', 'father_name')) {
                $table->string('father_name')->nullable();
            }
            if (!Schema::hasColumn('students', 'father_mobile')) {
                $table->string('father_mobile')->nullable();
            }
            if (!Schema::hasColumn('students', 'father_whatsapp')) {
                $table->string('father_whatsapp')->nullable();
            }
            if (!Schema::hasColumn('students', 'father_occupation')) {
                $table->string('father_occupation')->nullable();
            }
            if (!Schema::hasColumn('students', 'father_idcard_type')) {
                $table->string('father_idcard_type')->nullable();
            }
            if (!Schema::hasColumn('students', 'father_idcard_num')) {
                $table->string('father_idcard_num')->nullable();
            }
            
            // Mother details
            if (!Schema::hasColumn('students', 'mother_name')) {
                $table->string('mother_name')->nullable();
            }
            if (!Schema::hasColumn('students', 'mother_mobile')) {
                $table->string('mother_mobile')->nullable();
            }
            if (!Schema::hasColumn('students', 'mother_whatsapp')) {
                $table->string('mother_whatsapp')->nullable();
            }
            if (!Schema::hasColumn('students', 'mother_occupation')) {
                $table->string('mother_occupation')->nullable();
            }
            if (!Schema::hasColumn('students', 'mother_idcard_type')) {
                $table->string('mother_idcard_type')->nullable();
            }
            if (!Schema::hasColumn('students', 'mother_idcard_num')) {
                $table->string('mother_idcard_num')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remove fields from students table
        Schema::table('students', function (Blueprint $table) {
            // Address fields
            $table->dropColumn([
                'location',
                'zone_number',
                'street_num',
                'building_num',
                'landmark'
            ]);
            
            // Academic fields
            $table->dropColumn([
                'current_madrasa',
                'transportation'
            ]);
            
            // Father details
            $table->dropColumn([
                'father_name',
                'father_mobile',
                'father_whatsapp',
                'father_occupation',
                'father_idcard_type',
                'father_idcard_num'
            ]);
            
            // Mother details
            $table->dropColumn([
                'mother_name',
                'mother_mobile',
                'mother_whatsapp',
                'mother_occupation',
                'mother_idcard_type',
                'mother_idcard_num'
            ]);
        });
    }
};
