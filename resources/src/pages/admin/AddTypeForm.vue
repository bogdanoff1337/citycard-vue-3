<template>
    <div>
      <form @submit.prevent="addCity">
        <label for="typeName">Type Name:</label>
        <input type="text" id="typeName" v-model="typeName" required />
  
        <button type="submit">Add Type</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        typeName: '',
        
      };
    },
    methods: {
      addCity() {
        // Логіка для додавання міста
        console.log('City Name:', this.typeName);
      
  
        // Додайте код для відправки даних на сервер або збереження їх у локальній базі даних
      },
    },
  };
  </script>
  