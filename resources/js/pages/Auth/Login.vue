<template>
    <div class="container">
        <Loading v-show="loading"></Loading>
        <div class="row" v-show="!loading">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="login">
                    <form class="login__form" @submit.prevent="login()">
                        <p class="login__title">
                            ログイン
                        </p>
                        <p class="login__message" v-if="hasLoginError">
                            メールアドレスまたはパスワードが間違っています。
                        </p>
                        <div class="login__row">
                            <div class="login__column">
                                <div class="login__input-group">
                                    <label
                                        class="login__label"
                                        for="login-email"
                                        >メールアドレス
                                    </label>
                                    <input
                                        class="login__input"
                                        type="email"
                                        id="login-email"
                                        v-model="loginForm.email"
                                    />
                                </div>
                                <div class="login__input-group">
                                    <label
                                        class="login__label"
                                        for="login-password"
                                        >パスワード
                                    </label>
                                    <input
                                        class="login__input"
                                        type="password"
                                        id="login-password"
                                        v-model="loginForm.password"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="login__row">
                            <button class="login__btn" type="submit">
                                ログイン
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</template>

<script>
import { options } from "../../toastOptions";
import Loading from "../../components/Loading";

export default {
    components: {
        Loading
    },
    data() {
        return {
            loginForm: {
                email: "",
                password: "",
                password_confirmation: ""
            },
            hasLoginError: false,
            loading: false,
        };
    },
    methods: {
        login() {
            this.hasLoginError = false;
            this.loading = true;
            this.$store.dispatch("auth/login", this.loginForm)
            .then(response => {
                this.loading = false;
                this.$router.push("/");
                this.showToast("ログインしました", options);
            }).catch(error => {
                this.loading = false;
                this.hasLoginError = true;
            })
        },
        showToast(message, options) {
            this.$toasted.success(message, options);
        }
    }
};
</script>

<style>
.login {
    margin-top: 50px;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16),
        0 2px 10px 0 rgba(0, 0, 0, 0.12);
}
.login__row {
    display: flex;
    justify-content: center;
    margin-top: 10px;
}
.login__column {
    display: flex;
    flex-direction: column;
    width: 100%;
}

.login__title {
    font-size: 20px;
    font-weight: bold;
    margin: 0;
    padding: 5px;
}

.login__message {
    font-size: 15px;
    margin: 0;
    padding: 0;
    color: #dc143c;
}

.login__input-group {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 5px;
}

.login__label {
    font-size: 15px;
    margin: 0;
}

.login__input {
    margin: 3px;
    width: 50%;
}

.login__btn {
    text-align: center;
    padding: 5px 15px;
    background-color: #FFB808;
    border: none;
    border-radius: 3px;
    color: #fff;
    margin-top: 20px;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16),
        0 2px 10px 0 rgba(0, 0, 0, 0.12);
}
</style>
