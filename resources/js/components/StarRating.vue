<template>
    <div class="star-rating">
        <p class="star-rating__label">{{ label }}</p>
        <div class="star-rating__star">
            <div
                class="star-rating__front"
                :style="{ width: calcRating + '%' }"
            >
                ★★★★★
            </div>
            <div class="star-rating__back">★★★★★</div>
        </div>
        <span class="star-rating__number">{{ starNum.toFixed(1) }}</span>
    </div>
</template>

<script>
export default {
    props: {
        starNum: Number,
        label: String
    },
    computed: {
        reviewPoint() {
            return this.starNum;
        },
        calcRating() {
            const rate = (this.reviewPoint / 5) * 100;
            return rate;
        }
    }
};
</script>

<style scoped>
.star-rating {
    display: flex;
    align-items: baseline;
}

.star-rating__label {
    margin: 0 5px 0 0;
}

.star-rating__star {
    position: relative;
    width: 5em;
    height: 28px;
    font-size: 18px;
    overflow: hidden;
}

.star-rating__front {
    position: absolute;
    top: 0;
    left: 0;
    overflow: hidden;
    color: #ffb808;
}

.star-rating__back {
    color: #ccc;
}

.star-rating__number {
    font-size: 1.2rem;
    color: #ee6054;
    margin-left: 5px;
    font-weight: bold;
}
</style>
