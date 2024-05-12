<template>

  <h1>Главная</h1>
  <Activity/>

  <DoughnutChart :chartData="testData"/>

  https://vue-chart-3.netlify.app/guide/usage/
  https://www.chartjs.org/docs/master/getting-started/
</template>
<script setup lang="ts">

import {DoughnutChart} from 'vue-chart-3';
import {Chart, registerables} from "chart.js";
import Activity from "@/widgets/Activity/ui/Activity.vue";


Chart.register(...registerables);


const testData = {
  labels: ['Paris', 'Nîmes', 'Toulon', 'Perpignan', 'Autre'],
  datasets: [
    {
      data: [30, 40, 60, 70, 5],
      backgroundColor: ['#77CEFF', '#0079AF', '#123E6B', '#97B0C4', '#A5C8ED'],
    },
  ],
};



</script>

<style scoped>

</style>
