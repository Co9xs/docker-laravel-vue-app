<template>
    <div class="container">
        <div class="review-detail__loading" v-if="loading">
            <Loading></Loading>
        </div>
        <div v-if="!loading" class="card mt-3 mb-3">
            <ReviewCard :review="review" expandedAll="true"></ReviewCard>
        </div>
        <a v-if="!loading" href="/reviews">口コミ一覧に戻る</a>
    </div>
</template>

<script>
import ReviewCard from "../../components/Review/ReviewCard.vue";
export default {
    components: {
        ReviewCard
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
            const response = await axios
                .get(`/api/v1/reviews/${reviewId}`)
                .catch(error => {
                    this.$router.push("/not-found");
                });
            this.review = response.data;
            this.loading = false;
        }
    },
    mounted() {
        this.fetchReview();
    }
};
</script>
