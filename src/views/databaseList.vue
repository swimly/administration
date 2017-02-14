<template>
  <div>
    数据库
  </div>
</template>
<script>
  export default {
    name: 'dataList',
    methods: {
      link: function () {
        this.$http.jsonp(config.service,{
          params: {
            api: 'database_list',
            service: this.service,
            username: this.username,
            password: this.password,
            database: this.database,
            port: this.port,
            prefix: this.prefix,
            charset: this.charset
          },
          emulateJson: true
        })
        .then(function (res) {
          console.log(res)
        },function (res) {
          console.log(res)
        })
      }
    }
  }
</script>