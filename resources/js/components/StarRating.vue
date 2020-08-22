<template>
<div class="star-rating">
    <div class="star-rating-front" :style="{ width: calcRating + '%' }">★★★★★</div>
    <div class="star-rating-back">★★★★★</div>
</div>
</template>

<script>
export default {
  props: {
    starNum: Number,
  },
  computed: {
    reviewPoint() {
      return this.starNum;
    },
    calcRating() {
      const rate = (this.reviewPoint / 5) * 100;
      return rate;
    },
  },
};
</script>

<style scoped>
.star-rating {
  position: relative;
  width: 5em;
  height: 28px;
  font-size: 18px;
  overflow: hidden;
}
.star-rating-front {
  position: absolute;
  top: 0;
  left: 0;
  overflow: hidden;
  color: #ffcc33;
}
.star-rating-back {
  color: #ccc;
}
</style>