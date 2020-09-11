<template>
    <div class="wrapper">
        <div class="loading">
            <Loading v-show="loading"></Loading>
        </div>
        <div class="main" v-show="!loading">
            <header>
                <NavMenu></NavMenu>
            </header>
            <main>
                <RouterView></RouterView>
            </main>
            <footer>
                <Footer></Footer>
            </footer>
        </div>
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
.wrapper {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.main {
    margin: 0;
    display: flex;
    flex-flow: column;
    min-height: 100vh;
}
header {
    background-color: #fff;
}
footer {
    margin-top: auto;
    background-color: #464343;
}
</style>
