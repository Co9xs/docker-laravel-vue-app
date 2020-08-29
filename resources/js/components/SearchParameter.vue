<template>
<div class="search-params mt-3">
    <div class="search-params__header">
        <p class="search-params__title"><i class="search-params__icon fas fa-lg fa-search"></i>詳細条件を指定する</p>
        <!-- <div class="search-params__input-group">
            <input class="search-params__input" type="checkbox" id="checkbox1">
            <label class="search-params__label" for="checkbox1">すべてOFFにする</label>
        </div> -->
    </div>
    <div class="search-params__body">
        <p class="search-params__heading">職種</p>
        <div class="search-params__row">
            <div class="search-params__column">
                <div class="search-params__input-group">
                    <input class="search-params__input" type="checkbox" id="checkbox2" checked>
                    <label class="search-params__label" for="checkbox2">フロントエンドエンジニア</label>
                </div>
                <div class="search-params__input-group">
                    <input class="search-params__input" type="checkbox" id="checkbox3" checked>
                    <label class="search-params__label" for="checkbox3">バックエンドエンジニア</label>
                </div>
                <div class="search-params__input-group">
                    <input class="search-params__input" type="checkbox" id="checkbox4" checked>
                    <label class="search-params__label" for="checkbox4">インフラエンジニア</label>
                </div>
            </div>

            <div class="search-params__column">
                <div class="search-params__input-group">
                    <input class="search-params__input" type="checkbox" id="checkbox5" checked>
                    <label class="search-params__label" for="checkbox5">機械学習エンジニア</label>
                </div>
                <div class="search-params__input-group">
                    <input class="search-params__input" type="checkbox" id="checkbox6" checked>
                    <label class="search-params__label" for="checkbox6">データサイエンティスト</label>
                </div>
                <div class="search-params__input-group">
                    <input class="search-params__input" type="checkbox" id="checkbox7" checked>
                    <label class="search-params__label" for="checkbox7">iOS&Androidエンジニア</label>
                </div>
            </div>

            <div class="search-params__column">
                <div class="search-params__input-group">
                    <input class="search-params__input" type="checkbox" id="checkbox8" checked>
                    <label class="search-params__label" for="checkbox8">デザイナー</label>
                </div>
                <div class="search-params__input-group">
                    <input class="search-params__input" type="checkbox" id="checkbox9" checked>
                    <label class="search-params__label" for="checkbox9">ゲームクリエイター</label>
                </div>
                <div class="search-params__input-group">
                    <input class="search-params__input" type="checkbox" id="checkbox10" checked>
                    <label class="search-params__label" for="checkbox10">その他</label>
                </div>
            </div>

        </div>
    </div>
    <div class="search-params__body">
        <p class="search-params__heading">勤務形態</p>
        <div class="search-params__row">
            <div class="search-params__column">
                <div class="search-params__input-group">
                    <input class="search-params__input" type="checkbox" id="checkbox11" checked>
                    <label class="search-params__label" for="checkbox11">短期インターン</label>
                </div>
            </div>
            <div class="search-params__column">
                <div class="search-params__input-group">
                    <input class="search-params__input" type="checkbox" id="checkbox12" checked>
                    <label class="search-params__label" for="checkbox12">長期インターン</label>
                </div>
            </div>
            <div class="search-params__column">
                <div class="search-params__input-group">
                    <input class="search-params__input" type="checkbox" id="checkbox13" checked>
                    <label class="search-params__label" for="checkbox13">アルバイトなど</label>
                </div>
            </div>
        </div>
    </div>
    <div class="search-params__body">
        <p class="search-params__heading">評価</p>
        <div class="search-params__row">
            <div class="search-params__column">
                <div class="search-params__input-group">
                    <input class="search-params__input" type="checkbox" id="checkbox14" checked>
                    <label class="search-params__label" for="checkbox14">星2以上</label>
                </div>
            </div>
            <div class="search-params__column">
                <div class="search-params__input-group">
                    <input class="search-params__input" type="checkbox" id="checkbox15" checked>
                    <label class="search-params__label" for="checkbox15">星3以上</label>
                </div>
            </div>
            <div class="search-params__column">
                <div class="search-params__input-group">
                    <input class="search-params__input" type="checkbox" id="checkbox16" checked>
                    <label class="search-params__label" for="checkbox16">星4以上</label>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            SearchParams: {
                type: {
                    IsFront: true,
                    IsBack: true,
                    IsInfra: true,
                    IsDataScience: true,
                    IsMachineLearning: true,
                    IsMobile: true,
                    IsDesigner: true,
                    IsGameCreater: true,
                    IsOthers: true,
                },
                term: {
                    Short: true,
                    Long: true,
                    PartTime: true
                },
                evaluation: {
                    OverThree: true,
                    OverFour: true,
                    OverFive: true
                }
            }
        }
    },
    methods: {
        off() {
            this.SearchParams = false;
        }
    }
}
</script>

<style>
.search-params {
    padding: 16px;
    background-color: #efefef;
    max-width: 720px;
    border-radius: 5px;
}
.search-params__header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.search-params__icon {
    margin-right: 5px;
}

.search-params__title {
    font-size: 18px;
    font-weight: bold;
    margin: 0;
}

.search-params__heading {
    margin: 0;
    font-size: 16px;
    font-weight: bold;
}

.search-params__body {
    margin-top: 16px;
}

.search-params__row {
    display: flex;
    justify-content: space-between;
}

.search-params__column {
    display: flex;
    flex-direction: column;
    width: 33.333333%;
}

.search-params__input-group {
    display: flex;
    align-items: center;
    margin: 3px 0;
}

.search-params__input {
    transform: scale(1.2);
}

.search-params__label {
    margin: 0;
    padding: 0 0 0 5px;
    user-select: none;
}

.search-params__row {
    display: flex;
    justify-content: space-between;
}
</style>