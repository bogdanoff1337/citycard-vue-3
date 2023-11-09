import { createApp } from 'vue';
import App from "../src/app.vue";
import Router from '../src/router/router.js';
import store from './store';

createApp(App).use(store).use(Router).mount('#app');
