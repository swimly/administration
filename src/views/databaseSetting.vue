<template>
  <div class="setting">
    提醒宝宝吃药
    <table class="form-table w-60">
      <colgroup>
        <col width="20%">
        <col width="80%">
      </colgroup>
      <tr>
        <th>服务器地址：</th>
        <td>
          <div class="form w">
            <input v-model="service" class="fs-18 c-9" type="text">
          </div>
        </td>
      </tr>
      <tr>
        <th>用户名：</th>
        <td>
          <div class="form w">
            <input v-model="username" class="fs-18 c-9" type="text">
          </div>
        </td>
      </tr>
      <tr>
        <th>密码：</th>
        <td>
          <div class="form w">
            <input v-model="password" class="fs-18 c-9" type="text">
          </div>
        </td>
      </tr>
      <tr>
        <th>数据库名称：</th>
        <td>
          <div class="form w">
            <input v-model="database" class="fs-18 c-9" type="text">
          </div>
        </td>
      </tr>
      <tr>
        <th>端口号：</th>
        <td>
          <div class="form w">
            <input v-model="port" class="fs-18 c-9" type="text">
          </div>
        </td>
      </tr>
      <tr>
        <th>前缀：</th>
        <td>
          <div class="form w">
            <input v-model="prefix" class="fs-18 c-9" type="text">
          </div>
        </td>
      </tr>
      <tr>
        <th>字符编码：</th>
        <td>
          <div class="form w">
            <input v-model="charset" class="fs-18 c-9" type="text">
          </div>
        </td>
      </tr>
      <tr>
        <th></th>
        <td>
          <span class="btn btn-blue fs-14">保存</span>
          <span class="btn btn-orange fs-14" v-on:click="link">测试连接</span>
        </td>
      </tr>
    </table>
  </div>
</template>
<script>
import config from '../config'
export default {
  name: 'databasesetting',
  data(){
    return {
      service: '',
      username: '',
      password: '',
      database: '',
      port: '',
      prefix: '',
      charset: 'utf-8'
    }
  },
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