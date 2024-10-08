<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_groups', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("customer_id");
            $table->unsignedBigInteger("group_id");

            $table->index([
                "customer_id",
                "group_id",
            ]);

            $table->foreign("customer_id")
                ->references("id")->on("customers")
                ->cascadeOnDelete();

            $table->foreign("group_id")
                ->references("id")->on("groups")
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_groups');
    }
}
