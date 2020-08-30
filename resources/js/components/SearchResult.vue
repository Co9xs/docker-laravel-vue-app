<template>
    <div class="search-result">
        <p class="search-result__text">
            検索結果：
            <span class="search-result__text--strong">{{ number }}</span>
            件の{{ target }}がヒットしました
        </p>
    </div>
</template>

<script>
export default {
    props: {
        number: Number,
        target: String
    }
};
</script>

<style>
.search-result__text {
  margin: 0;
}

.search-result__text--strong {
  font-size: 20px;
  font-weight: bold;
  color: #ED6054;
}
</style>
