<template>
    <div class="review">
        <div class="review__header">
            <div class="company-info">
                <a
                    class="company-info__name"
                    :href="
                        '/companies/' +
                            review.company.corporate_number +
                            '/review/create'
                    "
                >
                    {{ review.company.name }}
                </a>
                <span class="company-info__area">
                    {{ review.company.area }}
                </span>
            </div>
            <div class="action-icons" v-if="review.user.id === user_id">
                <div class="action-icons__delete">
                    <i class="fas fa-trash-alt"></i>
                </div>
                <div class="action-icons__edit">
                    <i class="fas fa-pen"></i>
                </div>
            </div>
        </div>
        <div class="review__user-info">
            <UserInfo :review="review"></UserInfo>
        </div>
        <div class="review__body">
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
                    この口コミの続きを読む>>
                </a>
                <span class="review__time"
                    >投稿日時:{{ review.created_at }}</span
                >
            </div>
        </div>
    </div>
</template>

<script>
import StarRating from "../StarRating.vue";
import UserInfo from "../UserInfo.vue";
import { mapGetters } from "vuex";
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
    },
    computed: {
        ...mapGetters({
            user_id: "auth/userId"
        })
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
    background-clip: border-box;
    padding: 0 10px 10px 0;
}

.review__header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 2px solid #808080;
    border-bottom: 1px solid #7f7f7f;
}

.ellipsis-icon {
    padding: 5px;
    cursor: pointer;
}

.company-info {
    padding: 5px 0;
}

.review__user-info {
    margin: 5px 0px;
}

.company-info__name {
    font-size: 18px;
    margin-right: 10px;
    color: #333;
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

.action-icons {
    display: flex;
    color: #7f7f7f;
}

.action-icons__delete,
.action-icons__edit {
    transform: scale(1.4);
    padding: 3px;
}

.action-icons__delete:hover {
    color: #333;
    transform: scale(1.5);
}

.action-icons__edit:hover {
    color: #333;
    transform: scale(1.5);
}
</style>
