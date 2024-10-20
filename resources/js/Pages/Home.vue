<!-- resources/js/Pages/LandingPage.vue -->

<template>
  <div class="bg-gray-50 min-h-screen">
    <!-- Navbar -->
    <header class="fixed top-0 left-0 right-0 bg-white shadow">
      <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
        <div class="text-2xl font-bold">
          Inventory System
        </div>
        <div>
          <a href="/login" class="text-gray-600 hover:text-blue-500 mx-4">Login</a>
          <a href="/register" class="text-gray-600 hover:text-blue-500">Register</a>
        </div>
      </nav>
    </header>

    <!-- Hero Section -->
    <section class="bg-blue-500 text-white text-center flex flex-col justify-center items-center min-h-screen">
      <div>
        <h1 class="text-5xl font-bold">Manage Your Inventory Efficiently</h1>
        <p class="mt-4 text-lg">Track your stock, monitor trends, and manage products in real-time</p>
        <a href="/register" class="mt-8 inline-block bg-white text-blue-500 px-6 py-3 rounded-lg font-semibold">Get Started</a>
      </div>
    </section>

    <!-- Feature Section -->
    <section class="mt-16 px-6 text-center flex flex-col justify-center items-center min-h-screen">
      <h2 class="text-3xl font-semibold mb-8">Features</h2>
      <div class="flex flex-wrap justify-center space-x-8">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm">
          <h3 class="text-xl font-semibold">Manage Products</h3>
          <p class="mt-2">Easily add, edit, and track your inventory items.</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm">
          <h3 class="text-xl font-semibold">Real-Time Stock Monitoring</h3>
          <p class="mt-2">Get instant notifications when stock is low.</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm">
          <h3 class="text-xl font-semibold">Detailed Reports</h3>
          <p class="mt-2">Generate comprehensive reports for inventory management.</p>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section class="px-6 py-16 bg-gray-100 text-center flex flex-col justify-center items-center min-h-screen">
      <h2 class="text-3xl font-semibold">Contact Us</h2>
      <p class="mt-4">Have any questions? We'd love to hear from you.</p>
      <form class="mt-8 max-w-lg w-full">
        <div class="flex flex-col mb-4">
          <label for="name" class="text-left">Name</label>
          <input type="text" id="name" class="p-2 border rounded-lg" placeholder="Your Name">
        </div>
        <div class="flex flex-col mb-4">
          <label for="email" class="text-left">Email</label>
          <input type="email" id="email" class="p-2 border rounded-lg" placeholder="Your Email">
        </div>
        <div class="flex flex-col mb-4">
          <label for="message" class="text-left">Message</label>
          <textarea id="message" class="p-2 border rounded-lg" rows="4" placeholder="Your Message"></textarea>
        </div>
        <button class="bg-blue-500 text-white px-6 py-2 rounded-lg font-semibold">Send Message</button>
      </form>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 text-center">
      <p>Inventory Management System © 2024. All rights reserved.</p>
    </footer>
  </div>
</template>

<script setup>
// No specific logic needed for the static landing page
</script>

<style scoped>
/* Custom styling for the landing page */
</style>
