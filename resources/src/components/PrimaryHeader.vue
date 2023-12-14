<template>
  <header class="header">
    <ul class="nav-links">
      <li class="nav-link">
        <router-link class="upward" to="/">Home</router-link>

      </li>
      <li v-if="isAuthenticated" class="nav-link">
        <a >Додати картку</a>
      </li>
      <li v-if="isAuthenticated && user?.role === 'admin'" class="nav-link">
        <router-link to="/dashboard">Dashboard</router-link>
      </li>
      <li class="nav-link">
        <button
          v-if="isAuthenticated"
          class="exit"
          @click="logout"
        >Exit</button>
        <router-link v-else class="forward" to="/login">log in</router-link>
      </li>
    </ul>
  </header>
</template>


<script lang="ts">
import { defineComponent } from 'vue';
import axios from 'axios';

export default defineComponent({
  data() {
    return {
      isAuthenticated: false,
      user: null as null | { role: string },
    };
  },
  mounted() {
    this.checkAuth();
  },
  methods: {
    async checkAuth() {
      try {
        const response = await axios.get("/api/check-auth");
        if (response.data.authenticated) {
          this.isAuthenticated = true;
          this.user = response.data.user;
          sessionStorage.setItem('user', JSON.stringify(this.user));


        }
      } catch (error) {
        console.error(error);
      }
    },
    async logout() {
      try {
        // Викликаємо серверний метод для виходу
        await axios.post('/api/logout');

        // Змінюємо стан відключення
        this.isAuthenticated = false;
        this.user = null;

        // Перенаправляємо користувача на сторінку входу або іншу сторінку
        this.$router.push('/login');
      } catch (error) {
        console.error('Error during logout:', error);
      }
    },

  },
});

</script>

<style lang="less" scoped>
.header {
  width: auto;
  margin: 0 auto;
  height: 100px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.nav-links {
  display: flex;
  align-items: center;
  background: #fff;
  padding: 20px 15px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  cursor: pointer;
}

.nav-links li {
  list-style: none;
  margin: 0 12px;
}

.nav-links li a {
  position: relative;
  color: #333;
  font-size: 20px;
  font-weight: 500;
  padding: 6px 0;
  text-decoration: none;
}

.nav-links li a:before {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  height: 3px;
  width: 0%;
  background: #000;
  border-radius: 12px;
  transition: all 0.4s ease;
}

.nav-links li a:hover:before {
  width: 100%;
}

.nav-links li.center a:before {
  left: 50%;
  transform: translateX(-50%);
}

.nav-links li.upward a:before {
  width: 100%;
  bottom: -5px;
  opacity: 0;
}

.nav-links li.upward a:hover:before {
  bottom: 0px;
  opacity: 1;
}

.nav-links li.forward a:before {
  width: 100%;
  transform: scaleX(0);
  transform-origin: right;
  transition: transform 0.4s ease;
}

.nav-links li.forward a:hover:before {
  transform: scaleX(1);
  transform-origin: left;
}
</style>
