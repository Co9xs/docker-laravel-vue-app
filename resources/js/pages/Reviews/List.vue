<template>
    <div class="container">
        <h3 class="h3 mt-3">口コミ一覧</h3>
        <div class="search-bar__top mt-3">
            <search-bar
                :defaultText="'会社名で検索（例: 株式会社〇〇）'"
                @error="notifyError()"
                @input="search"
            ></search-bar>
            <p v-if="searched" class="search-bar__result">
                検索結果：
                <span class="search-bar__result--strong">
                  {{ filteredReviews.length}}
                </span>
                件の口コミがヒットしました
            </p>
        </div>
        <div
            class="row justify-content-start"
            v-for="reviews in createDoubleArray(filteredReviews, 2)"
            :key="reviews.index"
        >
            <div class="col-md-6" v-for="review in reviews" :key="review.id">
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="h5 card-title">
                            {{ review.company.name }}
                        </h5>
                        <div class="font-weight-lighter d-flex">
                            <p class="mb-0">総合評価</p>
                            <star-rating
                                :starNum="review.evaluation"
                            ></star-rating>
                        </div>
                        <div class="d-flex flex-row">
                            <div
                                style="width: 46px; height: 46px; border: 1px #efefef solid; border-radius: 50%; overfloe: hidden; margin-right:5px;"
                            >
                                <!-- <img :src="'../../../../public/storage/top.jpg'"> -->
                            </div>
                            <div>
                                <div class="font-weight-bold">
                                    {{ review.user.school_name }}/{{
                                        review.user.graduation_year
                                    }}/{{ review.user.sex }}
                                </div>
                                <div class="font-weight-lighter">
                                    {{ review.work_style }},
                                    {{ review.type_of_occupation }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-2">
                        <div class="card-text">
                            {{ excerpt(review.body, 50) }}
                        </div>
                        <a :href="'/reviews/' + review.id"
                            >この口コミの詳細を見る>></a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import StarRating from "../../components/StarRating.vue";
import SearchBar from "../../components/SerchBar.vue";
export default {
    components: {
        StarRating,
        SearchBar
    },
    data() {
        return {
            keyword: "",
            reviews: [],
            searched: false
        };
    },
    computed: {
        filteredReviews() {
            return this.filterReviews();
        }
    },
    methods: {
        async getReviews() {
            const response = await axios.get("api/v1/reviews");
            this.reviews = response.data;
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
        excerpt(text, max) {
            if (text.length > max) {
                return text.substr(0, max) + "...";
            }
            return text;
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
  color: #EE6054;
}
</style>
