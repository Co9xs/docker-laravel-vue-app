<template>
  <div class="loading__wrapper">
    <div class="loading__spacer"></div>
    <vue-loading 
      type="spin"
      color="#ffb808"
      :size="{ width: '50px', height: '50px' }"
      >
    </vue-loading>
  </div>
</template>

<script>
import { VueLoading } from 'vue-loading-template'

export default {
  name: 'loading',
  components: {
    VueLoading,
  },

}
</script>

<style>
.loading__wrapper {
  width: 100%;
  height: 100%;
  background: transparent;
  position: absolute;
  top: 0;
  left: 0;
}
.loading__spacer {
  height: 30%;
}
</style>