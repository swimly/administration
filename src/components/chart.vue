<template>
  <div class="chart">
  </div>
</template>
<script>
import ECharts from 'vue-echarts/components/ECharts.vue'
import 'echarts/lib/chart/bar'
import 'echarts/lib/chart/line'
import 'echarts/lib/component/tooltip'
export default {
  components: {
    'chart': ECharts
  }
}
</script>
<style>
.echarts {
  height: 300px;
}
</style>