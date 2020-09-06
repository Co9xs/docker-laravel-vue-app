<template>
    <div class="container">
        <div class="row">
            <Loading v-show="loading"></Loading>
            <div class="col-md-4" v-show="!loading">
                <SearchParameter @searchRequest="search"></SearchParameter>
            </div>
            <div class="col-md-8" v-show="!loading">
                <h3 class="h4 mt-3">口コミを見る</h3>
                <SearchResult
                    :number="reviews.length"
                    :target="'口コミ'"
                    v-if="searched"
                ></SearchResult>
                <div class="review-list-topbar">
                    <div
                        class="review-list-pagination"
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
                    <div class="review-list-dropdown">
                        <DropDownMenu
                            :label="'並び替え'"
                            :listItems="items"
                            @labelClicked="sortBy"
                        ></DropDownMenu>
                    </div>
                </div>
                <div
                    class="review-card mt-3"
                    v-for="review in reviewsForPagination"
                    :key="review.id"
                >
                    <ReviewCard :review="review"></ReviewCard>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import SearchBar from "../../components/SerchBar.vue";
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
            items: ["評価の高い順", "新着順", "いいねの多い順"]
        };
    },

    methods: {
        async getReviews() {
            this.loading = true;
            const response = await axios.get(`api/v1/reviews`);
            this.reviews = response.data;
            this.loading = false;
        },
        async search(params) {
            this.loading = true;
            this.searched = false;
            const response = await axios.get(
                `api/v1/reviews?keyword=${params.keyword}&IsFront=${params.IsFront}&IsBack=${params.IsBack}&IsInfra=${params.IsInfra}&IsDesigner=${params.IsDesigner}&IsMobile=${params.IsMobile}&IsMachineLearning=${params.IsMachineLearning}&IsGameCreator=${params.IsGameCreator}&IsOthers=${params.IsOthers}`
            );
            this.reviews = response.data;
            this.searched = true;
            this.loading = false;
        },
        clickCallback(pageNum) {
            this.currentPage = Number(pageNum);
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
                case "いいねの多い順":
                    break;
                default:
            }
        }
    },
    computed: {
        ...mapGetters({
            userId: "auth/userId"
        }),
        reviewsForPagination() {
            console.log("このcomputedはthis.reviewsの変更を検知して走ります");
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
    }
};
</script>

<style scoped>
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

.review-list-topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
</style>
