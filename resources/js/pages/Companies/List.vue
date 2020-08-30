<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <SearchParameter></SearchParameter>
            </div>
            <div class="col-md-8">
                <h3 class="h3 mt-3">会社検索</h3>
                <div class="search-bar__top mt-3">
                    <SearchBar
                        :defaultText="'会社名で検索（例：株式会社〇〇）'"
                        @searchRequest="search"
                    ></SearchBar>
                    <SearchResult :number="companies.length" :target="'会社'"></SearchResult>
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
</style>
