<template>
    <DashboardLayout>
        <div>
            <h1 class="text-2xl font-bold mb-4">Edit Product</h1>
            <form @submit.prevent="form.put(`/products/${props.product.id}`)">
            <!-- <form @submit.prevent="submit"> -->
                <div class="mb-4">
                    <label class="block" for="name">Product Name</label>
                    <input
                        v-model="form.name"
                        type="text"
                        id="name"
                        class="border px-2 py-1 w-full"
                    />
                    <span v-if="errors.name" class="text-red-500">{{
                        errors.name[0]
                    }}</span>
                </div>
                <!-- Category Dropdown -->
                <div class="mb-4">
                    <label class="block" for="category">Category</label>
                    <select
                        v-model="form.category_id"
                        id="category"
                        class="border px-2 py-1 w-full"
                    >
                        <option disabled value="">
                            Please select a category
                        </option>
                        <option
                            v-for="category in categories"
                            :key="category.id"
                            :value="category.id"
                        >
                            {{ category.name }}
                        </option>
                    </select>
                    <span v-if="errors.category_id" class="text-red-500">{{
                        errors.category_id[0]
                    }}</span>
                </div>

                <!-- Stock -->
                <div class="mb-4">
                    <label class="block" for="stock">Stock</label>
                    <input
                        v-model="form.stock"
                        type="number"
                        step="0.01"
                        id="stock"
                        class="border px-2 py-1 w-full"
                    />
                    <span v-if="errors.stock" class="text-red-500">{{
                        errors.stock[0]
                    }}</span>
                </div>
                <div class="mb-4">
                    <label class="block" for="price">Price</label>
                    <input
                        v-model="form.price"
                        type="number"
                        id="price"
                        class="border px-2 py-1 w-full"
                    />
                    <span v-if="errors.price" class="text-red-500">{{
                        errors.price[0]
                    }}</span>
                </div>
                <div class="mb-4">
                    <label class="block" for="image">Image</label>
                    <input
                        @change="handleFileUpload"
                        type="file"
                        id="image"
                        class="border px-2 py-1 w-full"
                    />
                    <!-- <input
                        @input="form.image = $event.target.files[0]"
                        type="file"
                        id="image"
                        class="border px-2 py-1 w-full"
                    /> -->
                    <span v-if="errors.image" class="text-red-500">{{
                        errors.image[0]
                    }}</span>
                </div>
                <button
                    type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded"
                >
                    Update
                </button>
            </form>
        </div>
    </DashboardLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import { ref } from 'vue'
import DashboardLayout from '../../Layouts/DashboardLayout.vue'

const props = defineProps({
    product: Object,
    categories: Array,
})

const form = useForm({
    name: props.product.name,
    stock: props.product.stock,
    category_id: props.product.category_id,
    price: props.product.price,
    image: props.product.image,
})

const errors = ref({})

// const submit = () => {
//     // form.put(`/products/${props.product.id}`, {
//     //     forceFormData: true,
//     // })

//     form.put(`/products/${props.product.id}`, {
//         forceFormData: true,
//     })
// }
</script>

<!-- <script>
import { Inertia } from '@inertiajs/inertia'
import DashboardLayout from '../../Layouts/DashboardLayout.vue'

export default {
    data() {
        return {
            form: {
                name: '',
                category_id: '', // Tambahkan category_id di form
                price: '',
                stock: '',
                image: null,
            },
            // categories: [],  // Untuk menyimpan data categories
            errors: {},
        }
    },
    props: {
        categories: Array,
        product: Object,
    },
    components: {
        DashboardLayout,
    },

    mounted() {
        this.form.name = this.product.name
        this.form.category_id = this.product.category_id
        this.form.price = this.product.price
        this.form.stock = this.product.stock
        this.form.image = this.product.image
    },

    methods: {
        handleFileUpload(event) {
            ;[this.form.image] = event.target.files
        },
        async submit() {
            this.errors = {}
            const formData = new FormData()
            formData.append('name', this.form.name)
            formData.append('category_id', this.form.category_id) // Tambahkan category_id
            formData.append('stock', this.form.stock)
            formData.append('price', this.form.price)
            if (this.form.image) {
                formData.append('image', this.form.image)
            }

            try {
                await Inertia.put(`/products/${this.product.id}`, formData) // Sesuaikan URL sesuai rute API-mu
            } catch (error) {
                if (error.response && error.response.status === 422) {
                    this.errors = error.response.data.errors
                }
            }
        },
    },
}
</script> -->
