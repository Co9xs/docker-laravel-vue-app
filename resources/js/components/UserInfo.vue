<template>
<div class="user d-flex flex-row">
    <div class="user__avatar">
        <!-- <img :src="'../../../../public/storage/top.jpg'"> -->
    </div>
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
  },
  mounted() {
    // console.log(this.review)
  }
}
</script>

<style>
.user__avatar {
  width: 46px;
  height: 46px;
  border: 1px #efefef solid;
  border-radius: 50%;
  overflow: hidden;
  margin-right: 5px;
}

</style>