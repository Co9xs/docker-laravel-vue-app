<template>
    <div class="container">
        <h1>レビュー作成画面</h1>
        <p>法人番号：{{ company.corporate_number }}</p>
        <p>{{ company.name }}</p>
        <p>{{ company.area }}</p>
        <form action="">
            <select name="" id="" v-model="formData.work_style">
                <option value="1">短期インターン</option>
                <option value="2">長期インターン</option>
                <option value="3">アルバイト</option>
                <option value="4">その他</option>
            </select>
            <select name="" id="" v-model="formData.type_of_occupation">
                <option value="1">フロントエンドエンジニア</option>
                <option value="2">デザイナー</option>
                <option value="3">バックエンドエンジニア</option>
                <option value="4">インフラエンジニア</option>
                <option value="5">機械学習エンジニア</option>
                <option value="6">データサイエンティスト</option>
                <option value="7">iOS&Androidエンジニア</option>
                <option value="8">ゲームクリエイター</option>
                <option value="9">その他</option>
            </select>
            <input
                type="range"
                id="volume"
                name="volume"
                min="0"
                max="5"
                v-model="formData.evaluation"
            />
            <label for="volume">評価</label>
            <textarea
                name=""
                id=""
                cols="30"
                rows="10"
                v-model="formData.body"
            ></textarea>
        </form>
        <button type="button" @click="addReview">POST</button>
    </div>
</template>

<script>
export default {
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
