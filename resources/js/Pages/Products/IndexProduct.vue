<template>
    <DashboardLayout>
        <div>
            <h1 class="text-2xl font-bold mb-4">Products</h1>
            <Link
                href="/products/create"
                class="bg-blue-500 text-white px-4 py-2 rounded"
                >Add Product</Link
            >

            <table class="min-w-full mt-4 text-center">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Image</th>
                        <th class="border px-4 py-2">Name</th>
                        <th class="border px-4 py-2">Category</th>
                        <th class="border px-4 py-2">Stock</th>
                        <th class="border px-4 py-2">Price</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(product, index) in products" :key="product.id">
                        <td class="border px-4 py-2">{{ index + 1 }}</td>
                        <td
                            class="border px-4 py-2 flex items-center justify-center"
                        >
                            <img
                                :src="`/storage/${product.image}`"
                                :alt="product.name"
                                class="w-16 h-16 object-cover"
                            />
                        </td>
                        <td class="border px-4 py-2">{{ product.name }}</td>
                        <td class="border px-4 py-2">
                            {{ getCategoryName(product.category_id) }}
                        </td>
                        <td class="border px-4 py-2">{{ product.stock }}</td>
                        <td class="border px-4 py-2">{{ product.price }}</td>
                        <td class="border px-4 py-2 flex gap-2 justify-center">
                            <Link
                                :href="`/products/${product.id}/edit`"
                                class="bg-yellow-500 text-white px-4 py-2 rounded"
                                >Edit</Link
                            >
                            <form
                                @submit="deleteProduct(product.id)"
                                class="inline-block"
                            >
                                <button
                                    type="submit"
                                    class="bg-red-500 text-white px-4 py-2 rounded"
                                >
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </DashboardLayout>
</template>

<!-- <script>
import { Link } from '@inertiajs/inertia-vue3'
import DashboardLayout from '../../Layouts/DashboardLayout.vue'

export default {
    props: {
        products: Array,
        categories: Array,
    },
    components: {
        DashboardLayout,
    },
    mounted() {
        console.log(this.categories)
        console.log(this.products)
    },
    methods: {
        async deleteProduct(id) {
            if (confirm('Are you sure you want to delete this product?')) {
                await this.$inertia.delete(`/products/${id}`)
            }
        },

        getCategoryName(categoryId) {
            const cateogry = this.categories.find(
                (category) => category.id === categoryId
            )?.name
            return cateogry || 'Unknown'
        },
    },
}
</script> -->

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
import DashboardLayout from '../../Layouts/DashboardLayout.vue'

const props = defineProps({
    products: Array,
    categories: Array,
})

const getCategoryName = (categoryId) => {
    const cateogry = props.categories.find(
        (category) => category.id === categoryId
    )?.name
    return cateogry || 'Unknown'
}

const deleteProduct = async (id) => {
    if (confirm('Are you sure you want to delete this product?')) {
        Inertia.delete(`/products/${id}`)
    }
}
</script>
