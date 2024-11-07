<!-- resources/js/Pages/Login.vue -->

<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-50">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
            <form @submit.prevent="login">
                <div class="mb-4">
                    <label
                        for="email"
                        class="block text-sm font-medium text-gray-700"
                        >Email</label
                    >
                    <input
                        id="email"
                        type="email"
                        v-model="form.email"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-2"
                        placeholder="you@example.com"
                        required
                    />
                </div>
                <div class="mb-4">
                    <label
                        for="password"
                        class="block text-sm font-medium text-gray-700"
                        >Password</label
                    >
                    <input
                        id="password"
                        type="password"
                        v-model="form.password"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-2"
                        placeholder="********"
                        required
                    />
                </div>
                <button
                    type="submit"
                    class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg"
                >
                    Login
                </button>
            </form>
            <div class="text-center mt-4">
                <p>
                    Don't have an account?
                    <a href="/register" class="text-blue-500">Register</a>
                </p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

const form = reactive({
    email: '',
    password: '',
})

const login = () => {
    // Submit form login ke server
    Inertia.post('/login', form)
}
</script>
