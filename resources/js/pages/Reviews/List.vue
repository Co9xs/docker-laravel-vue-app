<template>
    <div class="container">
        <h3 class="h3 mt-3">口コミ一覧</h3>
        <div class="search-bar__top mt-3">
            <SearchBar
                :defaultText="'会社名で検索（例：株式会社〇〇）'"
                @error="notifyError()"
                @searchRequest="search"
            ></SearchBar>
            <p v-if="searched" class="search-bar__result">
                検索結果：
                <span class="search-bar__result--strong">
                    {{ filteredReviews.length }}
                </span>
                件の口コミがヒットしました
            </p>
        </div>
        <Loading v-show="loading"></Loading>
        <div
            class="row justify-content-start"
            v-for="reviews in createDoubleArray(filteredReviews, 2)"
            :key="reviews.index"
            v-show="!loading"
        >
            <div class="col-md-6" v-for="review in reviews" :key="review.id">
                <ReviewCard :review="review"></ReviewCard>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import SearchBar from "../../components/SerchBar.vue";
import Loading from "../../components/Loading.vue";
import ReviewCard from "../../components/Review/ReviewCard.vue";
export default {
    components: {
        SearchBar,
        Loading,
        ReviewCard
    },
    data() {
        return {
            keyword: "",
            reviews: [],
            searched: false,
            loading: true
        };
    },
    computed: {
        filteredReviews() {
            return this.filterReviews();
        },
        ...mapGetters({
            userId: "auth/userId"
        })
    },
    methods: {
        async getReviews() {
            this.loading = true;
            const response = await axios.get("api/v1/reviews");
            this.reviews = response.data;
            this.loading = false;
        },
        filterReviews() {
            let filtered = [];
            for (let i in this.reviews) {
                let review = this.reviews[i];
                if (review.company.name.indexOf(this.keyword) !== -1) {
                    filtered.push(review);
                }
            }
            return filtered;
        },
        createDoubleArray(array, cutNum) {
            const baseArrayLength = array.length;
            const result = [];
            for (let i = 0; i < Math.ceil(baseArrayLength / cutNum); i++) {
                const j = i * cutNum;
                const slicedArray = array.slice(j, j + cutNum);
                result.push(slicedArray);
            }
            return result;
        },
        notifyError() {
            console.log("エラーだよ");
        },
        search(keyword) {
            this.searched = false;
            this.keyword = keyword;
            this.searched = true;
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
</style>
