<template>
    <div class="container">
        <div class="company-show">
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
                        <Loading v-if="loading"></Loading>
                        <div v-if="isActive === '1' && !loading">
                            <div v-if="reviews.length === 0">
                                この企業への口コミはまだありません。
                            </div>
                            <div
                                class="mt-3"
                                v-for="review in reviews"
                                :key="review.id"
                            >
                                <ReviewCard :review="review"></ReviewCard>
                            </div>
                        </div>
                        <div class="review-create" v-if="isActive === '2'">
                            <ReviewCreateForm
                                :company="company"
                                @postRequest="addReview"
                            ></ReviewCreateForm>
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
import { options } from "../../toastOptions"
export default {
    components: {
        StarRating,
        ReviewCreateForm,
        ReviewCard,
        Loading
    },
    data() {
        return {
            company: null,
            reviews: [],
            average_point: 0,
            isActive: "1",
            loading: false
        };
    },
    methods: {
        async upsertCompany() {
            const data = {
                number: this.$route.params.corporateNum
            };
            const response = await axios.post("/api/v1/companies", data);
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
            this.getReviewsOn(this.company.id);
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
        }
    },
    created() {
        this.upsertCompany();
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

.review-create__form {
    padding: 16px 0;
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
</style>
