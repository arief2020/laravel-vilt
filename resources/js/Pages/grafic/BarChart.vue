<template>
    <Bar id="my-chart-id" :options="chartOptions" :data="chartData" />
</template>

<script>
import { Bar } from 'vue-chartjs'
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale,
} from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
    props: {
        data: {
            type: Object,
            required: true,
        },
        title: {
            type: String,
            required: true,
        },
    },
    name: 'BarChart',
    components: { Bar },
    data() {
        return {
            chartData: this.data,
            // chartData: {
            //     labels: ["Cash In", "Cash Out"],
            //     datasets: [
            //         {
            //             label: "Transactions",
            //             backgroundColor: "#f87979",
            //             data: [40, 20],
            //         },
            //     ],
            // },
            chartOptions: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: this.title, // Judul chart
                        font: {
                            size: 18,
                        },
                        position: 'top', // Posisi judul
                    },
                },
            },
        }
    },
}
</script>
