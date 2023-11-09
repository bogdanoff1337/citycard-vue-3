<template>
    <div>
      <h2>Список міст</h2>
      <ul>
        <li v-for="city in cities" :key="city.id">{{ city.name }}</li>
      </ul>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        cities: [],
      };
    },
    mounted() {
      this.fetchCities();
    },
    methods: {
      fetchCities() {
        axios.get('/get-sity')
          .then(response => {
            this.cities = response.data;
          })
          .catch(error => {
            console.error('Error fetching cities:', error);
          });
      },
    },
  };
  </script>
  
  <style scoped>
  /* Додайте свої стилі тут */
  </style>
  