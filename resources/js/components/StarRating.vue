<template>
<div>
  <div class="star-rating">
      <div class="star-rating-front" :style="{ width: calcRating + '%' }">★★★★★</div>
      <div class="star-rating-back">★★★★★</div>
  </div>
  <span>{{ average }}</span>
</div>
</template>

<script>
export default {
  props: {
    averagePoint: Number
  },
  data() {
    return {
    }
  },
  computed: {
    average() {
      return this.averagePoint;
    },
    calcRating() {
      const rate =  (this.average / 5) * 100;
      return rate;
    }
  },
  mounted() {
    console.log('mounted!!!!')
    console.log(this.average)
  }
}
</script>

<style scoped>
.star-rating {
  position: relative;
  width: 5em;
  height: 1em;
  font-size: 18px;
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