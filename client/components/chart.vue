<template>
  <div class="small">
    <BarChart :chart-data="datacollection"></BarChart>
  </div>
</template>

<script>
import BarChart from './BarChart.js'

export default {
  components: {
    BarChart
  },
  data: () => ({
    datacollection: {
      labels: ['6', '', '', '9', '', '', '12', '', '', '15', '', '', '18', '', '', '21'],
      datasets: [
        {
          label: false,
          backgroundColor: '#3296fa',
          data: [0, 1, 2, 3, 4, 5, 6, 7, 7, 6, 5, 4, 3, 2, 1, 0]
        }
      ],
      options: {
        scales: {
          yAxes: [{
            ticks: {
              suggestedMin: 50,
              suggestedMax: 100
            }
          }]
        }
      }
    }
  })
}
</script>

<style>
  .small {
    width: 300px;
    height: 200px;
    margin:  150px auto;
  }
</style>
