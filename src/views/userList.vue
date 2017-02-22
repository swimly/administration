<template>
  <div class="content has-search">
    <table class="form-table search w">
      <tr>
        <th>姓名：</th>
        <td>
          <div class="form w">
            <input v-model="search.name" class="fs-18 c-9" type="text">
          </div>
        </td>
        <th>用户名：</th>
        <td>
          <div class="form w">
            <input v-model="search.username" class="fs-18 c-9" type="text">
          </div>
        </td>
        <th>性别：</th>
        <td>
          <div class="form">
            <input v-model="search.sex" value="0" class="fs-18 c-9" type="radio" id="s1">
            <span></span>
            <label for="s1">男</label>
          </div>
          <div class="form">
            <input v-model="search.sex" value="1" class="fs-18 c-9" type="radio" id="s2">
            <span></span>
            <label for="s2">女</label>
          </div>
        </td>
        <th>部门：</th>
        <td>
          <div class="form w">
            <select name="depart" id="" v-bind:value="depart" v-model="search.ds">
              <option :value="index" v-for="(item, index) in depart">{{item}}</option>
            </select>
          </div>
        </td>
        <th>职位：</th>
        <td>
          <div class="form w">
            <select name="depart" id="" v-bind:value="position" v-model="search.ps">
              <option :value="index" v-for="(item, index) in position">{{item}}</option>
            </select>
          </div>
        </td>
        <td><span class="btn btn-blue fs-14" v-on:click="query">查询</span></td>
      </tr>
    </table>
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
        <th>部门</th>
        <th>注册ip</th>
        <th>平台</th>
        <th>职位</th>
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
          <td v-text="item.depart" align="center"></td>
          <td v-text="item.ip" align="center"></td>
          <td v-text="item.platform" align="center"></td>
          <td v-text="item.position" align="center"></td>
          <td v-text="item.email" align="center"></td>
          <td align="center">
            <a href="javascript:;" title="查看" class="iconfont icon-search"></a>
            <a href="javascript:;" title="编辑" class="iconfont icon-edit"></a>
            <a href="javascript:;" title="删除" class="iconfont icon-delete"></a>
          </td>
        </tr>
      </table>
    </div>
    <div class="fd row w">
      <div class="col v-m t-l">
        <span>总计：<i class="num">{{total}}</i>条</span>
        <span>总计：<i class="num">{{totalPage}}</i>页</span>
        <span>当前：第<i class="num">{{page}}</i>页</span>
      </div>
      <div class="col v-m t-r">
        <router-link to="1" >首页</router-link>
        <a v-on:click="prev" >上一页</a>
        <a v-on:click="next" >下一页</a>
        <router-link :to="totalPage.toString()" >末页</router-link>
      </div>
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
      page: parseInt(this.$route.params.page),
      total: 0,
      totalPage: 0,
      pageSize: 20,
      position: config.position,
      depart: config.depart,
      settings: {
        minScrollbarLength: 60
      },
      search: {
        name: '',
        username: '',
        sex: 0,
        ds: 0,
        ps: 0
      }
    }
  },
  components: {
    config,
    VuePerfectScrollbar
  },
  created () {
    this.list()
    this.num()
  },
  methods: {
    scrollHanle(evt) {
      //console.log(evt)
    },
    next () {
      this.page=this.page<this.totalPage?(this.page+1):this.totalPage
      this.$router.push('' + this.page)
    },
    prev () {
      this.page=this.page>1?(this.page-1):1
      this.$router.push('' + this.page)
    },
    list: function () {
      this.$http.jsonp(config.service,{
        headers: {
        },
        params: {
          api: 'select',
          callback: 'callback',
          table: 'users',
          page: parseInt(this.$route.params.page),
          pageSize: this.pageSize
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
    },
    num: function () {
      this.$http.jsonp(config.service,{
        headers: {
        },
        params: {
          api: 'count',
          callback: 'callback',
          table: 'users'
        },
        emulateJSON: true,
        before: function (req) {
        }
      }).then(
        function (res) {
          this.total = res.body.count
          this.totalPage = Math.ceil(res.body.count/this.pageSize)
        },
        function (res) {}
      )
    },
    query: function () {
      let send = {
        api: 'select',
        callback: 'callback',
        table: 'users',
        page: parseInt(this.$route.params.page),
        pageSize: this.pageSize,
        name: this.search.name,
        username: this.search.username,
        sex: this.search.sex,
        depart: this.search.ds,
        position: this.search.ps
      }
      this.$http.jsonp(config.service,{
        headers: {
        },
        params: {
          api: 'select',
          callback: 'callback',
          table: 'users',
          page: parseInt(this.$route.params.page),
          pageSize: this.pageSize,
          name: this.search.name,
          username: this.search.username,
          sex: this.search.sex,
          depart: this.search.ds,
          position: this.search.ps
        },
        emulateJSON: true,
        before: function (req) {
          console.log(req)
        }
      }).then(
        function (res) {
          this.data = res.body
        },
        function (res) {}
      )
    }
  },
  watch: {
    '$route': function (o,v) {
      console.log(o, v)
      this.list()
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
.list tr:hover{background:#FCF7D6;}
.content{padding:40px 0 40px 0;overflow:hidden;}
.content.has-search{padding-top:100px;}
.content.has-search .search{margin-top:-100px;height:60px;padding:0 2em;}
.content.has-search .hd{margin-top:0;}
.content .hd{margin-top:-40px;}
.content .bd{height:100%;overflow:auto;}
.content .fd{height:40px;border-top:1px solid #eee;}
.content .fd span,.content .fd a{font-size:14px;color:#999;padding:0 1em;cursor: pointer;}
.content .fd .num{color:#559EFE;font-style:normal;padding:0 0.5em;}
.list .iconfont{font-size:1.6em;color:#447DC8;margin:0 5px;}
.scroll-area {position: relative;}
.ps-container>.ps-scrollbar-y-rail{width:6px;}
</style>
