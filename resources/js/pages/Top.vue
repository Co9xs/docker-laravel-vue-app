<template>
    <div>
        <Loading v-show="loading"></Loading>
        <section class="mv" v-show="!loading">
            <div class="container">
                <h2 class="mv__heading">
                    エンジニア特化型の口コミ投稿サイト<br />ITインターン.com
                </h2>
                <div class="search">
                    <div class="search__inner">
                        <p class="search__text">
                            現在の口コミ投稿数:<span
                                class="search__text--strong"
                                >{{ reviews.length }}</span
                            >件
                        </p>
                        <p class="search__text">
                            現在の口コミ掲載企業数:<span
                                class="search__text--strong"
                                >{{ companies.length }}</span
                            >件
                        </p>
                        <SearchBar
                            :defaultText="'会社名で検索（例: 株式会社〇〇）'"
                            @error="notifyError()"
                            @searchRequest="search"
                        ></SearchBar>
                        <a class="search__link" href="/reviews"
                            >口コミ一覧を見てみる</a
                        >
                    </div>
                </div>
            </div>
        </section>
        <section class="feature" v-show="!loading">
            <div class="container">
                <h3 class="feature__heading">ITインターン.comの3つの特徴</h3>
                <div class="points">
                    <div class="points__inner">
                        <div class="point-panel">
                            <div class="point-panel__inner">
                                <p class="point-panel__num">1</p>
                                <img class="point-panel__img" src="/img/lap-top.svg" alt="">
                                <h4 class="point-panel__heading">
                                    <span class="point-panel__heading--strong"
                                        >IT関連に特化</span
                                    >した<br />口コミだけを掲載
                                </h4>
                                <p class="point-panel__text">
                                    エンジニアやデザイナー等IT関連のインターンの情報だけを掲載しているので、必要な情報がすぐ見つかります。
                                </p>
                            </div>
                        </div>
                        <div class="point-panel">
                            <div class="point-panel__inner">
                                <p class="point-panel__num">2</p>
                                <img class="point-panel__img" src="/img/person-question.svg" alt="">
                                <h4 class="point-panel__heading">
                                    <span class="point-panel__heading--strong"
                                        >匿名性</span
                                    >だから<br />安心して投稿可能
                                </h4>
                                <p class="point-panel__text">
                                    匿名性のため自分の名前は公開されません。そのため、「会社にバレたくない…」という人でも正直な口コミを投稿できます。
                                </p>
                            </div>
                        </div>
                        <div class="point-panel">
                            <div class="point-panel__inner">
                                <p class="point-panel__num">3</p>
                                <img class="point-panel__img" src="/img/search.svg" alt="">
                                <h4 class="point-panel__heading">
                                    <span class="point-panel__heading--strong"
                                        >職種ごと</span
                                    >に<br />絞り込み検索
                                </h4>
                                <p class="point-panel__text">
                                    会社名や職種ごと(フロントエンドエンジニアorバックエンドエンジニア)に様々な検索条件で絞り込みが可能です。
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cta">
                    <a class="cta__login" href="/login">ログインはこちら</a>
                    <a class="cta__signup" href="/register">新規登録はこちら</a>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import StarRating from "../components/StarRating.vue";
import SearchBar from "../components/SerchBar.vue";
import Loading from "../components/Loading.vue";
export default {
    components: {
        StarRating,
        SearchBar,
        Loading
    },
    data() {
        return {
            reviews: [],
            companies: [],
            loading: false
        };
    },
    methods: {
        async getReviews() {
            this.loading = true;
            const response = await axios.get(`api/v1/reviews`);
            this.reviews = response.data;
            this.loading = false;
        },
        async getCompanies() {
            this.loading = true;
            const response = await axios.get("api/v1/companies");
            this.companies = response.data;
            this.loading = false;
        },
        search(keyword) {
            this.$router.push({
                path: "reviews",
                query: { keyword: keyword }
            });
        }
    },
    mounted() {
        this.getReviews();
        this.getCompanies();
    }
};
</script>
