<template>
    <div class="container">
        <h1>レビュー作成画面</h1>
        <p>株式会社オロ</p>
        <p>東京都目黒区</p>
        <form action="">
            <select name="" id="" >
                <option value="1">短期インターン</option>
                <option value="2">長期インターン</option>
                <option value="3">アルバイト</option>
                <option value="4">その他</option>
            </select>
            <select name="" id="" >
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
            <input
                type="range"
                id="volume"
                name="volume"
                min="0"
                max="5"
                v-model="formData.evaluation"
            />
            <label for="volume">評価</label>
            <textarea
                name=""
                id=""
                cols="30"
                rows="10"
                v-model="formData.body"
            ></textarea>
        </form>
        <button type="button">投稿</button>
    </div>
</template>

<style scoped>
.container {
  max-width: 980px!important;
}
</style>