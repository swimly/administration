<template>
    <div v-if="" class="chart" id="main">
      
    </div>
</template>
<script>
import chart from '../config/chart'
import echarts from 'echarts/lib/echarts'
import bar from 'echarts/lib/chart/bar'
import tooltip from 'echarts/lib/component/tooltip'
import pie from 'echarts/lib/chart/pie'
import line from 'echarts/lib/chart/line'
import map from 'echarts/lib/chart/map'
import china from '../config/china.json'


export default {
  data () {
    return {
      msg: 'echarts',
      dom: null,
      bar: chart.bar,
      pie: chart.pie,
      line: chart.line,
      map: chart.map
    }
  },
  components: {
    chart
  },
  mounted () {
    this.dom = document.getElementById('main')
    this.getResource(this.dom)
  },
  created () {
  },
  methods: {
    getResource (dom) {
      console.log(this.$route.params.id)
      const type = this.$route.params.id
      switch (type) {
        case 'area':
          this.map.series[0].data = [
              {name: '北京',value: this.randomData() },
              {name: '天津',value: this.randomData() },
              {name: '上海',value: this.randomData() },
              {name: '重庆',value: this.randomData() },
              {name: '河北',value: this.randomData() },
              {name: '河南',value: this.randomData() },
              {name: '云南',value: this.randomData() },
              {name: '辽宁',value: this.randomData() },
              {name: '黑龙江',value: this.randomData() },
              {name: '湖南',value: this.randomData() },
              {name: '安徽',value: this.randomData() },
              {name: '山东',value: this.randomData() },
              {name: '新疆',value: this.randomData() },
              {name: '江苏',value: this.randomData() },
              {name: '浙江',value: this.randomData() },
              {name: '江西',value: this.randomData() },
              {name: '湖北',value: this.randomData() },
              {name: '广西',value: this.randomData() },
              {name: '甘肃',value: this.randomData() },
              {name: '山西',value: this.randomData() },
              {name: '内蒙古',value: this.randomData() },
              {name: '陕西',value: this.randomData() },
              {name: '吉林',value: this.randomData() },
              {name: '福建',value: this.randomData() },
              {name: '贵州',value: this.randomData() },
              {name: '广东',value: this.randomData() },
              {name: '青海',value: this.randomData() },
              {name: '西藏',value: this.randomData() },
              {name: '四川',value: this.randomData() },
              {name: '宁夏',value: this.randomData() },
              {name: '海南',value: this.randomData() },
              {name: '台湾',value: this.randomData() },
              {name: '香港',value: this.randomData() },
              {name: '澳门',value: this.randomData() }
          ]
          var myChart = echarts.init(dom)
          myChart.setOption(this.map)
        break;
        case 'moment':
          var myChart = echarts.init(dom)
          this.bar.series[0].data = [15, 20, 7, 10, 10, 20]
          myChart.setOption(this.bar)
        break;
        case 'sex':
          var myChart = echarts.init(dom)
          this.pie.series[0].data = [
            {value:335, name:'直接访问'},
            {value:310, name:'邮件营销'},
            {value:234, name:'联盟广告'},
            {value:135, name:'视频广告'},
            {value:1548, name:'搜索引擎'}
          ]
          myChart.setOption(this.pie)
        break;
        case 'live':
          var myChart = echarts.init(dom)
          this.line.series = [
              {
                  name:'邮件营销',
                  type:'line',
                  stack: '总量',
                  data:[120, 132, 101, 134, 90, 230, 210]
              },
              {
                  name:'联盟广告',
                  type:'line',
                  stack: '总量',
                  data:[220, 182, 191, 234, 290, 330, 310]
              },
              {
                  name:'视频广告',
                  type:'line',
                  stack: '总量',
                  data:[150, 232, 201, 154, 190, 330, 410]
              },
              {
                  name:'直接访问',
                  type:'line',
                  stack: '总量',
                  data:[320, 332, 301, 334, 390, 330, 320]
              },
              {
                  name:'搜索引擎',
                  type:'line',
                  stack: '总量',
                  data:[820, 932, 901, 934, 1290, 1330, 1320]
              }
          ]
          myChart.setOption(this.line)
        break;
      }
    },
    randomData: function () {
      return Math.round(Math.random()*1000)
    }
  },
  watch: {
    '$route': function (v, o) {
      this.getResource(this.dom)
    }
  }
}
</script>
<style>
.map-view {
  width: 400px;
  height: 300px;
}
</style>