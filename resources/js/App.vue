<template>
<div>
    <Loading v-show="loading"></Loading>
    <header v-show="!loading">
        <NavMenu></NavMenu>
    </header>
    <main v-show="!loading">
        <RouterView></RouterView>
    </main>
    <footer v-show="!loading">
    </footer>
</div>
</template>

<script>
import StarRating from "./components/StarRating.vue";
import SearchBar from "./components/SerchBar.vue";
import NavMenu from "./components/NavMenu.vue";
import Loading from "./components/Loading.vue";
export default {
    components: {
        StarRating,
        SearchBar,
        NavMenu,
        Loading
    },
    data() {
        return {
            loading: true
        }
    },
    methods: {
    async logout () {
        await this.$store.dispatch('auth/logout')
        this.$router.push('/login')
    }
    },
    mounted() {
    setTimeout(() => {
        this.loading = false;
    }, 1000);
    },
};
</script>

<style>
header {
    background-color: #fff;
    box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.16),
    0 2px 7px 0 rgba(0, 0, 0, 0.12);
}
</style>