<template>
    <DashboardLayout>
        <div>
            <h1 class="text-2xl font-bold mb-4">Edit Product</h1>
            <form @submit.prevent="form.put(`/products/${props.product.id}`)">
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
                        @input="form.image = $event.target.files[0]"
                        type="file"
                        id="image"
                        class="border px-2 py-1 w-full"
                    />
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
    image: '',
})

const errors = ref({})
</script>
