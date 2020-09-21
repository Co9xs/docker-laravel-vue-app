<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-3 mb-3">
                <ReviewCreateStep></ReviewCreateStep>
            </div>
            <div class="col-md-8 mt-3 mb-3 pb-3 company-list">
                <h4 class="h4 mt-3">会社検索</h4>
                <div class="company-list__search-bar">
                    <SearchBar
                        :defaultText="'会社名で検索（例：株式会社〇〇）'"
                        @searchRequest="search"
                    ></SearchBar>
                    <SearchResult
                        v-if="searched"
                        :number="companies.length"
                        :target="'会社'"
                    ></SearchResult>
                </div>
                <div
                    class="company-list__pagination"
                    v-if="companies.length !== 0"
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
                <Loading v-if="loading"></Loading>
                <div
                    class="mt-3"
                    v-for="company in companiesForPagination"
                    :key="company.id"
                >
                    <CompanyCard :company="company"></CompanyCard>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SearchBar from "../../components/SearchBar.vue";
import Loading from "../../components/Loading.vue";
import SearchParameter from "../../components/SearchParameter.vue";
import SearchResult from "../../components/SearchResult.vue";
import CompanyCard from "../../components/Company/CompanyCard.vue";
import ReviewCreateStep from "../../components/ReviewCreateStep.vue";
import Paginate from "vuejs-paginate";

export default {
    components: {
        SearchBar,
        Loading,
        SearchParameter,
        SearchResult,
        CompanyCard,
        ReviewCreateStep,
        Paginate
    },
    data() {
        return {
            companies: [],
            loading: false,
            searched: false,
            parPage: 4,
            currentPage: 1
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
        },
        clickCallback(pageNum) {
            this.currentPage = parseInt(pageNum);
        }
    },
    computed: {
        companiesForPagination() {
            const current = this.currentPage * this.parPage;
            const start = current - this.parPage;
            if (this.companies.length !== 0) {
                return this.companies.slice(start, current);
            }
        },
        getPageCount() {
            return Math.ceil(this.companies.length / this.parPage);
        }
    }
};
</script>

<style>
.company-list {
    background-color: #fff;
    border-radius: 5px;
}
.company-list__search-bar {
    max-width: 508px;
}
</style>
