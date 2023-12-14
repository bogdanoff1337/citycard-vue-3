<template>
    <div>
      <form @submit.prevent="saveCity">
        <label for="name">City Name:</label>
        <input name="name" type="text" id="name" v-model="form.name" required />

        <button type="submit">Add City</button>
      </form>
    </div>
  </template>

<script setup>
import useCities from '../../../js/vendor/city.js'
import { reactive } from 'vue'


const form = reactive({
    name: '',
})

const {  storeCity } = useCities()


const saveCity = async () => {
    await storeCity({ ...form })
}
</script>
