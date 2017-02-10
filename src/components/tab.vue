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