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
                <div
                    class="review-card mt-3"
                    v-for="review in reviews"
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
export default {
    components: {
        SearchBar,
        SearchParameter,
        Loading,
        ReviewCard,
        SearchResult
    },
    data() {
        return {
            keyword: "",
            reviews: [],
            searched: false,
            loading: true,
            current_page: 1,
            last_page: "",
            range: 5,
            front_dot: false,
            end_dot: false,
            size: 6
        };
    },
    methods: {
        async getReviews() {
            this.loading = true;
            const response = await axios.get(`api/v1/reviews`);
            this.reviews = response.data;
            // this.reviews = response.data.data;
            // this.current_page = response.data.current_page;
            // this.last_page = response.data.last_page;
            this.loading = false;
        },
        async search(params) {
            this.loading = true;
            this.searched = false;
            const response = await axios.get(
                `api/v1/reviews?keyword=${params.keyword}&IsFront=${params.IsFront}&IsBack=${params.IsBack}&IsInfra=${params.IsInfra}&IsDesigner=${params.IsDesigner}&IsMobile=${params.IsMobile}&IsMachineLearning=${params.IsMachineLearning}&IsOthers=${params.IsOthers}`
            );
            this.reviews = response.data;
            this.searched = true;
            this.loading = false;
        },
        calRange(start, end) {
            const range = [];
            for (let i = start; i <= end; i++) {
                range.push(i);
            }
            return range;
        },
        changePage(page) {
            if (page > 0 && page <= this.last_page) {
                this.current_page = page;
                this.getReviews();
            }
        },
        isCurrent(page) {
            return page === this.current_page;
        },
        sizeCheck() {
            if (this.last_page < this.size) {
                return false;
            }
            return true;
        }
    },
    computed: {
        ...mapGetters({
            userId: "auth/userId"
        }),
        frontPageRange() {
            if (!this.sizeCheck) {
                return this.calRange(1, this.last_page);
            }
            return this.calRange(1, 2);
        },
        middlePageRange() {
            let start = "";
            let end = "";
            if (!this.sizeCheck) return [];
            if (this.current_page <= this.range) {
                start = 3;
                end = this.range + 2;
                this.front_dot = false;
                this.end_dot = true;
            } else if (this.current_page > this.last_page - this.range) {
                start = this.last_page - this.range - 1;
                end = this.last_page - 2;
                this.front_dot = true;
                this.end_dot = false;
            } else {
                start = this.current_page - Math.floor(this.range / 2);
                end = this.current_page + Math.floor(this.range / 2);
                this.front_dot = true;
                this.end_dot = true;
            }
            return this.calRange(start, end);
        },
        endPageRange() {
            if (!this.sizeCheck) return [];
            return this.calRange(this.last_page - 1, this.last_page);
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
