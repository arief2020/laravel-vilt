<template>
    <DashboardLayout>
    <div>
        <h1 class="text-2xl font-bold mb-4">Transactions Details</h1>
        <p>Date : {{ transaction.transaction_date }}</p>
        <p>Type: {{ transaction.transaction_type }}</p>
        <h4 class="text-xl font-bold mb-4">Detail Transaction:</h4>
        <table>
            <thead>
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Product</th>
                    <th class="border px-4 py-2">Quantity</th>
                    <th class="border px-4 py-2">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(transactionDetail, index) in transactionDetails" :key="transactionDetail.id">
                    <td class="border px-4 py-2">{{ index + 1 }}</td>
                    <td class="border px-4 py-2">{{ transactionDetail.product.name }}</td>
                    <td class="border px-4 py-2">{{ transactionDetail.quantity }}</td>
                    <td class="border px-4 py-2">{{ transactionDetail.price }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
const props = defineProps({
    transaction: Object,
    transactionDetails: Array,
})

console.log(props.transaction);
console.log(props.transactionDetails);

const getUserName = (userId) => {
    const user = props.users.find(user => user.id === userId);
    return user ? user.name : 'uknown';
}
</script>
