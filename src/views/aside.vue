<template>
  <div class="aside">
    <ul class="menu">
      <li v-for="item in menu">
        <router-link class="parent" :to="item.url" v-text="item.text"></router-link>
        <div v-if="item.sub" class="sub">
          <router-link class="son" v-for="item in item.sub" v-text="item.text" :to="item.url" ></router-link>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'header',
  props: {
    menu: {
      type: Array,
      default: []
    }
  },
  data () {
    return {
      msg: 'aside'
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.aside{width:200px;margin:0 0 0 -200px;height:100%;background:#447DC8;display:inline-block;float:left;}
.menu .parent{display:block;font-size:1.5em;color:#fff;padding:1em;border-bottom:1px solid #5E91D0;}
.menu .sub{padding:1em;background:#3F73B8;border-bottom:1px solid #5E91D0;}
.menu .sub .son{display:block;font-size:1.3em;color:#b8dbff;padding:0.5em 1em;}
.menu .sub .router-link-active{color:#fff;}
</style>
