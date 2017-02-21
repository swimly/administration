<template>
  <div class="content">
    <table class="list w">
      <colgroup>
        <col width="5%">
        <col width="10%">
        <col width="10%">
        <col width="5%">
        <col width="7%">
        <col width="12%">
        <col width="8%">
        <col width="7%">
        <col width="15%">
        <col width="15%">
      </colgroup>
      <tr>
        <th>序号</th>
        <th>姓名</th>
        <th>用户名</th>
        <th>性别</th>
        <th>微信号</th>
        <th>注册ip</th>
        <th>平台</th>
        <th>浏览器</th>
        <th>邮箱</th>
        <th>操作</th>
      </tr>
      <tr v-for="(item, index) in data">
        <td v-text="index+1" align="center"></td>
        <td v-text="item.name" align="left"></td>
        <td v-text="item.username" align="left"></td>
        <td v-text="item.sex" align="center"></td>
        <td v-text="item.wechat" align="center"></td>
        <td v-text="item.ip" align="center"></td>
        <td v-text="item.platform" align="center"></td>
        <td v-text="item.browser" align="center"></td>
        <td v-text="item.email" align="center"></td>
        <td align="center">
          <a href="javascript:;">查看</a>
          <a href="javascript:;">编辑</a>
          <a href="javascript:;">删除</a>
        </td>
      </tr>
    </table>
  </div>
</template>

<script>
import config from '../config'
export default {
  name: 'header',
  data () {
    return {
      data: null
    }
  },
  components: {
    config
  },
  created () {
    this.list();
  },
  methods: {
    list: function () {
      this.$http.jsonp(config.service,{
        headers: {
        },
        params: {
          api: 'select',
          callback: 'callback',
          table: 'users',
          page:1,
          pageSize:15
        },
        emulateJSON: true,
        before: function (req) {
        }
      }).then(
        function (res) {
          this.data = res.body
        },
        function (res) {}
      )
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.list{border:1px solid #eee;table-layout: fixed;border-collapse: collapse;border-spacing: 0;}
.list th{font-weight:normal;font-size:16px;color:#666;height:40px;background:#EDEDED;border:1px solid #eee;}
.list td{font-size:14px;padding:1em;color:#666;border:1px solid #eee;}
</style>
