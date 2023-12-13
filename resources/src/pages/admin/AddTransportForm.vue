<template>
    <div>
      <form @submit.prevent="addCity">
        <label for="transportName">Transport Name:</label>
        <input type="text" id="transportName" v-model="typeName" required />

        <label for="price">Price:</label>
        <input type="text" id="price" v-model="price"  required />

  
        <button type="submit">Add Transport</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        transportName: '',
        price: 0,
        
      };
    },
    methods: {
      addCity() {
        
        console.log('transport Name:', this.transportName);
      
  
        
      },
    },
  };
  </script>
  