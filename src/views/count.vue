<template>
  <div class="count h">
    <my-tab :data="data"></my-tab>
    <router-view name="count" class="h"></router-view>
  </div>
</template>
<script>
import Tab from '../components/tab'
export default {
  name: 'count',
  components: {
    'my-tab': Tab
  },
  data () {
    return {
      data:[{
        text: '地区',
        'url': '/user/count/area'
      }, {
        text: '性别',
        'url': '/user/count/sex'
      }, {
        text: '领域',
        'url': '/user/count/moment'
      }, {
        text: '活跃程度',
        'url': '/user/count/live'
      }]
    }
  }
}
</script>