<template>
  <div class="alert">
    <div class="content">
      <h2>{{title}}</h2>
      <p>{{content}}</p>
      <div class="btnarea"><span v-on:click="cancel" class="btn btn-orange">取消</span><span v-on:click="confirm" class="btn btn-blue">确认</span></div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'alert',
  props: ['title', 'content', 'confirm', 'cancel']
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.alert{position:fixed;top:0;left:0;bottom:0;right:0;background:rgba(0,0,0,0.4);z-index:100;}
.alert h2{font-weight:normal;font-size:15px;color:#666;border-bottom:1px solid #f5f5f5;padding-bottom:10px;margin-bottom:10px;min-width:20em;}
.alert p{font-size:14px;color:#999;padding:1em 0;text-indent:2em;}
.alert .btnarea{margin-top:10px;text-align:right;}
.alert .btn{margin-left:1em;}
.alert .content{background:#fff;box-shadow:0 1px 4px #ccc;padding:10px;box-sizing:border-box;border-radius:10px;display:inline-block;transform: translate(-50%,-50%);top:50%;left:50%;position:fixed;}
</style>
