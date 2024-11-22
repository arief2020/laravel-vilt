<template>
    <DashboardLayout>
        <div>
            <h1 class="text-2xl font-bold mb-4">Report</h1>
            <a
                target="_blank"
                href="/report-pdf"
                class="bg-blue-500 text-white px-4 py-2 rounded"
                rel="noopener noreferrer"
            >
                Print Report
            </a>

            <table class="min-w-full mt-4 text-center">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Staff</th>
                        <th class="border px-4 py-2">Transaction Date</th>
                        <th class="border px-4 py-2">Transaction Type</th>
                        <th class="border px-4 py-2">Total</th>
                        <th class="border px-4 py-2">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="(transaction, index) in transactions"
                        :key="transaction.id"
                    >
                        <td class="border px-4 py-2">{{ index + 1 }}</td>
                        <td class="border px-4 py-2">
                            {{ getUserName(transaction.user_id) }}
                        </td>
                        <td class="border px-4 py-2">
                            {{ transaction.transaction_date }}
                        </td>
                        <td class="border px-4 py-2">
                            {{ transaction.transaction_type }}
                        </td>
                        <td class="border px-4 py-2">
                            {{ transaction.total }}
                        </td>
                        <td class="border px-4 py-2">
                            <Link
                                :href="`/transactions/${transaction.id}`"
                                class="bg-blue-500 text-white px-4 py-2 rounded"
                                >Detail</Link
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </DashboardLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import DashboardLayout from '../../Layouts/DashboardLayout.vue'

const props = defineProps({
    transactions: Array,
    users: Array,
})

const getUserName = (userId) => {
    const user = props.users.find((userParams) => userParams.id === userId)
    return user ? user.name : 'uknown'
}

// const printReport = () => {
//     router.get('/report-pdf')
// }
</script>
