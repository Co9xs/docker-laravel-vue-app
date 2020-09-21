<template>
    <div class="container">
        <div class="review-detail__loading" v-if="loading">
            <Loading></Loading>
        </div>
        <div v-if="!loading" class="card mt-3 mb-3">
            <div class="card-body">
                <h5 class="h5 card-title">
                    {{ review.company.name }}
                </h5>
                <div class="font-weight-lighter d-flex">
                    <StarRating
                        :starNum="review.evaluation"
                        :label="'総合評価'"
                    ></StarRating>
                </div>
                <div class="d-flex flex-row">
                    <div
                        style="width: 46px; height: 46px; border: 1px #efefef solid; border-radius: 50%; overfloe: hidden; margin-right:5px;"
                    >
                        <img src="https://cdn.jobtalk.jp/top/img/3c2b37a.svg" />
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
                    {{ review.body }}
                </div>
            </div>
        </div>
        <a href="/reviews">レビュー一覧に戻る</a>
    </div>
</template>

<script>
import StarRating from "../../components/StarRating.vue";
import Loading from "../../components/Loading.vue";
export default {
    components: {
        StarRating,
        Loading
    },
    data() {
        return {
            review: {},
            loading: true
        };
    },
    methods: {
        async fetchReview() {
            this.loading = true;
            const reviewId = parseInt(this.$route.params.id, 10);
            const response = await axios.get(
                `http://localhost:8000/api/v1/reviews/${reviewId}`
            );
            this.review = response.data;
            this.loading = false;
        }
    },
    mounted() {
        this.fetchReview();
    }
};
</script>

<style>
.container {
    width: 980px !important;
}
</style>
