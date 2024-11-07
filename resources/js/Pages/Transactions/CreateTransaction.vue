<template>
    <DashboardLayout>
        <div>
            <h1 class="text-2xl font-bold mb-4">New Transaction</h1>
            <form @submit.prevent="submit">
                <!-- date transaction -->
                <div class="mb-4">
                    <label class="block" for="date">Date of Transaction</label>
                    <input
                        v-model="form.transaction_date"
                        type="date"
                        id="date"
                        class="border px-2 py-1 w-full"
                    />
                    <span v-if="errors.date" class="text-red-500">{{
                        errors.date[0]
                    }}</span>
                </div>

                <!-- Transaction Type -->
                <div class="mb-4">
                    <label class="block" for="category">Transaction Type</label>
                    <select
                        v-model="form.transaction_type"
                        id="category"
                        class="border px-2 py-1 w-full"
                    >
                        <option disabled value="">
                            Please select a category
                        </option>
                        <option value="cash_in">Cash In</option>
                        <option value="cash_out">Cash Out</option>
                    </select>
                    <span v-if="errors.transaction_type" class="text-red-500">{{
                        errors.transaction_type[0]
                    }}</span>
                </div>

                <!-- Transaction Detail -->
                <!-- table product -->
                <table
                    v-if="dataFormProducts.length != 0"
                    class="min-w-full my-4 text-center"
                >
                    <thead class="bg-white">
                        <tr>
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Product</th>
                            <th class="border px-4 py-2">Quantity</th>
                            <th class="border px-4 py-2">Price</th>
                            <th class="border px-4 py-2">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(product, index) in dataFormProducts"
                            :key="product.id"
                        >
                            <td class="border px-4 py-2">{{ index + 1 }}</td>
                            <td class="border px-4 py-2">
                                {{ findProduct(product.id).name }}
                            </td>
                            <td class="border px-4 py-2">
                                {{ product.quantity }}
                            </td>
                            <td class="border px-4 py-2">
                                {{ findProduct(product.id).price }}
                            </td>
                            <td class="border px-4 py-2">
                                {{ product.price }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- end table -->
                <!-- select product -->
                <div v-if="openFormProduct">
                    <div class="mb-4">
                        <label class="block" for="category">Product</label>
                        <select
                            v-model="dataFormProduct.id"
                            id="category"
                            class="border px-2 py-1 w-full"
                        >
                            <option disabled value="">
                                Please select a category
                            </option>
                            <option
                                v-for="product in products"
                                :key="product.id"
                                :value="product.id"
                            >
                                {{ product.name }}
                            </option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block" for="stock">Quantity</label>
                        <input
                            v-model="dataFormProduct.quantity"
                            type="number"
                            step="0.01"
                            id="stock"
                            class="border px-2 py-1 w-full"
                        />
                        <span v-if="errors.stock" class="text-red-500">{{
                            errors.stock[0]
                        }}</span>
                    </div>
                </div>
                <!-- end transaction detail -->
                <button
                    v-if="!openFormProduct"
                    @click="openFormProduct = !openFormProduct"
                    class="bg-blue-500 text-white px-4 py-2 rounded mr-4"
                >
                    New Product
                </button>
                <button
                    v-if="openFormProduct"
                    @click="addDataProduct"
                    class="bg-blue-500 text-white px-4 py-2 rounded mr-4"
                >
                    Add Product
                </button>
                <button
                    @click="openFormProduct = false"
                    v-if="openFormProduct"
                    class="bg-red-500 text-white px-4 py-2 rounded"
                >
                    Cancel
                </button>

                <div class="mt-4">
                    <button
                        type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded"
                    >
                        Create
                    </button>
                </div>
            </form>
        </div>
    </DashboardLayout>
</template>

<script>
import { Inertia } from '@inertiajs/inertia'
import DashboardLayout from '../../Layouts/DashboardLayout.vue'

export default {
    data() {
        return {
            form: {
                transaction_date: '',
                transaction_type: '', // Tambahkan category_id di form
                total: 0,
                products: [],
            },
            // categories: [],  // Untuk menyimpan data categories
            errors: {},
            openFormProduct: false,
            dataFormProduct: {
                id: 0,
                quantity: 0,
                price: 0,
            },
            dataFormProducts: [],
            exampleProducts: [
                {
                    id: 1,
                    name: 'Product 1',
                    quantity: 1,
                    price: 10000,
                    total: 10000,
                },
                {
                    id: 2,
                    name: 'Product 2',
                    quantity: 2,
                    price: 20000,
                    total: 40000,
                },
                {
                    id: 3,
                    name: 'Product 3',
                    quantity: 3,
                    price: 30000,
                    total: 90000,
                },
            ],
        }
    },

    props: {
        categories: Array,
        products: Array,
    },
    components: {
        DashboardLayout,
    },

    methods: {
        findProduct(id) {
            const product = this.products.find(
                (productParams) => productParams.id === id
            )
            return product || ''
        },

        addDataProduct() {
            const productPrice = this.findProduct(this.dataFormProduct.id).price

            this.dataFormProduct.price =
                productPrice * this.dataFormProduct.quantity

            this.dataFormProducts.push(this.dataFormProduct)
            this.dataFormProduct = {
                id: 0,
                quantity: 0,
                price: 0,
            }

            this.openFormProduct = false
            // console.log(this.dataFormProducts)
        },

        handleFileUpload(event) {
            ;[this.form.image] = event.target.files
        },

        submit() {
            this.form.total = this.dataFormProducts.reduce(
                (total, product) => total + product.price,
                0
            )
            this.form.products = this.dataFormProducts
            // console.log(this.form)

            try {
                Inertia.post('/transactions', this.form)
            } catch (error) {
                if (error.response && error.response.status === 422) {
                    this.errors = error.response.data.errors
                }
            }
        },
    },
}
</script>
