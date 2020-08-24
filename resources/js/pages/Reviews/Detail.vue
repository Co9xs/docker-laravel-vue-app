<template>
    <div class="container">
        <Loading v-show="loading"></Loading>
        <div v-show="!loading" class="card mt-3">
            <div class="card-body">
                <h5 class="h5 card-title">
                    {{ review.company.name }}
                </h5>
                <div class="font-weight-lighter d-flex">
                    <p class="mb-0">総合評価</p>
                    <star-rating :starNum="review.evaluation"></star-rating>
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
                    {{ review.body }}
                </div>  
                <p class="m-0" style="text-align: right;">
                    <a href="">
                        <i class="fas fa-thumbs-up"></i>参考になった
                    </a>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import StarRating from "../../components/StarRating.vue";
import Loading from "../../components/Loading.vue"
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
            this.loading = true
            const reviewId = parseInt(this.$route.params.id, 10);
            const response = await axios.get(
                `http://localhost:8000/api/v1/reviews/${reviewId}`
            );
            this.review = response.data;
            this.loading = false
        }
    },
    mounted() {
        this.fetchReview();
    }
};
</script>
