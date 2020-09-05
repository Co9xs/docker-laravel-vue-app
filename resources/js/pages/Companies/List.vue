<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="review-step">
                    <div class="review-step__title">
                        口コミ投稿の方法
                    </div>
                    <div class="review-step__body">
                        <div class="review-step__content">
                            <p class="review-step__number">
                                1
                            </p>
                            <div class="review-step__icon">
                                <i class="fas fa-3x fa-search"></i>
                            </div>
                            <p class="review-step__heading">
                                会社を検索
                            </p>
                            <div class="review-step__text">
                                まずは、検索バーから口コミを書きたい会社名を検索。この時正式名称で検索すると見つけやすくなります。
                            </div>
                        </div>
                        <div class="review-step__content">
                            <p class="review-step__number">
                                2
                            </p>
                            <div class="review-step__icon">
                                <i class="fas fa-3x fa-building"></i>
                            </div>
                            <p class="review-step__heading">
                                会社を選択
                            </p>
                            <div class="review-step__text">
                                検索結果から口コミを投稿したい会社をクリック。同名の会社がでた場合は、所在地を確認して正しい会社を選択しましょう。
                            </div>
                        </div>
                        <div class="review-step__content">
                            <p class="review-step__number">
                                3
                            </p>
                            <div class="review-step__icon">
                                <i class="far fa-3x fa-comment"></i>
                            </div>
                            <p class="review-step__heading">
                                口コミを投稿
                            </p>
                            <div class="review-step__text">
                                あとは画面の指示に従って口コミを投稿してみましょう。公序良俗に反する内容などは書かないようにして下さい。
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h3 class="h3 mt-3">会社検索</h3>
                <div class="search-bar__top mt-3">
                    <SearchBar
                        :defaultText="'会社名で検索（例：株式会社〇〇）'"
                        @searchRequest="search"
                    ></SearchBar>
                    <SearchResult
                        :number="companies.length"
                        :target="'会社'"
                    ></SearchResult>
                </div>
                <Loading v-if="loading"></Loading>
                <div
                    class="card mt-3 col-md-12"
                    v-for="company in companies"
                    :key="company.id"
                >
                    <p>{{ company.name }}</p>
                    <p>{{ company.prefectureName }}{{ company.cityName }}</p>
                    <a
                        :href="
                            '/companies/' +
                                company.corporateNumber +
                                '/review/create'
                        "
                        >この会社への口コミを書く</a
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SearchBar from "../../components/SerchBar.vue";
import Loading from "../../components/Loading.vue";
import SearchParameter from "../../components/SearchParameter.vue";
import SearchResult from "../../components/SearchResult.vue";
export default {
    components: {
        SearchBar,
        Loading,
        SearchParameter,
        SearchResult
    },
    data() {
        return {
            companies: [],
            loading: false,
            searched: false
        };
    },
    methods: {
        async search(keyword) {
            const param = {
                name: keyword
            };
            this.searched = false;
            this.loading = true;
            this.companies = [];
            const response = await axios.post("api/v1/companies/search", param);
            if (response.status === 200) {
                console.log(response.data);
                this.companies = response.data.corporation;
                this.loading = false;
                this.searched = true;
            }
        }
    }
};
</script>

<style>
.search-bar__top {
    max-width: 508px;
}
.search-bar__result {
    padding: 10px 0 10px 0;
    margin: 0;
    font-size: 16px;
}

.search-bar__result--strong {
    font-size: 20px;
    font-weight: bold;
    color: #ee6054;
}

.review-step {
    padding: 16px;
    border-radius: 5px;
}

.review-step__title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 15px;
    padding: 5px;
}

.review-step__content {
    text-align: center;
    padding: 0 10px 0 10px;
    border: 3px solid #081239;
    border-radius: 3px;
    margin-bottom: 20px;
    background-color: #fff;
}

.review-step__heading {
    margin: 0;
    font-weight: bold;
    font-size: 18px;
    margin-bottom: 10px;
    transform: translateY(-17.5px);
}

.review-step__number {
    color: #fff;
    background-color: #ffb808;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    font-size: 18px;
    font-weight: bold;
    text-align: center;
    line-height: 35px;
    margin-right: auto;
    margin-left: auto;
    margin-bottom: 10px;
    transform: translateY(-17.5px);
}

.review-step__icon {
    color: #081239;
    padding: 10px;
    transform: translateY(-17.5px);
}

.review-step__text {
    font-size: 14px;
    transform: translateY(-17.5px);
}
</style>
