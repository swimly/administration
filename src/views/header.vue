<template>
  <div class="header">
    <div class="row w h">
      <div class="col v-m">
        <h1 v-text="logo" class="logo"></h1>
      </div>
      <div class="col v-m t-r">
        <ul class="row user">
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
    </div>
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
.header{height:80px;margin:-80px 0 0 -200px;background:#559EFE;}
.logo{font-size:0;background:url(../assets/logo.png) no-repeat 20px center;display:inline-block;height:50px;width:400px;vertical-align: middle;}
.user{font-size:1.4em;color:#fff;}
.user a{color:#fff;margin-right:1em;padding-left:1em;}
</style>
