<template>
<nav class="nav">
    <div class="nav__right">
        <a class="nav__logo" href="">
            <i class="fas fa-laptop-code mr-2 fa-lg"></i>ITインターン.com
        </a>
        <ul class="nav__list">
            <li class="nav__item">
                <a class="nav__link" href="">
                    <i class="far fa-comment-dots fa-lg"></i>
                    <span class="nav__link--sub-text">口コミを見る</span>
                </a>
            </li>
            <li class="nav__item">
                <a class="nav__link" href="">
                    <i class="fas fa-pen mr-1 fa-lg"></i>
                    <span class="nav__link--sub-text">口コミを書く</span>
                </a>
            </li>
        </ul>
    </div>
    <ul class="nav__list">
        <li class="nav__item" v-if="!isLogin">
            <a class="nav__link" href="/register">新規登録</a>
        </li>
        <li class="nav__item" v-if="!isLogin">
            <a class="nav__link" href="/login">ログイン</a>
        </li>
        <li class="nav__item" v-if="isLogin">
            <a class="nav__link" href="/home">マイページ</a>
        </li>
        <li class="nav__item" v-if="isLogin">
            <a class="nav__link" @click="logout">ログアウト</a>
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
.nav {
    max-width: 1110px;
    height: 70px;
    padding: 0 15px;
    margin-right: auto;
    margin-left: auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.nav__right {
    display: flex;
    align-items: center;
}

.nav__logo {
    vertical-align: middle;
    font-size: 18px;
    color: #333;
}

.nav__list {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}

.nav__item {
    text-align: center;
    padding-left: 15px;
}

.nav__link {
    text-align: center;
    color: #333;
}

.nav__link--sub-text {
    display: block;
    font-size: 12px;
}

</style>
