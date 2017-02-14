const config = {
  service: 'http://192.168.4.151/administration/app/app.php',
  logo: '这是logo',
  user: 'admin',
  nav: [{
    icon: 'icon-password',
    text: '修改密码',
    url: '/home/editPassword'
  }, {
    icon: 'icon-logout',
    text: '退出登录',
    url: '/logout'
  }],
  menu: [{
    text: '首页',
    url: '/',
    icon: 'icon-home'
  }, {
    text: '用户管理',
    url: '/user/count',
    icon: 'icon-fenzu',
    sub: [{
      text: '统计',
      url: '/user/count',
      icon: ''
    }, {
      text: '分类',
      url: '/user/catory',
      icon: ''
    }, {
      text: '列表',
      url: '/user/list',
      icon: ''
    }]
  }, {
    text: '数据库',
    url: '/user/count',
    icon: 'icon-database',
    sub: [{
      text: '统计',
      url: '/user/count',
      icon: ''
    }, {
      text: '分类',
      url: '/user/catory',
      icon: ''
    }, {
      text: '列表',
      url: '/user/list',
      icon: ''
    }]
  }]
}
export default config