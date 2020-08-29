<template>
<div class="search-params">
    <div class="search-params__header">
        <p class="search-params__title"><i class="search-params__icon fas fa-lg fa-search"></i>検索条件を指定する</p>
        <!-- <div class="search-params__input-group">
            <input class="search-params__input" type="checkbox" id="checkbox1">
            <label class="search-params__label" for="checkbox1" @change="off()">すべてOFFにする</label>
        </div> -->
    </div>
    <div class="search-params__body">
        <p class="search-params__heading">職種</p>
        <div class="search-params__row">
            <div class="search-params__column">
                <div class="search-params__input-group">
                    <input v-model="SearchParams.type.IsFront" class="search-params__input" type="checkbox" id="checkbox2"  >
                    <label class="search-params__label" for="checkbox2">フロントエンドエンジニア</label>
                </div>
                <div class="search-params__input-group">
                    <input v-model="SearchParams.type.IsBack" class="search-params__input" type="checkbox" id="checkbox3"  >
                    <label class="search-params__label" for="checkbox3">バックエンドエンジニア</label>
                </div>
                <div class="search-params__input-group">
                    <input v-model="SearchParams.type.IsInfra" class="search-params__input" type="checkbox" id="checkbox4"  >
                    <label class="search-params__label" for="checkbox4">インフラエンジニア</label>
                </div>
            </div>

            <div class="search-params__column">
                <div class="search-params__input-group">
                    <input v-model="SearchParams.type.IsMachineLearning" class="search-params__input" type="checkbox" id="checkbox5"  >
                    <label class="search-params__label" for="checkbox5">機械学習エンジニア</label>
                </div>
                <div class="search-params__input-group">
                    <input v-model="SearchParams.type.IsDataScience" class="search-params__input" type="checkbox" id="checkbox6"  >
                    <label class="search-params__label" for="checkbox6">データサイエンティスト</label>
                </div>
                <div class="search-params__input-group">
                    <input v-model="SearchParams.type.IsMobile" class="search-params__input" type="checkbox" id="checkbox7"  >
                    <label class="search-params__label" for="checkbox7">iOS&Androidエンジニア</label>
                </div>
            </div>

            <div class="search-params__column">
                <div class="search-params__input-group">
                    <input v-model="SearchParams.type.IsDesigner" class="search-params__input" type="checkbox" id="checkbox8"  >
                    <label class="search-params__label" for="checkbox8">デザイナー</label>
                </div>
                <div class="search-params__input-group">
                    <input v-model="SearchParams.type.IsGameCreater" class="search-params__input" type="checkbox" id="checkbox9"  >
                    <label class="search-params__label" for="checkbox9">ゲームクリエイター</label>
                </div>
                <div class="search-params__input-group">
                    <input v-model="SearchParams.type.IsOthers" class="search-params__input" type="checkbox" id="checkbox10"  >
                    <label class="search-params__label" for="checkbox10">その他</label>
                </div>
            </div>

        </div>
    </div>
    <div class="search-params__body">
        <p class="search-params__heading">期間</p>
        <div class="search-params__row">
            <div class="search-params__column">
                <div class="search-params__input-group">
                    <input v-model="SearchParams.term.Short" class="search-params__input" type="checkbox" id="checkbox11"  >
