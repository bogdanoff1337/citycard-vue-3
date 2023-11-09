<template>
  <div id="app">
    <article>
      <div class="container" :class="{'sign-up-active': (signUp)}">
          <form class="sign-up" v-if="signUp && !isAuthenticated" action="#">
            <h2>Sign Up</h2>
            <div>Use your phone for registration</div>
            <input type="login" placeholder="Login" v-model="login" />
            <input type="phone" placeholder="Phone" v-model="phone" />
            <input type="password" placeholder="Password" v-model="password" />
            <input type="password" placeholder="Password" v-model="passwordConfirmation" />
            <a href="/login" >Already have profile?</a>
            <button @click="register">Sign Up</button>
          </form>
      </div>
    </article>
  </div>
</template>

<script>

import { defineComponent } from 'vue';
import axios from 'axios';


export default defineComponent({
  data() {
    return {
      phone: '',
      login: '',
      password: '',
      role: 'user',
      success: false,
      signUp: true,
      isAuthenticated: false,
    };
  },
  mounted() {
    //..
  },
  methods: {

    register() {
      const data = {
        phone: this.phone,
        login: this.login,
        password: this.password,
        role: this.role,
      };

  axios.post('/api/register', data).then(() => {
    this.success = true;
  }).catch((error) => {
    this.error = error.response.data.message;
  });
},
  },
});
</script>



  

<style>

span {
    font-size: 12px;
}

a {
    color: #333;
    font-size: 14px;
    text-decoration: none;
    margin: 15px 0;
}

button {
    border-radius: 20px;
    border: 1px solid #ff4b2b;
    background-color: #ff4b2b;
    color: #ffffff;
    font-size: 12px;
    font-weight: bold;
    padding: 12px 45px;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
    margin: 10px;
}
.exit{
  
  align-items: center;
  justify-content: center;
}

button:active {
    transform: scale(0.95);
}

button:focus {
    outline: none;
}

button.ghost {
    background-color: transparent;
    border-color: #ffffff;
}

form {
  background-color: #ffffff;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 50px;
  max-width: 400px;
  height: 100%;
  text-align: center;
  border-radius: 12px;
  margin: 0 auto;
}

input {
    background-color: #eee;
    border: none;
    padding: 12px 15px;
    margin: 8px 0;
    width: 100%;
}

.social-container {
    margin: 20px 0;
}

.social-container a {
    border: 1px solid #dddddd;
    border-radius: 50%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin: 0 5px;
    height: 40px;
    width: 40px;
}
  </style>
  