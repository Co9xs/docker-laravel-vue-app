<template>
    <div class="review">
        <div class="company-info">
            <a class="company-info__name">
                {{ review.company.name }}
            </a>
            <span class="company-info__area">
                {{ review.company.area }}
            </span>
        </div>
        <div class="review__user-info">
            <UserInfo :review="review"></UserInfo>
        </div>
        <div class="review__content">
            <div class="review__evaluation">
                <StarRating
                    :starNum="review.evaluation"
                    :label="'総合評価'"
                ></StarRating>
            </div>
            <div class="review__body">
                {{ excerpt(review.body, 100) }}
            </div>
            <div class="review__bottom">
                <a class="review__link" :href="'/reviews/' + review.id">
                この口コミの詳細へ>>
                </a>
                <span class="review__time">{{ review.created_at }}</span>
            </div>
        </div>
    </div>
</template>

<script>
import StarRating from "../StarRating.vue";
import UserInfo from "../UserInfo.vue";
export default {
    components: {
        StarRating,
        UserInfo
    },
    props: {
        review: Object
    },
    methods: {
        excerpt(text, max) {
            if (text.length > max) {
                return text.substr(0, max) + "...";
            }
            return text;
        }
    }
};
</script>

<style scoped>
.review {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    /* background-color: #fff; */
    background-clip: border-box;
    /* border-top: 2px solid #808080; */
    padding: 0 10px 10px 10px;
}

.company-info {
    padding: 5px 0;
    border-top: 2px solid #808080;
    border-bottom: 1px solid #7F7F7F;
}

.review__user-info {
    margin: 5px 0px;
}

.company-info__name {
    font-size: 18px;
    margin-right: 10px;
}

.company-info__area {
    font-size: 14px;
}

.review__bottom {
    display: flex;
    justify-content: space-between;
    align-items: baseline;
}

.review__time {
    font-size: 12px;
    color: #333;
}
</style>
