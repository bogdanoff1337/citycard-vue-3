<template>
  <div>
    <form v-if="!isAuthenticated" @submit.prevent="login">
      <h2>Sign In</h2>
      <input type="tel" placeholder="Phone" v-model="phone" required/>
      <input type="password" placeholder="Password" v-model="password" required/>
      <a href="/register">Don't have a profile?</a>
      <button type="submit">Sign In</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      phone: '',
      password: '',
      isAuthenticated: false,
      user: null,
    };
  },
  mounted() {
    this.checkAuth();
  },
  methods: {
    async login() {
      try {
        const response = await axios.post('/api/login', {
          phone: this.phone,
          password: this.password,
        });

        if (response.data.success) {
          this.isAuthenticated = true;
          this.user = response.data.user;

          

          window.location.reload('/Home');
          this.$emit('login', { isAuthenticated: this.isAuthenticated, user: this.user });
        } else {
          console.error('Login failed:', response.data.error);
        }
      } catch (error) {
        console.error('Error during login:', error);
      }
    },
    async checkAuth() {
      try {
        const response = await axios.get('/api/check-auth');

        if (response.data.authenticated) {
          this.isAuthenticated = true;
          this.user = response.data.user;
        }
      } catch (error) {
        console.error('Error checking authentication:', error);
      }
    },
  },
};
</script>