<template>
  <div class="content has-search">
    <transition v-if="showalert" name="fade" mode="out-in">
      <alert title="删除" content="您是否确认删除此条记录！" :confirm="deled" :cancel="cancel"></alert>
    </transition>
    <table class="form-table search w">
      <colgroup>
        <col width="5%">
        <col width="15%">
        <col width="5%">
        <col width="15%">
        <col width="5%">
        <col width="10%">
        <col width="5%">
        <col width="10%">
        <col width="10%">
        <col width="5%">
        <col width="5%">
      </colgroup>
      <tr>
        <th>名称：</th>
        <td>
          <div class="form w">
            <input v-model="search.title" class="fs-18 c-9" type="text">
          </div>
        </td>
        <th>上传者：</th>
        <td>
          <div class="form w">
            <input v-model="search.author" class="fs-18 c-9" type="text">
          </div>
        </td>
        <th>分类：</th>
        <td>
          <div class="form w">
            <select name="depart" id="" v-bind:value="projectType" v-model="search.cs">
              <option :value="index" v-for="(item, index) in projectType">{{item}}</option>
            </select>
          </div>
        </td>
        <th>开始时间段：</th>
        <td>
          <div class="form w">
            <datepicker v-model="search.startTime"></datepicker>
          </div>
        </td>
        <td>
          <div class="form w">
            <datepicker v-model="search.endTime"></datepicker>
          </div>
        </td>
        <td class="p-0"><span class="btn btn-orange fs-14" v-on:click="reset">重置</span></td>
        <td class="p-0"><span class="btn btn-blue fs-14" v-on:click="query">查询</span></td>
      </tr>
    </table>
    <table class="list w hd">
      <colgroup>
        <col width="5%">
        <col width="15%">
        <col width="10%">
        <col width="10%">
        <col width="10%">
        <col width="10%">
        <col width="8%">
        <col width="7%">
        <col width="15%">
        <col width="10%">
      </colgroup>
      <tr>
        <th>序号</th>
        <th>名称</th>
        <th>分类</th>
        <th>上传者</th>
        <th>开始时间</th>
        <th>结束时间</th>
        <th>仓库</th>
        <th>预览</th>
        <th>标签</th>
        <th>操作</th>
      </tr>
    </table>
    <div class="bd">
      <my-loading v-if="isloading"></my-loading>
      <my-null v-if="isnull"></my-null>
      <table class="list w" v-if="!isloading">
        <colgroup>
          <col width="5%">
          <col width="15%">
          <col width="10%">
          <col width="10%">
          <col width="10%">
          <col width="10%">
          <col width="8%">
          <col width="7%">
          <col width="15%">
          <col width="10%">
        </colgroup>
        <tr v-for="(item, index) in data">
          <td v-text="index+1" align="center"></td>
          <td v-text="item.title" align="left"></td>
          <td v-text="tp(item.classify)" align="center"></td>
          <td v-text="item.author" align="center"></td>
          <td v-text="item.startTime" align="center"></td>
          <td v-text="item.endTime" align="center"></td>
          <td v-text="item.github" align="center"></td>
          <td v-text="item.preview" align="center"></td>
          <td v-html="tag(item.tag)" align="center"></td>
          <td align="center">
            <a href="javascript:;" :row="item.id" title="查看" class="iconfont icon-search"></a>
            <a href="javascript:;" :row="item.id" title="编辑" class="iconfont icon-edit"></a>
            <a href="javascript:;" :row="item.id" title="删除" v-on:click="del(item.id)" class="iconfont icon-delete"></a>
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
        <router-link to="1" :class="page==1?'none':''">首页</router-link>
        <a :class="page==1?'none':''" v-on:click="prev" >上一页</a>
        <a v-on:click="next"  :class="page==totalPage?'none':''">下一页</a>
        <router-link :to="totalPage.toString()"  :class="page==totalPage?'none':''">末页</router-link>
      </div>
    </div>
  </div>
</template>

