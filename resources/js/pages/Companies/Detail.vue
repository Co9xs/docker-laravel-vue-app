<template>
    <div class="container">
        <div class="company-show">
            <div class="company-show__header">
                <h5 class="company-show__name">{{ company.name }}</h5>
                <p class="company-show__area">本社所在地：{{ company.area }}</p>
                <div class="company-show__star-rating">
                    <StarRating :label="'平均評価'" :starNum="4"></StarRating>
                </div>
            </div>
            <div class="tab-menu">
                <ul class="tab-menu__list">
                    <li
                        class="tab-menu__item"
                        :class="{ selected: isActive === '1' }"
                    >
                        <a class="tab-menu__link" @click="change('1')"
                            >口コミ一覧(32)</a
                        >
                    </li>
                    <li
                        class="tab-menu__item"
                        :class="{ selected: isActive === '2' }"
                    >
                        <a class="tab-menu__link" @click="change('2')"
                            >口コミを書く</a
                        >
                    </li>
                </ul>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div v-if="isActive === '1'">
                          コンテンツ2
                          </div>
                        <div class="review-create" v-if="isActive === '2'">
                            <ReviewCreateForm :company="company"></ReviewCreateForm>
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
export default {
    components: {
        StarRating,
        ReviewCreateForm
    },
    data() {
        return {
            company: null,
            formData: {
                work_style: null,
                type_of_occupation: null,
                evaluation: 0,
                body: "",
                user_id: 1,
                company_id: null,
                company_name: ""
            },
            isActive: "1"
        };
    },
    methods: {
        async upsertCompany() {
            const data = {
                number: this.$route.params.corporateNum
            };
            const response = await axios.post("/api/v1/companies", data);
            this.formData.company_name = response.data.corporation.name;
            const companyData = {
                name: response.data.corporation.name,
                average_point: 0,
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
            this.formData.company_id = this.company.id;
        },
        async addReview() {
            const response = await axios.post("/api/v1/reviews", this.formData);
            this.$router.push("/reviews");
        },
        change: function(num) {
            this.isActive = num;
        },
    },
    created() {
        this.upsertCompany();
    }
};
</script>

<style scoped>
.container {
    max-width: 980px !important;
}
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
    padding: 3px 0;
    padding: 3px 12px;
    margin-right: 10px;
}

.selected {
    border-bottom: 2px solid #ffb808;
    color: #ffb808;
}

.tab-menu__link {
    color: #ffb808;
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
