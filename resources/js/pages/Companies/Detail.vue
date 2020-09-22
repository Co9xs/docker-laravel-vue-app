<template>
    <div class="container">
        <div class="company-show__loading" v-if="loading">
            <Loading></Loading>
        </div>
        <div class="company-show" v-if="!loading">
            <div class="company-show__header">
                <h5 class="company-show__name">{{ company.name }}</h5>
                <p class="company-show__area">本社所在地：{{ company.area }}</p>
                <div class="company-show__star-rating">
                    <StarRating
                        :label="'平均評価'"
                        :starNum="company.average_point"
                    ></StarRating>
                </div>
            </div>
            <div class="tab-menu">
                <ul class="tab-menu__list">
                    <li
                        class="tab-menu__item"
                        :class="{ selected: isActive === '1' }"
                    >
                        <a class="tab-menu__link" @click="changeTab('1')"
                            >口コミ一覧(<span class="tab-menu__link--strong">{{
                                reviews.length
                            }}</span
                            >)</a
                        >
                    </li>
                    <li
                        class="tab-menu__item"
                        :class="{ selected: isActive === '2' }"
                    >
                        <a class="tab-menu__link" @click="changeTab('2')"
                            >口コミを書く</a
                        >
                    </li>
                </ul>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div v-if="isActive === '1'">
                            <div v-if="reviews.length === 0">
                                この企業への口コミはまだありません。
                            </div>
                            <div
                                class="company-detail__pagination mt-3"
                                v-if="reviews.length > 0"
                            >
                                <Paginate
                                    :page-count="getPageCount"
                                    :page-range="3"
                                    :margin-pages="2"
                                    :click-handler="clickCallback"
                                    :prev-text="'<< '"
                                    :next-text="' >>'"
                                    :container-class="'pagination pg-blue'"
                                    :page-class="'page-item'"
                                    :page-link-class="'page-link'"
                                >
                                </Paginate>
                            </div>
                            <div
                                class="mt-2"
                                v-for="review in reviewsForPagination"
                                :key="review.id"
                            >
                                <ReviewCard :review="review"></ReviewCard>
                            </div>
                        </div>
                        <div class="review-create" v-if="isActive === '2'">
                            <div class="review-create__form" v-if="loggedIn">
                                <ReviewCreateForm
                                    :company="company"
                                    @postRequest="addReview"
                                ></ReviewCreateForm>
                            </div>
                            <div class="review-create__cta" v-if="!loggedIn">
                                <p class="review-create__message">
                                    口コミの投稿機能を利用するにはログインが必要です。
                                </p>
                                <a class="review-create__login" href="/login"
                                    >ログインはこちら</a
                                >
                                <a
                                    class="review-create__signup"
                                    href="/register"
                                    >新規登録はこちら</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import StarRating from "../../components/StarRating.vue";
import ReviewCreateForm from "../../components/ReviewCreateForm.vue";
import ReviewCard from "../../components/Review/ReviewCard.vue";
import Loading from "../../components/Loading.vue";
import Paginate from "vuejs-paginate";
import { options } from "../../toastOptions";
import { mapGetters } from "vuex";

export default {
    components: {
        StarRating,
        ReviewCreateForm,
        ReviewCard,
        Loading,
        Paginate
    },
    data() {
        return {
            company: null,
            average_point: 0,
            reviews: [],
            isActive: "1",
            loading: false,
            parPage: 4,
            currentPage: 1
        };
    },
    methods: {
        clickCallback(pageNum) {
            this.currentPage = parseInt(pageNum);
        },
        async updateOrCreateCompany() {
            const data = {
                number: this.$route.params.corporateNum
            };
            const response = await axios
                .post("/api/v1/companies", data)
                .catch(error => {
                    this.$router.push("/not-found");
                });
            const companyData = {
                name: response.data.corporation.name,
                average_point: this.average_point,
                area:
                    response.data.corporation.prefectureName +
                    response.data.corporation.cityName,
                corporate_number: response.data.corporation.corporateNumber
            };
            const response2 = await axios.post(
                "/api/v1/companies/add",
                companyData
            );
            this.company = response2.data;
            await this.getReviewsOn(this.company.id);
            this.company.average_point = this.calcAveragePoint();
        },
        async addReview(reviewData) {
            reviewData.company_id = this.company.id;
            reviewData.company_name = this.company.name;
            const response = await axios.post("/api/v1/reviews", reviewData);
            await this.$router.push("/reviews");
            this.showToast("口コミを投稿しました", options);
        },
        changeTab(num) {
            this.isActive = num;
        },
        async getReviewsOn(company_id) {
            this.loading = true;
            const response = await axios.get(
                `/api/v1/companies/${company_id}/reviews`
            );
            this.reviews = response.data;
            this.loading = false;
        },
        showToast(message, options) {
            this.$toasted.success(message, options);
        },
        calcAveragePoint() {
            const evaluations = this.reviews.map(review => review.evaluation);
            const sum = evaluations.reduce((sum, current) => sum + current);
            const average = sum / this.reviews.length;
            return average;
        }
    },
    computed: {
        ...mapGetters({
            loggedIn: "auth/checkAuth"
        }),
        reviewsForPagination() {
            const current = this.currentPage * this.parPage;
            const start = current - this.parPage;
            if (this.reviews.length !== 0) {
                return this.reviews.slice(start, current);
            }
        },
        getPageCount() {
            return Math.ceil(this.reviews.length / this.parPage);
        }
    },
    created() {
        this.updateOrCreateCompany();
    }
};
</script>

<style scoped>
.company-show {
    padding: 24px 0;
}
.company-show__name {
    margin: 0;
    font-size: 24px;
    font-weight: bold;
}

.company-show__area {
    margin: 0;
    font-size: 14px;
    margin-top: 5px;
}

.tab-menu {
    border-top: 1px solid #707070;
    border-bottom: 1px solid #707070;
    margin: 5px 0 0 0;
    padding: 0;
}

.tab-menu__list {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    list-style: none;
    margin: 0;
    padding: 0;
}

.tab-menu__item {
    padding: 5px 12px;
    margin-right: 10px;
}

.selected {
    border-bottom: 2px solid #ffb808;
    color: #ffb808;
    font-weight: bold;
}

.tab-menu__link {
    color: #ffb808;
}

.tab-menu__link--strong {
    color: #ee6054;
}

.review-create__title {
    font-size: 18px;
}

.review-create__input-group {
    display: flex;
    margin-bottom: 16px;
    justify-content: space-between;
    align-items: center;
    width: 300px;
}

.review-create__textarea-group {
    display: flex;
    justify-content: flex-start;
    align-items: top;
    margin-bottom: 16px;
}

.review-create__label {
    margin: 0;
    font-weight: bold;
}

.review-create__textarea {
    padding: 5px;
}

.review-create__button {
    color: #fff;
    background-color: #4fc251;
    border: none;
    border-radius: 2px;
    padding: 5px 16px;
}

.review-create__cta {
    text-align: center;
    display: flex;
    padding: 8px 0;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
}

.review-create__message {
    margin: 0;
    padding: 8px 0;
}

.review-create__login {
    padding: 8px 32px 8px 32px;
    color: #fff;
    background-color: #ffb808;
    border: none !important;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16),
        0 2px 10px 0 rgba(0, 0, 0, 0.12);
    border-radius: 3px;
}

.review-create__login:hover {
    text-decoration: none;
    color: #fff;
}

.review-create__signup {
    display: block;
    padding: 8px;
    border: none;
}
</style>
