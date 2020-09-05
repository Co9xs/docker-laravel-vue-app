<template>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="register">
                    <form class="register__form" @submit.prevent="register()">
                        <p class="register__title">
                            ITインターン.comに新規登録
                        </p>
                        <div class="register__row">
                            <div class="register__column">
                                <div class="register__input-group">
                                    <label
                                        class="register__label"
                                        for="register-name"
                                        >名前
                                        <span
                                            class="register__amend register__amend--must"
                                            >必須</span
                                        >
                                        <span
                                            class="register__amend register__amend--private"
                                            >非公開</span
                                        >
                                    </label>
                                    <input
                                        class="register__input"
                                        type="text"
                                        id="register-name"
                                        v-model="registerForm.name"
                                    />
                                </div>
                                <div class="register__input-group">
                                    <label
                                        class="register__label"
                                        for="register-email"
                                        >メールアドレス
                                        <span
                                            class="register__amend register__amend--must"
                                            >必須</span
                                        >
                                        <span
                                            class="register__amend register__amend--private"
                                            >非公開</span
                                        >
                                    </label>
                                    <input
                                        class="register__input"
                                        type="email"
                                        id="register-email"
                                        v-model="registerForm.email"
                                    />
                                </div>
                                <div class="register__input-group">
                                    <label
                                        class="register__label"
                                        for="register-password"
                                        >パスワード
                                        <span
                                            class="register__amend register__amend--must"
                                            >必須</span
                                        >
                                        <span
                                            class="register__amend register__amend--private"
                                            >非公開</span
                                        >
                                    </label>
                                    <input
                                        class="register__input"
                                        type="password"
                                        id="register-password"
                                        v-model="registerForm.password"
                                    />
                                </div>
                                <div class="register__input-group">
                                    <label
                                        class="register__label"
                                        for="register-password-confirm"
                                        >パスワード再入力
                                        <span
                                            class="register__amend register__amend--must"
                                            >必須</span
                                        >
                                        <span
                                            class="register__amend register__amend--private"
                                            >非公開</span
                                        >
                                    </label>
                                    <input
                                        class="register__input"
                                        type="password"
                                        id="register-password-confirm"
                                        v-model="
                                            registerForm.password_confirmation
                                        "
                                    />
                                </div>
                                <div class="register__input-group">
                                    <label
                                        class="register__label"
                                        for="register-sex"
                                        >性別
                                        <span
                                            class="register__amend register__amend--must"
                                            >必須</span
                                        >
                                        <span
                                            class="register__amend register__amend--public"
                                            >公開</span
                                        >
                                    </label>
                                    <div class="register__radio-group">
                                        <input
                                            class="register__radio"
                                            type="radio"
                                            name="register-sex"
                                            id="register-sex-man"
                                            value="男性"
                                            v-model="registerForm.sex"
                                            
                                        />
                                        <label for="register-sex-man"
                                            >男性</label
                                        >
                                        <input
                                            class="register__radio"
                                            type="radio"
                                            name="register-sex"
                                            id="register-sex-rady"
                                            value="女性"
                                            v-model="registerForm.sex"
                                        />
                                        <label for="register-sex-rady"
                                            >女性</label
                                        >
                                    </div>
                                </div>
                                <div class="register__input-group">
                                    <label
                                        class="register__label"
                                        for="register-graduation"
                                        >卒業年
                                        <span
                                            class="register__amend register__amend--must"
                                            >必須</span
                                        >
                                        <span
                                            class="register__amend register__amend--public"
                                            >公開</span
                                        >
                                    </label>
                                    <select
                                        name="graduation-year"
                                        id="register-graduation"
                                        class="register__input"
                                        v-model="registerForm.graduation_year"
                                    >
                                        <option value="19卒">19卒</option>
                                        <option value="20卒">20卒</option>
                                        <option value="21卒">21卒</option>
                                        <option value="22卒"
                                            >22卒</option
                                        >
                                        <option value="23卒">23卒</option>
                                        <option value="24卒">24卒</option>
                                    </select>
                                </div>
                                <div class="register__input-group">
                                    <label
                                        class="register__label"
                                        for="register-shcool"
                                        >大学名
                                        <span
                                            class="register__amend register__amend--optional"
                                            >任意</span
                                        >
                                        <span
                                            class="register__amend register__amend--public"
                                            >公開</span
                                        >
                                    </label>
                                    <input
                                        class="register__input"
                                        type="text"
                                        id="register-shcool"
                                        v-model="registerForm.school_name"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="register__row">
                            <button class="register__btn" type="submit">
                                新規登録
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
export default {
    data() {
        return {
            registerForm: {
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
                sex: "",
                graduation_year: "",
                school_name: ""
            }
        };
    },
    methods: {
        async register() {
            await this.$store.dispatch("auth/register", this.registerForm);
            this.$router.push("/");
        }
    }
};
</script>

<style>

.register {
    margin-top: 50px;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16),
        0 2px 10px 0 rgba(0, 0, 0, 0.12);
}
.register__row {
    display: flex;
    justify-content: center;
    margin-top: 10px;
}
.register__column {
    display: flex;
    flex-direction: column;
    width: 100%;
}

.register__title {
    font-size: 20px;
    font-weight: bold;
    margin: 0;
    padding: 5px;
}

.register__input-group {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 5px;
}

.register__label {
    font-size: 15px;
    margin: 0;
}

.register__input {
    margin: 3px;
    width: 50%;
}

.register__amend {
    font-size: 10px;
    margin: 0;
    padding: 0;
    font-weight: bold;
}

.register__amend--must {
    color: red;
}

.register__amend--private {
    color: #333;
}

.register__amend--optional {
    color: #2d76d1;
}

.register__amend--public {
    color: #4fc251;
}

.register__btn {
    text-align: center;
    padding: 5px 15px;
    background-color: #4fc251;
    border: none;
    border-radius: 3px;
    color: #fff;
    margin-top: 20px;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16),
        0 2px 10px 0 rgba(0, 0, 0, 0.12);
}
</style>
