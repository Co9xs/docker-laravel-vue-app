<template>
<div class="panel">
  <form class="form" @submit.prevent="login">
    <label for="login-email">Email</label>
    <input type="text" class="form__item" id="login-email" v-model="loginForm.email">
    <label for="login-password">Password</label>
    <input type="password" class="form__item" id="login-password" v-model="loginForm.password">
    <div class="form__button">
      <button type="submit" class="button button--inverse">login</button>
    </div>
  </form>
</div>
</template>

<script>
export default {
  data () {
    return {
      loginForm: {
        email: '',
        password: ''
      },
    }
  },
  methods: {
    async login () {
      await this.$store.dispatch('auth/login', this.loginForm)
      this.$router.push('/home')
    },
  }
}
</script>

<style>

</style>