<template>
<div class="d-flex justify-content-center">
    <table class="table table-warning mx-auto">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="city in cities" :key="city.id">
        <th scope="row">{{ city.id }}</th>
        <td>{{ city.name }}</td>
        <td> <router-link :to="{ name: 'city.edit', params: { id: city.id } }"
                    class="px-4 py-2 rounded-md text-white border border-transparent bg-indigo-600 cursor-pointer hover:bg-indigo-700">Edit</router-link> </td>
        <td><button @click="deleteCity(city.id)"
            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">
            Delete</button></td>
        </tr>

    </tbody>

    </table>

</div>
</template>

<script setup>
import useCities from '../../../js/vendor/city.js'
import { onMounted } from 'vue';

//  import { Bootstrap5Pagination } from 'laravel-vue-pagination';

const { cities, getCities, destroyCity  } = useCities()

const deleteCity = async (id) => {
    if (!window.confirm('You sure?')) {
        return
    }

    await destroyCity(id)
    await getCities()
}


onMounted(getCities)

</script>

  <style scoped>

  .table{

    width: 50%;
  }

  .btn-update {
    background-color: #2b39ff;
    color: #ffffff;
    font-size: 12px;
    font-weight: bold;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
    margin: 10px;
    border-radius: 0; /* або видаліть цей рядок, якщо не хочете округлення */
}

  </style>
