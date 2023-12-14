import Login from '../pages/Login.vue';
import Home from '../pages/Home.vue';
import Register from '../pages/Register.vue';
import Dashbord from '../pages/admin/dashbord.vue';
import UpdateCityForm from '../pages/admin/UpdateCityForm.vue'


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
    path: '/dashboard',
    name: 'Dashbord',
    component: Dashbord,
  },

  {
    path: '/city/:id',
    name: 'city.edit',
    component: UpdateCityForm,
    props: true
},


];

export default routes;
