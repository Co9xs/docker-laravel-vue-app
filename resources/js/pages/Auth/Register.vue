<template>
<div class="panel">
  <form class="form" @submit.prevent="register">
    <label for="username">Name</label>
    <input type="text" class="form__item" id="username" v-model="registerForm.name">
    <label for="email">Email</label>
    <input type="text" class="form__item" id="email" v-model="registerForm.email">
    <label for="password">Password</label>
    <input type="password" class="form__item" id="password" v-model="registerForm.password">
    <label for="password-confirmation">Password (confirm)</label>
    <input type="password" class="form__item" id="password-confirmation" v-model="registerForm.password_confirmation">
    <div class="form__button">
      <button type="submit" class="button button--inverse">register</button>
    </div>
  </form>
</div>
</template>

<script>
export default {
  data () {
    return {
      registerForm: {
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
      }
    }
  },
  methods: {
    async register () {
      await this.$store.dispatch('auth/register', this.registerForm)
      this.$router.push('/')
    }
  }
}
</script>