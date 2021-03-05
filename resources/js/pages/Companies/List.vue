<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-3 mb-3">
                <ReviewCreateStep></ReviewCreateStep>
            </div>
            <div class="col-md-8 mt-3 mb-3 pb-3 company-list">
                <div class="company-list__caution">
                    <p class="company-list__heading">検索時の注意事項</p>
                    <div class="company-list__message">
                        ①できるだけ<span class="company-list__message--strong"
                            >正確な会社名</span
                        >で検索しましょう。<br />
                        （例：「株式会社」など広すぎるワードで検索するとエラーになります）
                    </div>
                    <div class="company-list__message">
                        ②アルファベットや英語は<span
                            class="company-list__message--strong"
                            >カタカナに直して</span
                        >検索しましょう。<br />
                        （例：「✕ 株式会社ABC」→「○ 株式会社エービーシー」）
                    </div>
                </div>
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
import { options } from "../../toastOptions";

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
            const response = await axios
                .post("api/v1/companies/search", param)
                .catch(error => {
                    if (error.response.status === 500) {
                        this.loading = false;
                        this.showToast(
                            "サーバーエラーが発生しました。管理者にお問い合わせください。",
                            options
                        );
                        return;
                    }
                });
            if (response.status === 200) {
                this.companies = response.data.corporation.length > 1 ? response.data.corporation : [response.data.corporation];
                this.loading = false;
                this.searched = true;
            }
        },
        clickCallback(pageNum) {
            this.currentPage = parseInt(pageNum);
        },
        showToast(message, options) {
            this.$toasted.error(message, options);
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
.company-list__caution {
    background-color: #efefef;
    list-style: none;
    border-radius: 5px;
    padding: 8px;
    margin: 16px 0;
}

.company-list__heading {
    font-size: 16px;
    font-weight: bold;
    margin: 0;
}

.company-list__message {
    padding: 4px 0;
}

.company-list__message--strong {
    color: #ed6054;
    font-weight: bold;
}
</style>
