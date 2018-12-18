<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->default('')->comment('商品标题');
            $table->decimal('price',9,2)->default(0)->comment('商品价格');
            $table->unsignedInteger('category_id')->index()->default(0)->comment('商品分类');
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
            $table->string('list_pic')->default('')->comment('商品列表图');
            $table->string('pics',255)->default('')->comment('商品图册');
            $table->string('description',255)->default('')->comment('商品描述');
            $table->string('spec')->default('')->comment('商品名称');
            $table->integer('total')->default(0)->comment('商品库存');
            $table->integer('hot_id')->default(0)->comment('首页推荐');
            $table->unsignedInteger  ('user_id')->index ()->default (0)->comment ('管理员 id');
            $table->text('content')->comment('商品详情');
            $table->timestamps();
        });
    }

    /**table
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
