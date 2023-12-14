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
        activeMenu: null,
      };
    },

    methods: {
        resetForms() {
    this.showAddCityForm = false;
    this.showAddTypeForm = false;
    this.showAddTransportForm = false;
    this.showCity = false;
    this.showType = false;
    this.showTransport = false;
  },
  toggleShow(formType: string) {
    this.resetForms();
    if (formType === 'ShowCity') {
      this.showCity = true;
    } else if (formType === 'ShowType') {
      this.showType = true;
    } else if (formType === 'ShowTransport') {
      this.showTransport = true;
    }
  },
  toggleForm(formType: string) {
    this.resetForms();
    if (formType === 'city') {
      this.showAddCityForm = true;
    } else if (formType === 'type') {
      this.showAddTypeForm = true;
    } else if (formType === 'transport') {
      this.showAddTransportForm = true;
  }},
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
