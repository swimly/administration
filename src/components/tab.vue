<template>
  <div class="tab">
    <router-link v-for="item in data" :to="item.url" v-text="item.text"></router-link>
  </div>
</template>
<script>
  export default {
    name: 'count',
    props: {
      data: {
        type: Array,
        default: []
      }
    }
  }
</script>
<style>
.tab{display:block;background:#f9f9f9;border-bottom:1px solid #f0f0f0;}
.tab a{font-size:1.4em;padding:1em 2em;display:inline-block;color:#666;margin:0 0.5em;}
.tab .router-link-active{color:#559EFE;position:relative;}
.tab .router-link-active:after{content:"";display:inline-block;width:100%;height:2px;background:#559EFE;position:absolute;bottom:-1px;left:0;}
</style>