<template>
  <div class="aside">
    <VuePerfectScrollbar class="scroll-area h" v-once :settings="settings" @ps-scroll-y="scrollHanle">
      <ul class="menu">
        <li v-for="item in menu">
          <router-link class="parent row w" :to="item.url"><span class="iconfont col v-m" :class="item.icon"></span><span class="col v-m" v-text="item.text"></span></router-link>
          <div v-if="item.sub" class="sub">
            <router-link class="son" v-for="item in item.sub" v-text="item.text" :to="item.url" ></router-link>
          </div>
        </li>
      </ul>
    </VuePerfectScrollbar>
  </div>
</template>

<script>
import VuePerfectScrollbar from 'vue-perfect-scrollbar'
export default {
  name: 'header',
  components: {
    VuePerfectScrollbar
  },
  props: {
    menu: {
      type: Array,
      default: []
    }
  },
  data () {
    return {
      msg: 'aside',
      settings: {
        minScrollbarLength: 60
      }
    }
  },
  methods: {
    scrollHanle(evt) {
      console.log(evt)
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.aside{width:200px;margin:0 0 0 -200px;height:100%;background:#447DC8;display:inline-block;float:left;}
.menu .parent{font-size:1.5em;color:#fff;padding:1em;border-bottom:1px solid #5E91D0;}
.menu .parent .col{text-align:left;}
.menu .parent .iconfont{width:20%;text-align:center;}
.menu .parent .iconfont:before{position:relative;top:2px;}
.menu .sub{padding:1em;background:#3F73B8;border-bottom:1px solid #5E91D0;}
.menu .sub .son{display:block;font-size:1.3em;color:#b8dbff;padding:0.5em 1em 0.5em 3em;}
.menu .sub .router-link-active{color:#fff;}
.scroll-area {position: relative;}
.ps-container>.ps-scrollbar-y-rail{width:6px;}
</style>
