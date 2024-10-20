<!-- resources/js/Pages/Products.vue -->

<template>
    <DashboardLayout>
      <div class="bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-semibold mb-6">Product List</h1>
        <table class="min-w-full bg-white border border-gray-200">
          <thead>
            <tr class="bg-gray-100">
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm border">#</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm border">Product Name</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm border">Price</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm border">Stock</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(product, index) in products" :key="index">
              <td class="py-3 px-4 border">{{ index + 1 }}</td>
              <td class="py-3 px-4 border">{{ product.name }}</td>
              <td class="py-3 px-4 border">{{ product.price }}</td>
              <td class="py-3 px-4 border">{{ product.stock }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </DashboardLayout>
  </template>
  
  <script setup>
  import DashboardLayout from '@/Layouts/DashboardLayout.vue';
  
  const products = [
    { name: 'Product 1', price: '$100', stock: 20 },
    { name: 'Product 2', price: '$200', stock: 15 },
    { name: 'Product 3', price: '$150', stock: 30 },
    { name: 'Product 4', price: '$250', stock: 10 },
  ];
  </script>
  