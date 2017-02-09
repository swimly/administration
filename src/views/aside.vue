<template>
  <div class="aside">
    <ul>
      <li v-for="item in menu">
        <router-link :to="item.url" v-text="item.text"></router-link>
        <div v-if="item.sub">
          <router-link v-for="item in item.sub" v-text="item.text" :to="item.url"></router-link>
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
</style>
