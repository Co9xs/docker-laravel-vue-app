<template>
    <nav class="navbar navbar-expand navbar-light bg-white shadow-sm">
        <a class="navbar-brand" href="/"
            ><i class="fas fa-laptop-code mr-2 fa-lg"></i>ITインターン.com</a
        >
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/reviews">
                    <i class="far fa-comment-dots fa-lg"></i>
                    <span class="nav-link__text">口コミを見る</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/companies">
                    <i class="fas fa-pen mr-1 fa-lg"></i>
                    <span class="nav-link__text">口コミを書く</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item" v-if="!isLogin">
                <a class="nav-link nav-link__blue" href="/register">新規登録</a>
            </li>
            <li class="nav-item" v-if="!isLogin">
                <a class="nav-link nav-link__blue" href="/login">ログイン</a>
            </li>
            <li class="nav-item" v-if="isLogin">
                <a class="nav-link" href="/home">マイページ</a>
            </li>
            <li class="nav-item" v-if="isLogin">
                <a class="nav-link" @click="logout">ログアウト</a>
            </li>
        </ul>
    </nav>
</template>

<script>
import { mapGetters } from "vuex";
export default {
    methods: {
        async logout() {
            await this.$store.dispatch("auth/logout");
            this.$router.push("/login");
        }
    },
    computed: {
        ...mapGetters({
            isLogin: "auth/checkAuth"
        })
    }
};
</script>

<style scoped>
.nav-link {
    text-align: center;
}

.nav-link__text {
    display: block;
    font-size: 12px;
}

.nav-link__blue {
    color: #0665d6!important;
}
</style>
