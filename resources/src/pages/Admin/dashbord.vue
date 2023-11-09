<template>
  
    <div class="d-flex justify-content-center">
        <div class="dropdown">
            <button class="btn-custom dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
             Додати ...
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" @click="toggleForm('city')">Додати місто</a></li>
                <li><a class="dropdown-item" @click="toggleForm('type')">Додати тип</a></li>
                <li><a class="dropdown-item" @click="toggleForm('transport')">Додати транспорт</a></li>
            </ul>
        </div>

        <div class="dropdown">
            <button class="btn-custom dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
             Списки ...
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" @click="toggleShow('ShowCity')">Списки міст</a></li>
                <li><a class="dropdown-item" @click="toggleShow('ShowType')">Списки типів</a></li>
                <li><a class="dropdown-item" @click="toggleShow('ShowTransport')">Списки транспорту</a></li>
            </ul>
        </div>

    
    </div>
    <ShowCity v-if="showCity" :cities="cities" />


      <AddCityForm v-if="showAddCityForm" @cityAdded="onCityAdded" />
      <AddTypeForm v-if="showAddTypeForm" @typeAdded="onTypeAdded" />
      <AddTransportForm v-if="showAddTransportForm" @transportAdded="onTransportAdded" />
  </template>
  
  <script lang="ts">
  import { defineComponent } from 'vue';

import axios from 'axios';

  import AddCityForm from './AddCityForm.vue';
  import AddTypeForm from './AddTypeForm.vue';
  import AddTransportForm from './AddTransportForm.vue';
  
  import ShowCity from './ShowCity.vue';


  export default defineComponent({
    components: {
      AddCityForm,
      AddTypeForm,
      AddTransportForm,
      ShowCity,
    },
    data() {
      return {
        showAddCityForm: false,
        showAddTypeForm: false,
        showAddTransportForm: false,
        showCity: false,
        showType: false,
        showTransport: false,
        cities: [],
      };
    },
    mounted() {
    this.fetchCities();
  },
    methods: {
        fetchCities() {
      axios.get('/api/cities')
        .then(response => {
          this.cities = response.data;
        })
        .catch(error => {
          console.error('Error fetching cities:', error);
        });
    },
        toggleShow(formType: string) {
        this.showCity = formType === 'ShowCity' && !this.showCity;
        this.showType = formType === 'ShowType' && !this.showType;
        this.showTransport = formType === 'ShowTransport' && !this.showTransport;
      },



      toggleForm(formType: string) {
        this.showAddCityForm = formType === 'city' && !this.showAddCityForm;
        this.showAddTypeForm = formType === 'type' && !this.showAddTypeForm;
        this.showAddTransportForm = formType === 'transport' && !this.showAddTransportForm;
      },
      onCityAdded() {
        console.log('City added successfully!');
      },
      onTypeAdded() {
        console.log('Type added successfully!');
      },
      onTransportAdded() {
        console.log('Transport added successfully!');
      },
    },
  });
  </script>
  
  <style lang="less" scoped>
  .btn-group {
    display: flex;
    align-items: center;
  }
  
  button {
    color: #fff;
  }

  .btn-custom {
    background-color: #ff4b2b;
    color: #ffffff;
    font-size: 12px;
    font-weight: bold;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
    margin: 10px;
    border-radius: 0; /* або видаліть цей рядок, якщо не хочете округлення */
}


.dropdown-item{
 cursor: pointer;
}
  
  </style>
  