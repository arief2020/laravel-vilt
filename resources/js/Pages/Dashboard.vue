<template>
    <DashboardLayout>
      <h1 class="text-3xl font-semibold">Welcome to Inventory Management System!</h1>
      <div class="flex flex-col justify-center items-center">
        <div class="text-center border-2 border-gray-200 p-4 m-4 flex gap-4 bg-white">
            <div class="border-r-2 border-gray-200 px-2">
                <p class="text-xl font-semibold">Cash In</p>
                <p>{{ cashIn }}</p>
            </div>
            <div class="px-2">
                <p class="text-xl font-semibold">Total Transaction</p>
                <p>{{ totalTransactions }}</p>
            </div>
            <div class="border-l-2 border-gray-200 px-2">
                <p class="text-xl font-semibold">Cash Out</p>
                <p>{{ cashOut }}</p>
            </div>
        </div>
        <div class="flex justify-evenly w-full items-bottom">
            <div class="w-1/2 bg-white p-6">
                <BarChart :data="dataStock" :title="'Product Stock'"/>
            </div>
            <div class="w-1/3 bg-white p-6">
                <DoughnutChart :dataStock="data" :title="'Product Stock'"/>
            </div>
        </div>
      </div>
    </DashboardLayout>
  </template>

  <script setup>
  import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import BarChart from './grafic/BarChart.vue';
import DoughnutChart from './grafic/DoughnutChart.vue';

  const props = defineProps({
      totalTransactions: Number,
      cashIn: Number,
      cashOut: Number,
      products: Array
  })

  const data = {
      labels: ['Cash In', 'Cash Out'],
      datasets: [
          {
              label: 'Transactions',
              backgroundColor: ['#79f879', '#f87979'],
              data: [props.cashIn, props.cashOut]
          }
      ]
  }

  const productsName = props.products.map(product => product.name);
  const productsStock = props.products.map(product => product.stock);
  const randomColors = (length) => {
    const colors = [];
    for (let i = 0; i < length; i++) {
        let color = "#";
        for (let j = 0; j < 6; j++) {  // 6 karakter hex untuk format warna
            color += Math.floor(Math.random() * 16).toString(16);
        }
        colors.push(color);
    }
    return colors;
};

  const dataStock = {
      labels: [...productsName],
      datasets: [
          {
              backgroundColor: randomColors(productsName.length),
              data: [...productsStock],
          },
      ],
  }
  </script>
