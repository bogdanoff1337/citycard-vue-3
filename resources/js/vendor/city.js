import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useCities() {
    const city = ref([])
    const cities = ref([])

    const errors = ref('')
    const router = useRouter()

    const getCities = async () => {
        let response = await axios.get('/api/cities')
        cities.value = response.data.data
    }

    const getCity = async (id) => {
        let response = await axios.get(`/api/cities/${id}`)
        cities.value = response.data.data
    }

    const storeCity = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/cities', data)
            location.reload();
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }

    }

    const updateCity = async (id) => {
        errors.value = ''
        try {
            await axios.patch(`/api/cities/${id}`, city.value)
            location.reload();
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }
    }

    const destroyCity = async (id) => {
        await axios.delete(`/api/cities/${id}`)
    }

    return {
        errors,
        city,
        cities,
        getCity,
        getCities,
        storeCity,
        updateCity,
        destroyCity,
    }
}
