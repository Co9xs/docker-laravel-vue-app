<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('work_style', ['短期インターン', '長期インターン', 'アルバイト', 'その他'])->default('長期インターン');
            $table->enum('type_of_occupation', ['フロントエンドエンジニア', 'デザイナー', 'バックエンドエンジニア', 'インフラエンジニア', '機械学習エンジニア', 'データサイエンティスト', 'iOS&Androidエンジニア', 'ゲームクリエイター', 'その他'])->default('フロントエンドエンジニア');
            $table->tinyInteger('evaluation')->unsigned();
            $table->text('body');
            $table->string('company_name');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
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
        Schema::dropIfExists('reviews');
    }
}
