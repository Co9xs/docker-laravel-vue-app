<template>
<div class="search-bar">
    <input
        v-model="keyword"
        :placeholder="this.defaultText"
        class="search-bar__input"
        type="text"
        @keyup.enter="serch()"
    />
    <button @click="serch()" class="search-bar__btn" type="button">
        検索
    </button>
</div>
</template>

<script>
export default {
    props: {
        defaultText: String
    },
    data() {
        return {
            keyword: "",
            errorMessage: [],
            reviews: []
        };
    },
    methods: {
        validateForSearch(keyword) {
            if (keyword.trim().length > 30) {
                throw new Error("キーワードは30文字以内で指定してください");
            }
        },
        async serch() {
          this.$emit('input', this.keyword)
        }
    }
};
</script>

<style scoped>
.search-bar {
    position: relative;
    width: 100%;
    height: 40px;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16),
        0 2px 10px 0 rgba(0, 0, 0, 0.12);
    border-radius: 5px;
}

.search-bar__input {
    position: absolute;
    left: 0;
    width: 80%;
    height: 100%;
    border: none;
    padding: 5px;
    border-radius: 3px 0 0 3px;
}

.search-bar__btn {
    position: absolute;
    right: 0;
    width: 20%;
    height: 100%;
    border: none;
    background-color: #ffb808;
    border-radius: 0 3px 3px 0;
}
</style>
