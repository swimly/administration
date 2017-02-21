<template>
  <div class="content">
    <table class="list w hd">
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
    </table>
    <div class="bd">
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
            <a href="javascript:;" title="查看" class="iconfont icon-search"></a>
            <a href="javascript:;" title="编辑" class="iconfont icon-edit"></a>
            <a href="javascript:;" title="删除" class="iconfont icon-delete"></a>
          </td>
        </tr>
      </table>
    </div>
  </div>
</template>

<script>
import config from '../config'
import VuePerfectScrollbar from 'vue-perfect-scrollbar'
export default {
  name: 'header',
  data () {
    return {
      data: null,
      settings: {
        minScrollbarLength: 60
      }
    }
  },
  components: {
    config,
    VuePerfectScrollbar
  },
  created () {
    this.list();
  },
  methods: {
    scrollHanle(evt) {
      //console.log(evt)
    },
    list: function () {
      this.$http.jsonp(config.service,{
        headers: {
        },
        params: {
          api: 'select',
          callback: 'callback',
          table: 'users',
          page:1,
          pageSize:20
        },
        emulateJSON: true,
        before: function (req) {
        }
      }).then(
        function (res) {
          this.data = res.body
          console.log(this.data)
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
.list td{font-size:14px;padding:0.8em 1em;color:#666;border:1px solid #eee;}
.list tr:nth-child(odd){background:#f9f9f9;}
.content{padding:40px 0 40px 0;overflow:hidden;}
.content .hd{margin-top:-40px;}
.content .bd{height:100%;overflow:auto;}
.list .iconfont{font-size:1.6em;color:#447DC8;margin:0 5px;}
.scroll-area {position: relative;}
.ps-container>.ps-scrollbar-y-rail{width:6px;}
</style>
