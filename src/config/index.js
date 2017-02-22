const config = {
  service: 'http://192.168.4.151/administration/app/app.php',
  logo: '这是logo',
  user: 'admin',
  depart: ['全部','总经办','研发部门','财务部'],
  position: ['全部','董事长','总经理','部门经理','小组长','员工'],
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
    url: '/database/list',
    icon: 'icon-database',
    sub: [{
      text: '数据库配置',
      url: '/database/setting',
      icon: ''
    }, {
      text: '数据库列表',
      url: '/database/list',
      icon: ''
    }, {
      text: '新增数据库',
      url: '/database/add',
      icon: ''
    }, {
      text: '列表',
      url: '/database/list',
      icon: ''
    }]
  }]
}
export default config
