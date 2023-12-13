import { ref } from 'vue'
import axios from 'axios'


export default function useCity() {
    const city = ref([])
    const cities = ref([])



    const getCities = async () => {
        let response = await axios.get('/api/get-city')
        cities.value = response.data.data
    }

    const getСity = async () => {
        let response = await axios.get(`/api/companies`)
        company.value = response.data.data
    }

    const storeCity = async (data) => {

        try {
            await axios.post('api/storeCity', data)

        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }

    }

    // const updateCompany = async (id) => {
    //     errors.value = ''
    //     try {
    //         await axios.patch(`/api/companies/${id}`, company.value)
    //         await router.push({ name: 'companies.index' })
    //     } catch (e) {
    //         if (e.response.status === 422) {
    //             for (const key in e.response.data.errors) {
    //                 errors.value = e.response.data.errors
    //             }
    //         }
    //     }
    // }

    return {


        cities,

        getCities,
        storeCity,

    }
}
