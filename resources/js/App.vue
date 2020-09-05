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
            <!-- <Footer></Footer> -->
        </footer>
    </div>
</template>

<script>
import StarRating from "./components/StarRating.vue";
import SearchBar from "./components/SerchBar.vue";
import NavMenu from "./components/NavMenu.vue";
import Loading from "./components/Loading.vue";
import Footer from "./components/Footer.vue";
export default {
    components: {
        StarRating,
        SearchBar,
        NavMenu,
        Loading,
        Footer
    },
    data() {
        return {
            loading: true
        };
    },
    methods: {
        async logout() {
            await this.$store.dispatch("auth/logout");
            this.$router.push("/login");
        }
    },
    mounted() {
        setTimeout(() => {
            this.loading = false;
        }, 1000);
    }
};
</script>

<style>
header {
    background-color: #fff;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16),
        0 2px 10px 0 rgba(0, 0, 0, 0.12);
}
footer {
    background-color: #464343;
    position: fixed;
    bottom: 0;
    right: 0;
    left: 0;
}
</style>
