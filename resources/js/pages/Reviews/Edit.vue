<template>
<div class="container">
  <div class="row">
    <div class="col-12">
    <p>口コミを編集</p>
      <div class="card mt-3">
        <div class="card-body pt-0">
            <div class="card-text">
              <form @submit="editReview()">
                <div class="form-group">
                  <label></label>
                  <textarea name="body" required class="form-control" rows="16" placeholder="本文">{{ $review->body ?? old('body') }}</textarea>
                </div>
                <button type="submit" class="btn blue-gradient btn-block">更新する</button>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
data() {
  return {
    
  }
},
methods: {
  editReview() {

  },
  getReview(id) {

  }
}
}
</script>

<style>

</style>