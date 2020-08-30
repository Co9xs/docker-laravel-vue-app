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
                    <li class="tab-menu__item">
                        <a class="tab-menu__link" href="">企業情報</a>
                    </li>
                    <li class="tab-menu__item">
                        <a class="tab-menu__link" href=""
                            >口コミ一覧(<span class="tab-menu__item--str0ng"
                                >32</span
                            >)</a
                        >
                    </li>
                    <li class="tab-menu__item">
                        <a class="tab-menu__link" href="">口コミ投稿</a>
                    </li>
                </ul>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="review-create">
                            <form class="review-create__form" action="">
                                <p class="review-create__title">
                                    "{{ company.name }}"への新規口コミ投稿
                                </p>
                                <div class="review-create__input-group">
                                    <label
                                        class="review-create__label"
                                        for="volume"
                                        >総合評価（5段階）</label
                                    >
                                    <input
                                        class="review-create__input"
                                        type="range"
                                        id="volume"
                                        name="volume"
                                        min="0"
                                        max="5"
                                        v-model="formData.evaluation"
                                    />
                                    {{ formData.evaluation}}
                                </div>
                                <div class="review-create__input-group">
                                    <label
                                        class="review-create__label"
                                        for="type_of_work"
                                        >職種</label
                                    >
                                    <select
                                        name=""
                                        id="type_of_work"
                                        v-model="formData.type_of_occupation"
                                    >
                                        <option value="1"
                                            >フロントエンドエンジニア</option
                                        >
                                        <option value="2">デザイナー</option>
                                        <option value="3"
                                            >バックエンドエンジニア</option
                                        >
                                        <option value="4"
                                            >インフラエンジニア</option
                                        >
                                        <option value="5"
                                            >機械学習エンジニア</option
                                        >
                                        <option value="6"
                                            >データサイエンティスト</option
                                        >
                                        <option value="7"
                                            >iOS&Androidエンジニア</option
                                        >
                                        <option value="8"
                                            >ゲームクリエイター</option
                                        >
                                        <option value="9">その他</option>
                                    </select>
                                </div>
                                <div class="review-create__input-group">
                                    <label
                                        class="review-create__label"
                                        for="term"
                                        >勤務形態</label
                                    >
                                    <select
                                        name=""
                                        id="term"
                                        v-model="formData.work_style"
                                    >
                                        <option value="1"
                                            >短期インターン</option
                                        >
                                        <option value="2"
                                            >長期インターン</option
                                        >
                                        <option value="3">アルバイト</option>
                                        <option value="4">その他</option>
                                    </select>
                                </div>
                                <div class="review-create__textarea-group">
                                    <label
                                        class="review-create__label"
                                        for="volume"
                                        >口コミ本文</label
                                    >
                                    <textarea
                                        class="review-create__textarea"
                                        v-model="formData.body"
                                        cols="30"
                                        rows="17"
                                    ></textarea>
                                </div>
                                <button class="review-create__button" type="button" @click="addReview">
                                    投稿する
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import StarRating from "../../components/StarRating.vue";
export default {
    components: {
        StarRating
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
                company_id: null
            }
        };
    },
    methods: {
        async fetchAndAddCompany() {
            const data = {
                number: this.$route.params.corporateNum
            };
            const response = await axios.post("/api/v1/companies", data);
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
        // async addCompany() {
        //     const data = {
        //         name: this.company.name,
        //         average_point: 0,
        //         area: this.company.prefectureName + this.company.cityName,
        //         corporate_number: this.company.corporateNumber
        //     };
        //     const response = await axios.post("/api/v1/companies/add", data);
        //     console.log("add Company works!!!");
        // },
        async addReview() {
            const response = await axios.post("/api/v1/reviews", this.formData);
            this.$router.push("/reviews");
        }
    },
    created() {
        this.fetchAndAddCompany();
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
    margin-right: 32px;
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
    flex-direction: column;
    margin-bottom: 16px;
    width: 30%;
}

.review-create__textarea-group {
    display: flex;
    flex-direction: column;
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
    background-color: #4FC251;
    border: none;
    border-radius: 2px;
    padding: 5px 16px;
}
</style>
