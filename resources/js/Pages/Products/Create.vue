<template>
    <DashboardLayout>
    <div>
        <h1 class="text-2xl font-bold mb-4">Add Product</h1>
        <form @submit.prevent="submit">
            <!-- Product Name -->
            <div class="mb-4">
                <label class="block" for="name">Product Name</label>
                <input v-model="form.name" type="text" id="name" class="border px-2 py-1 w-full" />
                <span v-if="errors.name" class="text-red-500">{{ errors.name[0] }}</span>
            </div>

            <!-- Category Dropdown -->
            <div class="mb-4">
                <label class="block" for="category">Category</label>
                <select v-model="form.category_id" id="category" class="border px-2 py-1 w-full">
                    <option disabled value="">Please select a category</option>
                    <option v-for="category in categories" :key="category.id" :value="category.id">
                        {{ category.name }}
                    </option>
                </select>
                <span v-if="errors.category_id" class="text-red-500">{{ errors.category_id[0] }}</span>
            </div>

            <!-- Stock -->
            <div class="mb-4">
                <label class="block" for="stock">Stock</label>
                <input v-model="form.stock" type="number" step="0.01" id="stock" class="border px-2 py-1 w-full" />
                <span v-if="errors.stock" class="text-red-500">{{ errors.stock[0] }}</span>
            </div>

            <!-- Price -->
            <div class="mb-4">
                <label class="block" for="price">Price</label>
                <input v-model="form.price" type="number" step="0.01" id="price" class="border px-2 py-1 w-full" />
                <span v-if="errors.price" class="text-red-500">{{ errors.price[0] }}</span>
            </div>

            <!-- Image Upload -->
            <div class="mb-4">
                <label class="block" for="image">Image</label>
                <input @change="handleFileUpload" type="file" id="image" class="border px-2 py-1 w-full" />
                <span v-if="errors.image" class="text-red-500">{{ errors.image[0] }}</span>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
        </form>
    </div>
    </DashboardLayout>
</template>


<!-- <script>
import DashboardLayout from '../../Layouts/DashboardLayout.vue';

export default {
    data() {
        return {
            form: {
                name: '',
                description: '',
                price: '',
                image: null,
            },
            errors: {},
        };
    },
    components: {
        DashboardLayout,
    },
    methods: {
        handleFileUpload(event) {
            this.form.image = event.target.files[0];
        },
        async submit() {
            this.errors = {};
            const formData = new FormData();
            formData.append('name', this.form.name);
            formData.append('description', this.form.description);
            formData.append('price', this.form.price);
            if (this.form.image) {
                formData.append('image', this.form.image);
            }
            await this.$inertia.post('/products', formData);
        },
    },
};
</script> -->

<script>
import DashboardLayout from '../../Layouts/DashboardLayout.vue';
import { Inertia } from '@inertiajs/inertia';

export default {
    data() {
        return {
            form: {
                name: '',
                category_id: '',  // Tambahkan category_id di form
                price: '',
                stock: '',
                image: null,
            },
            // categories: [],  // Untuk menyimpan data categories
            errors: {},
        };
    },
    props: {
        categories: Array,
    },
    components: {
        DashboardLayout,
    },
    // mounted() {
        // Fetch categories ketika komponen di-mount
        // this.fetchCategories();
    // },
    methods: {
        // async fetchCategories() {
        //     try {
        //         const response = await axios.get('/categories');  // Sesuaikan URL jika perlu
        //         this.categories = response.data;
        //     } catch (error) {
        //         console.error('Error fetching categories:', error);
        //     }
        // },
        handleFileUpload(event) {
            this.form.image = event.target.files[0];
        },
        async submit() {
            this.errors = {};
            const formData = new FormData();
            formData.append('name', this.form.name);
            formData.append('category_id', this.form.category_id);  // Tambahkan category_id
            formData.append('stock', this.form.stock);
            formData.append('price', this.form.price);
            if (this.form.image) {
                formData.append('image', this.form.image);
            }

            try {
                await Inertia.post('/products', formData);  // Sesuaikan URL sesuai rute API-mu
            } catch (error) {
                if (error.response && error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            }
        },
    },
};
</script>
