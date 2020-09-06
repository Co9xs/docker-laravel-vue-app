<template>
    <div class="contaienr">
        <div class="row">
            <button type="button" @click="openModal()">OPEN</button>
            <div class="modal__bg" v-if="isOpen"></div>
            <div class="modal__original" v-if="isOpen">
                <div class="modal__header">
                    <p>本当にこの{{ target }}を削除してよろしいですか？</p>
                </div>
                <div class="modal__body">
                    <div class="modal__actions">
                        <button class="modal__btn modal__btn--delete" type="button">
                            削除する
                        </button>
                        <button
                            class="modal__btn modal__btn--cancel"
                            type="button"
                            @click="closeModal()"
                        >
                            キャンセル
                        </button>
                    </div>
                </div>
            </div>
        </div>
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
.modal__bg {
    background: #000;
    opacity: 0.2;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    width: 100vw;
    height: 100vh;
    z-index: 10;
}
.modal__original {
    width: 300px;
    background-color: #fff;
    position: absolute;
    top: 50%;
    right: 50%;
    transform: translate(50%, -50%);
    z-index: 20;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16),
        0 2px 10px 0 rgba(0, 0, 0, 0.12);
    padding: 20px;
    border-radius: 5px;
}

.modal__btn {
    border: none;
    border-radius: 3px;
    padding: 5px 15px;
    margin-right: 5px;
}

.modal__btn--delete {
    color: #fff;
    background-color: #E75B4E;
}
</style>
