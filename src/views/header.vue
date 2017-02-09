<template>
  <div class="header">
    <h1 v-text="logo"></h1>
    <ul class="row">
      <li class="col v-m" v-text="user">
      </li>
      <li class="col v-m">
        <router-link v-for="item in nav" :to="item.url">
          <span class="iconfont" :class="item.icon"></span>
          <span v-text="item.text"></span>
        </router-link>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'header',
  props: {
    logo: {
      type: String,
      default: ''
    },
    nav: {
      type: Array,
      default: []
    },
    user: {
      type: String,
      default: ''
    }
  },
  data () {
    return {
      msg: 'header'
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
