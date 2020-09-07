<template>
  <div class="review-create">
    <form class="review-create__form">
      <p class="review-create__title">"{{review}}"への口コミを編集</p>
      <div class="review-create__row">
        <div class="review-create__column">
          <div class="review-create__input-group">
            <label class="review-create__label" for="volume">総合評価（5段階）</label>
            <input
              class="review-create__input"
              type="range"
              id="volume"
              name="volume"
              min="0"
              max="5"
              v-model="review.evaluation"
            />
          </div>
          <div class="review-create__input-group">
            <label class="review-create__label" for="type_of_work">職種</label>
            <select
              class="review-create__input"
              name="type_of_work"
              id="type_of_work"
              v-model="review.type_of_occupation"
            >
              <option value="フロントエンドエンジニア">フロントエンドエンジニア</option>
              <option value="デザイナー">デザイナー</option>
              <option value="バックエンドエンジニア">バックエンドエンジニア</option>
              <option value="インフラエンジニア">インフラエンジニア</option>
              <option value="機械学習エンジニア">機械学習エンジニア</option>
              <option value="データサイエンティスト">データサイエンティスト</option>
              <option value="iOS&Androidエンジニア">iOS&Androidエンジニア</option>
              <option value="ゲームクリエイター">ゲームクリエイター</option>
              <option value="その他">その他</option>
            </select>
          </div>
          <div class="review-create__input-group">
            <label class="review-create__label" for="term">勤務形態</label>
            <select class="review-create__input" name="term" id="term" v-model="review.work_style">
              <option value="短期インターン">短期インターン</option>
              <option value="長期インターン">長期インターン</option>
              <option value="アルバイト">アルバイト</option>
              <option value="その他">その他</option>
            </select>
          </div>
          <div class="review-create__input-group">
            <label class="review-create__label" for="volume">口コミ本文</label>
            <textarea class="review-create__textarea" cols="40" rows="10" v-model="review.body"></textarea>
          </div>
          <button class="review-create__button" type="button" @click="updateReview(review.id)">更新</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      review: null,
    };
  },
  methods: {
    async getReview() {
      const review_id = this.$route.params.id;
      const response = await axios.get(`/api/v1/reviews/${review_id}`);
      this.review = response.data;
    },
    async updateReview(review_id) {
      const response = await axios.post(
        `/api/v1/reviews/${review_id}/edit`,
        this.review
      );
      this.$router.push(`/reviews/${review_id}`);
    },
  },
  created() {
    this.getReview();
  },
};
</script>
