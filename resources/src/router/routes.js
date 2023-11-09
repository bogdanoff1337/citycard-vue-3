import Login from '../pages/Login.vue';
import Home from '../pages/Home.vue';
import Register from '../pages/Register.vue';

const routes = [

  {
    path: '/',
    name: 'Home',
    component: Home,
  },

  {
    path: '/Register',
    name: 'Register',
    component: Register,
  },

  {
    path: '/Login',
    name: 'Login',
    component: Login,
  },


];

export default routes;
