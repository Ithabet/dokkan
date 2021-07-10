<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablesPosId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
           $table->integer('pos_id')->after('id');
        });

        Schema::table('purchases', function (Blueprint $table) {
            $table->integer('pos_id')->after('id');
        });

        Schema::table('expenses', function (Blueprint $table) {
            $table->integer('pos_id')->after('id');
        });

        Schema::table('deposits', function (Blueprint $table) {
            $table->integer('pos_id')->after('id');
        });

        Schema::table('withdrawals', function (Blueprint $table) {
            $table->integer('pos_id')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropColumn('pos_id');
        });

        Schema::table('purchases', function (Blueprint $table) {
            $table->dropColumn('pos_id');
        });

        Schema::table('expenses', function (Blueprint $table) {
            $table->dropColumn('pos_id');
        });

        Schema::table('deposits', function (Blueprint $table) {
            $table->dropColumn('pos_id');
        });

        Schema::table('withdrawals', function (Blueprint $table) {
            $table->dropColumn('pos_id');
        });
    }
}
