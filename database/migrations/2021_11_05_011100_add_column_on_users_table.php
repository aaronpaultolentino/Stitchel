<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnOnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('mobile_number')->nullable()->comment('Add Column On Users')->after('email');
            $table->text('address')->nullable()->comment('Add Column On Users')->after('mobile_number');
            $table->text('postcode')->nullable()->comment('Add Column On Users')->after('address');
            $table->string('area')->nullable()->comment('Add Column On Users')->after('postcode');
            $table->string('country')->nullable()->comment('Add Column On Users')->after('area');
            $table->string('state')->nullable()->comment('Add Column On Users')->after('country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['mobile_number','address','postcode','area','country','state']);
        });
    }
}
