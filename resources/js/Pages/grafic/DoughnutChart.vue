<template>
    <Doughnut id="my-chart-id" :options="chartOptions" :data="chartData" />
</template>

<script>
import { Doughnut } from "vue-chartjs";
import {
    Chart as ChartJS, ArcElement, Tooltip, Legend, Title
} from "chart.js";
ChartJS.register(
    ArcElement, Tooltip, Legend, Title
);

export default {
    props: {
        dataStock: {
            type: Object,
            required: true,
        },
        title: {
            type: String,
            required: true,
        },
    },
    name: "BarChart",
    components: { Doughnut },
    data() {
        return {
            chartData: this.dataStock,
            chartOptions: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Product Stock', // Judul chart
                        font: {
                            size: 18
                        },
                        position: 'top' // Posisi judul
                    }
                }
            },
        };
    },
};
</script>
