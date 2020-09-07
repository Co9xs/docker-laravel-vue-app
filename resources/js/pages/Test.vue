<template>
<div class="cta">
    <div class="cta__header">
        <div class="cta__avatar">
            <img src="" alt="">
        </div>
        <p class="cta__name">{{user.name}}</p> 
    </div>
    <div class=""></div>
</div>
</template>

<script>
export default {
    props: {
        target: String
    },
    data() {
        return {
            isOpen: false
        };
    },
    methods: {
        openModal() {
            this.isOpen = true;
        },
        closeModal() {
            this.isOpen = false;
        }
    }
};
</script>

<style>
</style>
