<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-3">
                <div class="review-step">
                    <p class="review-step__title">
                        口コミ投稿の方法
                    </p>
                    <div class="review-step__body">
                        <div class="review-step__content">
                            <div class="review-step__icon">
                                <i class="fas fa-3x fa-search"></i>
                            </div>
                            <p class="review-step__heading">
                                ①会社を検索
                            </p>
                            <div class="review-step__text">
                                検索バーから口コミを書きたい会社名を検索。正式名称で検索すると見つけやすくなります。
                            </div>
                        </div>
                        <div class="review-step__content">
                            <div class="review-step__icon">
                                <i class="fas fa-3x fa-building"></i>
                            </div>
                            <p class="review-step__heading">
                                ②会社を選択
                            </p>
                            <div class="review-step__text">
                                口コミを投稿したい会社をクリック。同名の会社がある時は、正しい所在地を確認しましょう。
                            </div>
                        </div>
                        <div class="review-step__content">
                            <div class="review-step__icon">
                                <i class="far fa-3x fa-comment"></i>
                            </div>
                            <p class="review-step__heading">
                                ③口コミを投稿
                            </p>
                            <div class="review-step__text">
                                画面の指示に従って口コミを投稿。公序良俗に反する内容などは書かないようにして下さい。
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="col-md-8 mt-3 mb-3"
                style="background-color: #fff; border-radius: 5px;"
            >
                <h4 class="h4 mt-3">会社検索</h4>
                <div class="search-bar__top">
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
                    class="mt-3"
                    v-for="company in companies"
                    :key="company.id"
                >
                    <CompanyCard :company="company"></CompanyCard>
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
import CompanyCard from "../../components/Company/CompanyCard.vue";
export default {
    components: {
        SearchBar,
        Loading,
        SearchParameter,
        SearchResult,
        CompanyCard
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
    background-color: #fff;
    max-width: 720px;
    border-radius: 5px;
}

.review-step__title {
    font-size: 18px;
    font-weight: bold;
    margin: 0;
}

.review-step__content {
    text-align: center;
    padding: 0 10px 0 10px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.review-step__icon {
    color: #081239;
    padding: 10px 10px 10px 5px;
}

.review-step__text {
    font-size: 14px;
}

.review-step__heading {
    font-weight: bold;
    font-size: 16px;
    margin: 0;
}
</style>
