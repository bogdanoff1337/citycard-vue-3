<template>
    <div>
      <form  v-on:submit.prevent="saveCity">

        <label for="name">City Name:</label>
        <input name="name" type="text" id="name" v-model="city.name" required />

        <button type="submit">Update City</button>
      </form>
    </div>
  </template>

<script setup>
import useCities from '../../../js/vendor/city.js'
import { onMounted } from 'vue';

const { errors, city, updateCity, getCity } = useCities()
const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

onMounted(() => getCity(props.id))

const saveCity = async () => {
    await updateCity(props.id)
}
</script>
