<template>
    <div>
      <h2>Список міст</h2>
      <ul>
        <li v-for="city in cities" :key="city.id">{{ city.name }}</li>
      </ul>
    </div>
  </template>

<script setup>
import useCity from '../../../js/vendor/city.js'
import { reactive } from 'vue'


const form = reactive({
    cityName: '',
})

const {  storeCity } = useCity()


const saveCity = async () => {
    await storeCity({ ...form })
}
</script>

  <style scoped>

  </style>
