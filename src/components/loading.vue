<template>
  <div class="loading row">
    <div class="col v-m t-c">
      <img src="static/img/loading.gif" alt="">
      <p>正在努力加载中！</p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'loading'
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.loading{width:100%;height:100%;font-size:14px;color:#666;}
.loading img{width:200px;}
</style>
