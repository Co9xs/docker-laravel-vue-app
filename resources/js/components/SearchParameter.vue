<template>
<div class="search-params mt-3">
    <div class="search-params__header">
        <p class="search-params__title"><i class="search-params__icon fas fa-lg fa-search"></i>検索条件を指定する</p>
    </div>
    <div class="search-params__body">
        <p class="search-params__heading">会社名</p>
        <div class="search-params__row">
            <input v-model="SearchParams.keyword" class="search-params__text-input" type="text" placeholder="会社名など（例：株式会社〇〇）">
        </div>
    </div>
    <div class="search-params__body">
        <p class="search-params__heading">職種</p>
        <div class="search-params__row">
            <div class="search-params__column">
                <div class="search-params__input-group">
                    <input v-model="SearchParams.type.IsFront" class="search-params__input" type="checkbox" id="checkbox2"  >
                    <label class="search-params__label" for="checkbox2">フロントエンド</label>
                </div>
                <div class="search-params__input-group">
                    <input v-model="SearchParams.type.IsBack" class="search-params__input" type="checkbox" id="checkbox3"  >
                    <label class="search-params__label" for="checkbox3">バックエンド</label>
                </div>
                <div class="search-params__input-group">
                    <input v-model="SearchParams.type.IsInfra" class="search-params__input" type="checkbox" id="checkbox4"  >
                    <label class="search-params__label" for="checkbox4">インフラ</label>
                </div>
                <div class="search-params__input-group">
                    <input v-model="SearchParams.type.IsDesigner" class="search-params__input" type="checkbox" id="checkbox8">
                    <label class="search-params__label" for="checkbox8">デザイナー</label>
                </div>
                <div class="search-params__input-group">
                    <input v-model="SearchParams.type.IsOthers" class="search-params__input" type="checkbox" id="checkbox10"  >
                    <label class="search-params__label" for="checkbox10">その他</label>
                </div>
            </div>
            <div class="search-params__column">
                <div class="search-params__input-group">
                    <input v-model="SearchParams.type.IsMachineLearning" class="search-params__input" type="checkbox" id="checkbox5"  >
                    <label class="search-params__label" for="checkbox5">機械学習</label>
                </div>
                <div class="search-params__input-group">
                    <input v-model="SearchParams.type.IsDataScience" class="search-params__input" type="checkbox" id="checkbox6"  >
                    <label class="search-params__label" for="checkbox6">データサイエンス</label>
                </div>
                <div class="search-params__input-group">
                    <input v-model="SearchParams.type.IsMobile" class="search-params__input" type="checkbox" id="checkbox7"  >
                    <label class="search-params__label" for="checkbox7">iOS&Android</label>
                </div>
                <div class="search-params__input-group">
                    <input v-model="SearchParams.type.IsGameCreater" class="search-params__input" type="checkbox" id="checkbox9"  >
                    <label class="search-params__label" for="checkbox9">ゲームクリエイター</label>
                </div>
            </div>
        </div>
    </div>
    <div class="search-params__body">
        <p class="search-params__heading">勤務形態</p>
        <div class="search-params__row">
            <div class="search-params__column">
                <div class="search-params__input-group">
                    <input v-model="SearchParams.term.Short" class="search-params__input" type="checkbox" id="checkbox11"  >
                    <label class="search-params__label" for="checkbox11">短期インターン</label>
                </div>
                <div class="search-params__input-group">
                    <input v-model="SearchParams.term.PartTime" class="search-params__input" type="checkbox" id="checkbox13"  >
                    <label class="search-params__label" for="checkbox13">アルバイト</label>
                </div>
            </div>
            <div class="search-params__column">
                <div class="search-params__input-group">
                    <input v-model="SearchParams.term.Long" class="search-params__input" type="checkbox" id="checkbox12"  >
                    <label class="search-params__label" for="checkbox12">長期インターン</label>
                </div>
            </div>
            <div class="search-params__column">
            </div>
        </div>
    </div>
    <div class="search-params__body">
        <p class="search-params__heading">評価</p>
        <div class="search-params__row">
            <div class="search-params__column">
                <div class="search-params__input-group">
                    <input v-model="SearchParams.evaluation.OverThree" class="search-params__input" type="checkbox" id="checkbox14"  >
                    <label class="search-params__label" for="checkbox14">星2以上</label>
                </div>
            </div>
            <div class="search-params__column">
                <div class="search-params__input-group">
                    <input v-model="SearchParams.evaluation.OverFour" class="search-params__input" type="checkbox" id="checkbox15"  >
                    <label class="search-params__label" for="checkbox15">星3以上</label>
                </div>
            </div>
            <div class="search-params__column">
                <div class="search-params__input-group">
                    <input v-model="SearchParams.evaluation.OverFive" class="search-params__input" type="checkbox" id="checkbox16"  >
                    <label class="search-params__label" for="checkbox16">星4以上</label>
                </div>
            </div>
        </div>
    </div>
    <div class="search-params__footer">
        <button class="search-params__button" type="button">この条件で検索</button>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            SearchParams: {
                keyword: '',
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

.search-params__text-input {
  width: 100%;
  border: none;
  padding: 5px;
  border-radius: 3px 0 0 3px;
  margin: 3px 0;
}

.search-params__footer {
  margin-top: 20px;
  text-align: center;
}

.search-params__button {
  padding: 7px 10px;
  border: none;
  background-color: #4EC351;
  border-radius: 3px;
  color: #fff;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16),
    0 2px 10px 0 rgba(0, 0, 0, 0.12);
}
</style>