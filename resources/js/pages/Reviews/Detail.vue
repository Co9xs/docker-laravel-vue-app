<template>
    <div class="container">
        <div class="card mt-3">
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
                <!-- <div class="card-text">
        {{ excerpt(review.body, 50) }}
      </div> -->
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
export default {
    components: {
        StarRating
    },
    data() {
        return {
            review: {}
        };
    },
    methods: {
        async fetchReview() {
            const reviewId = parseInt(this.$route.params.id, 10);
            const response = await axios.get(
                `http://localhost:8000/api/v1/reviews/${reviewId}`
            );
            this.review = response.data;
        }
    },
    mounted() {
        this.fetchReview();
    }
};
</script>
