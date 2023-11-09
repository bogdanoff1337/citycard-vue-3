import Login from '../pages/Login.vue';
import Home from '../pages/Home.vue';
import Register from '../pages/Register.vue';
import Dashbord from '../pages/admin/dashbord.vue';

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

  {
    path: '/dashbord',
    name: 'Dashbord',
    component: Dashbord,
  },


];

export default routes;
