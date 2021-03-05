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
import SearchBar from "../components/SearchBar.vue";
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

<style>
.mv {
    width: 100%;
    height: 550px;
    background-image: url("/img/top.jpg");
    background-size: cover;
    background-repeat: no-repeat;
}

.mv__heading {
    font-size: 40px;
    font-weight: 500;
    color: #fff;
    text-align: center;
    margin: 0;
    padding: 56px 0 20px 0;
}

.search {
    width: 550px;
    height: 220px;
    background-color: rgba(0, 0, 0, 0.5);
    margin-right: auto;
    margin-left: auto;
    margin-top: 50px;
    position: relative;
}

.search__inner {
    width: 450px;
    height: auto;
    margin-left: auto;
    margin-right: auto;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateY(-50%) translateX(-50%);
}

.search__text {
    margin: 0;
    color: #fff;
    font-size: 1rem;
    letter-spacing: 1.5px;
}

.search__text--strong {
    font-size: 1.3rem;
    color: #ee6054;
}

.search__link {
    margin: 0;
    display: inline-block;
    margin-left: auto;
    color: #0085cc !important;
    text-align: right;
}
/* feature */
.feature {
    background-color: #f2f6f7;
}

.feature__heading {
    padding: 32px 0 40px 0;
}

.points {
    margin-top: 16px;
}

.points__inner {
    max-width: 920px;
    margin-right: auto;
    margin-left: auto;
    display: flex;
    justify-content: space-between;
}

.point-panel {
    background-color: #fff;
    width: 230px;
    position: relative;
}

.point-panel__num {
    font-family: Ricty Diminished;
    font-size: 100px;
    position: absolute;
    top: -80px;
    left: 0;
    color: #3f3f3f;
}

.point-panel__img {
    width: 70px;
    height: 70px;
    margin-right: auto;
    margin-left: auto;
    margin-bottom: 24px;
}

.point-panel__heading {
    font-size: 20px;
}

.point-panel__heading--strong {
    color: #ee6054;
    font-weight: bold;
}

.point-panel__inner {
    max-width: 180px;
    margin-right: auto;
    margin-left: auto;
    text-align: center;
    padding: 24px 0 16px 0;
}

.point-panel__text {
    margin: 0;
}

.cta {
    text-align: center;
    padding: 32px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
}

.cta__login {
    padding: 8px 32px 8px 32px;
    color: #fff;
    background-color: #ffb808;
    border: none !important;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16),
        0 2px 10px 0 rgba(0, 0, 0, 0.12);
    border-radius: 3px;
}

.cta__login:hover {
    text-decoration: none;
    color: #fff;
}

.cta__signup {
    display: block;
    padding: 8px;
    border: none;
}

.new-arrival__heading {
    padding: 32px 0 40px 0;
}
.pagination {
    user-select: none;
}
.pagination li {
    line-height: 34px !important;
}
</style>