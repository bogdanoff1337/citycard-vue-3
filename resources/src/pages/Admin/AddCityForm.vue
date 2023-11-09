<template>
    <div>
      <form @submit.prevent="addCity">
        <label for="cityName">City Name:</label>
        <input type="text" id="cityName" v-model="cityName" required />
  
        <button type="submit">Add City</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        cityName: '',
        
      };
    },
    methods: {
      addCity() {
        // Логіка для додавання міста
        console.log('City Name:', this.cityName);
        console.log('Population:', this.population);
  
        // Додайте код для відправки даних на сервер або збереження їх у локальній базі даних
      },
    },
  };
  </script>
  