<script>
import config from '../config'
import VuePerfectScrollbar from 'vue-perfect-scrollbar'
import loading from '../components/loading'
import nodata from '../components/null'
import datepicker from 'vue-date'
import alert from '../components/alert'
export default {
  name: 'projectList',
  data () {
    return {
      data: null,
      isloading: false,
      isnull: true,
      page: parseInt(this.$route.params.page),
      total: 0,
      totalPage: 0,
      pageSize: 20,
      show: false,
      showalert: false,
      delid: null,
      projectType: config.projectType,
      settings: {
        minScrollbarLength: 60
      },
      search: {
        title: '',
        author: '',
        cs: 0,
        startTime: '',
        endTime: ''
      }
    }
  },
  components: {
    config,
    VuePerfectScrollbar,
    'my-loading': loading,
    'my-null': nodata,
    datepicker,
    alert
  },
  created () {
    this.list()
    this.num()
  },
  methods: {
    deled: function () {
      this.$http.jsonp(config.service,{
        headers: {
        },
        params: {
          api: 'delete',
          id: this.delid,
          table: 'projects'
        },
        emulateJSON: true,
        before: function (req) {
        }
      }).then(
        function (res) {
          const _this=this
          if(res.body.res){
            setTimeout(function(){
              _this.list()
              _this.num()
            },200)
          }
        },
        function (res) {}
      )
      this.showalert = false
    },
    cancel: function () {
      console.log('取消')
      this.showalert = false
    },
    del: function (id) {
      this.showalert = true
      this.delid = id
    },
    tag: function (str) {
      if(str){
        let arr = str.split(',')
        let strs = ''
        for(var i = 0; i< arr.length; i++){
          strs += '<span class="tag">' + arr[i] + '</span>'
        }
        return strs
      }
    },
    tp: function (num) {
      return config.projectType[num]
    },
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
      let send = {
        api: 'select',
        callback: 'callback',
        table: 'projects',
        page: parseInt(this.$route.params.page),
        pageSize: this.pageSize,
        title: this.search.title,
        author: this.search.author,
        classify: this.search.cs,
        startTime: this.search.startTime,
        endTime: this.search.endTime
      }
      for(var i in send){
        if(send[i]==0 || send[i]==''){
          delete send[i]
        }
      }
      this.$http.jsonp(config.service,{
        headers: {
        },
        params: send,
        emulateJSON: true,
        before: function (req) {
          this.isloading = true
        }
      }).then(
        function (res) {
          this.data = res.body
          this.isloading = false
          if(res.body.length==0){
            this.isnull = true
          }else {
            this.isnull = false
          }
        },
        function (res) {}
      )
    },
    num: function () {
      let send = {
        api: 'count',
        callback: 'callback',
        table: 'projects',
        title: this.search.title,
        author: this.search.author,
        classify: this.search.cs,
        startTime: this.search.startTime,
        endTime: this.search.endTime
      }
      for(var i in send){
        if(send[i]==0 || send[i]==''){
          delete send[i]
        }
      }
      this.$http.jsonp(config.service,{
        headers: {
        },
        params: send,
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
        api: 'query_projects',
        callback: 'callback',
        table: 'projects',
        page: 1,
        pageSize: this.pageSize,
        title: this.search.title,
        author: this.search.author,
        classify: this.search.cs,
        startTime: this.search.startTime,
        endTime: this.search.endTime
      }
      for(var i in send){
        if(send[i]==0 || send[i]==''){
          delete send[i]
        }
      }
      this.num()
      this.$http.jsonp(config.service,{
        headers: {
        },
        params: send,
        emulateJSON: true,
        before: function (req) {
          this.$router.push('' + 1)
          this.isloading = true
          console.log(req)
        }
      }).then(
        function (res) {
          this.data = res.body
          this.isloading = false
          console.log(res.body)
          if(res.body==0){
            this.isnull = true
          }else{
            this.isnull = false
          }
        },
        function (res) {}
      )
    },
    reset: function () {
      this.search.title = ''
      this.search.author = ''
      this.search.classify = 0
      this.search.startTime = ''
      this.search.endTime = ''
      this.$router.push('' + 1)
      this.list()
      this.num()
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
.list th{font-weight:normal;font-size:14px;color:#666;height:50px;background:#FFE3B9;}
.list td{font-size:14px;padding:0.6em 1em;color:#666;border:1px solid #eee;}
.list tr:nth-child(odd){background:#f9f9f9;}
.list tr:hover{background:#FCF7D6;}
.content{padding:50px 0 40px 0;overflow:hidden;}
.content.has-search{padding-top:110px;}
.content.has-search .search{margin-top:-110px;height:60px;padding:0 2em;}
.content.has-search .hd{margin-top:0;}
.content .hd{margin-top:-50px;}
.content .bd{height:100%;overflow:auto;}
.content .fd{height:40px;border-top:1px solid #eee;padding:0 1em;}
.content .fd span{font-size:14px;color:#999;padding:0 1em;cursor: pointer;}
.content .fd a{display:inline-block;font-size:14px;color:#999;border:1px solid #ccc;padding:0.2em 1em;border-radius:3px;cursor: pointer;transition:0.3s;}
.content .fd a:hover{background:#559EFE;color:#fff;border-color:#559EFE;}
.content .fd a.none{color:#ccc;border-color:#ccc;background:#f0f0f0;cursor:not-allowed;}
.content .fd .num{color:#559EFE;font-style:normal;padding:0 0.5em;}
.list .iconfont{font-size:1.6em;color:#447DC8;margin:0 5px;}
.scroll-area {position: relative;}
.ps-container>.ps-scrollbar-y-rail{width:6px;}
</style>
