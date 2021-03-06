<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-3 mb-3">
                <SearchParameter @searchRequest="search"></SearchParameter>
            </div>
            <div class="col-md-8 mt-3 mb-3 review-list">
                <div class="review-list__loading" v-show="loading">
                    <Loading></Loading>
                </div>
                <div class="review-list__content" v-show="!loading">
                    <h4 class="h4 mt-3">口コミを見る</h4>
                    <SearchResult
                        :number="reviews.length"
                        :target="'口コミ'"
                        v-if="searched"
                    ></SearchResult>
                    <div class="review-list__header">
                        <div
                            class="review-list__pagination"
                            v-if="reviews.length !== 0"
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
                        <div class="review-list__dropdown">
                            <DropDownMenu
                                :label="'並び替え'"
                                :listItems="orders"
                                @labelClicked="sortBy"
                            ></DropDownMenu>
                        </div>
                    </div>
                    <div
                        v-show="!loading"
                        class="review-list__card mt-3 card"
                        v-for="review in reviewsForPagination"
                        :key="review.id"
                    >
                        <ReviewCard
                            :review="review"
                            @delete="deleteReview"
                        ></ReviewCard>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import SearchBar from "../../components/SearchBar.vue";
import SearchParameter from "../../components/SearchParameter.vue";
import Loading from "../../components/Loading.vue";
import ReviewCard from "../../components/Review/ReviewCard.vue";
import SearchResult from "../../components/SearchResult.vue";
import DropDownMenu from "../../components/DropDownMenu";
import Paginate from "vuejs-paginate";
export default {
    components: {
        SearchBar,
        SearchParameter,
        Loading,
        ReviewCard,
        SearchResult,
        Paginate,
        DropDownMenu
    },
    data() {
        return {
            keyword: "",
            reviews: [],
            searched: false,
            loading: true,
            parPage: 4,
            currentPage: 1,
            orders: ["評価の高い順", "新着順"]
        };
    },
    methods: {
        async getReviews() {
            if (!this.$route.query.keyword) {
                this.loading = true;
                const response = await axios.get(`api/v1/reviews`);
                this.reviews = response.data;
                this.loading = false;
            }
        },
        createQueryString(params) {
            return (
                "?" +
                Object.entries(params)
                    .map(entry => `${entry[0]}=${entry[1]}`)
                    .join("&")
            );
        },
        async search(params) {
            this.loading = true;
            this.searched = false;
            const query = this.createQueryString(params);
            const response = await axios.get(`api/v1/reviews` + query);
            this.reviews = response.data;
            this.searched = true;
            this.loading = false;
        },
        clickCallback(pageNum) {
            this.currentPage = parseInt(pageNum);
        },
        sortBy(order) {
            switch (order) {
                case "評価の高い順":
                    this.reviews.sort((review, nextReview) => {
                        if (review.evaluation > nextReview.evaluation)
                            return -1;
                        if (review.evaluation < nextReview.evaluation) return 1;
                        return 0;
                    });
                    break;
                case "新着順":
                    this.reviews.sort((review, nextReview) => {
                        if (review.created_at > nextReview.created_at)
                            return -1;
                        if (review.created_at < nextReview.created_at) return 1;
                        return 0;
                    });
                    break;
                default:
            }
        },
        async deleteReview(review_id) {
            const response = await axios.post(`/api/v1/reviews/${review_id}`);
            await this.$router.go({
                path: this.$router.currentRoute.path,
                force: true
            });
        },
        async searchByTopPage() {
            if (this.$route.query.keyword) {
                this.loading = true;
                this.searched = false;
                const keyword = this.$route.query.keyword;
                const response = await axios.get(
                    `api/v1/reviews?keyword=${keyword}`
                );
                this.reviews = response.data;
                this.searched = true;
                this.loading = false;
            }
        }
    },
    computed: {
        ...mapGetters({
            userId: "auth/userId"
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
    mounted() {
        this.getReviews();
        this.searchByTopPage();
    }
};
</script>

<style scoped>
.review-list {
    background-color: #fff;
    border-radius: 5px;
}

.review-list__header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.review-list__card {
    margin: 10px 0;
}

.pagination {
    display: flex;
    list-style-type: none;
    margin: 0;
}
.pagination li {
    border: 1px solid #ddd;
    padding: 6px 12px;
    text-align: center;
    cursor: pointer;
}

.pagination li + li {
    border-left: none;
}

.pagination li.active {
    background-color: #0375ff;
    color: #fff;
}

.disabled {
    cursor: not-allowed;
}
</style>
