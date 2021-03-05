<template>
    <div>
        <div class="modal__bg"></div>
        <div class="modal__original">
            <div class="modal__header">
                <p>この{{ target }}を{{ action }}しますか？</p>
            </div>
            <div class="modal__body">
                <div class="modal__actions">
                    <button
                        class="modal__btn modal__btn--delete"
                        type="button"
                        @click="actionRequest"
                    >
                        {{ action }}する
                    </button>
                    <button
                        class="modal__btn modal__btn--cancel"
                        type="button"
                        @click="close"
                    >
                        キャンセル
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        target: String,
        action: String
    },
    methods: {
        close() {
            this.$emit("close");
        },
        actionRequest() {
            this.$emit('action')
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
.modal__header {
    color: #333;
}
.modal__btn {
    border: none;
    border-radius: 3px;
    padding: 5px 15px;
    margin-right: 5px;
}

.modal__btn--delete {
    color: #fff;
    background-color: #e75b4e;
}
</style>
