<template>
  <RouterView />
</template>

<script>
import StarRating from './components/StarRating.vue'
import SearchBar from './components/SerchBar.vue'
export default {
  components: {
    StarRating,
    SearchBar
  },
}
</script>

