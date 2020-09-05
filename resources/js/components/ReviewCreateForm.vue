<template>
    <div class="review-create">
        <form class="review-create__form">
            <p class="review-create__title">
                "{{ company.name }}"への新規口コミ投稿
            </p>
            <div class="review-create__row">
              <div class="review-create__column">
                <div class="review-create__input-group">
                <label class="review-create__label" for="volume">総合評価（5段階）</label
                >
                <input
                    class="review-create__input"
                    type="range"
                    id="volume"
                    name="volume"
                    min="0"
                    max="5"
                />
            </div>
            <div class="review-create__input-group">
                <label class="review-create__label" for="type_of_work"
                    >職種</label
                >
                <select
                class="review-create__input"
                    name="type_of_work"
                    id="type_of_work"
                >
                    <option value="1">フロントエンドエンジニア</option>
                    <option value="2">デザイナー</option>
                    <option value="3">バックエンドエンジニア</option>
                    <option value="4">インフラエンジニア</option>
                    <option value="5">機械学習エンジニア</option>
                    <option value="6">データサイエンティスト</option>
                    <option value="7">iOS&Androidエンジニア</option>
                    <option value="8">ゲームクリエイター</option>
                    <option value="9">その他</option>
                </select>
            </div>
            <div class="review-create__input-group">
                <label class="review-create__label" for="term">勤務形態</label>
                <select class="review-create__input" name="term" id="term">
                    <option value="1">短期インターン</option>
                    <option value="2">長期インターン</option>
                    <option value="3">アルバイト</option>
                    <option value="4">その他</option>
                </select>
            </div>
            <div class="review-create__input-group">
                <label class="review-create__label" for="volume"
                    >口コミ本文</label
                >
                <textarea
                    class="review-create__textarea"
                    cols="40"
                    rows="10"
                ></textarea>
            </div>
            <button
                class="review-create__button"
                type="button"
            >
                投稿する
            </button>
              </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
  props: {
    company: Object
  }
}
</script>

<style scoped>
.review-create__form {
    padding: 16px 0;
}

.review-create__title {
    font-size: 18px;
}

.review-create__input-group {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: left;
    margin-bottom: 16px;
    }

.review-create__label {
    margin: 0;
    font-weight: bold;
}
.review-create__input {
  width: 50%;
}
.review-create__textarea {
    padding: 5px;
}

.review-create__button {
    color: #fff;
    background-color: #4fc251;
    border: none;
    border-radius: 2px;
    padding: 5px 16px;
}
</style>
