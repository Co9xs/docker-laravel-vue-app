<template>
<div>
    <header>
        <NavMenu />
    </header>
    <main>
        <RouterView />
    </main>
</div>
</template>

<script>
import StarRating from "./components/StarRating.vue";
import SearchBar from "./components/SerchBar.vue";
import NavMenu from "./components/NavMenu.vue";
export default {
    components: {
        StarRating,
        SearchBar,
        NavMenu
    },
    methods: {
    async logout () {
        await this.$store.dispatch('auth/logout')
        this.$router.push('/login')
    }
    },
};
</script>
