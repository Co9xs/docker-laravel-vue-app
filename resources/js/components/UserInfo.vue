<template>
    <div class="user d-flex flex-row">
        <div v-if="review.user.sex === '男性'" class="user__avatar user__avatar--man"></div>
        <div v-if="review.user.sex === '女性'" class="user__avatar user__avatar--woman"></div>
        <div class="user__info">
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
</template>

<script>
export default {
    props: {
        review: Object
    }
};
</script>

<style>
.user__avatar {
    width: 46px;
    height: 46px;
    border: 1px #efefef solid;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 5px;
    background-size: cover;
}

.user__avatar--man {
    background-image: url('/img/man.png');
}

.user__avatar--woman {
    background-image: url('/img/woman.png');
}
</style>
