<template>
    <div>
      <form @submit.prevent="saveCity">
        <label for="cityName">City Name:</label>
        <input type="text" id="cityName" v-model="form.cityName" required />

        <button type="submit">Add City</button>
      </form>
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
