# 后台管理系统说明：
## api接口说明：
所有数据请求都是app.php通过改变 ?api后面的参数调用不同的功能模块：
### 获取列表
```
http://192.168.4.151/administration/app/app.php?api=get_list&page=1&pageSize=10&sex=1&table=users
```
其中api=get_list代表获取列表，page表示第几页，pageSize表示每一页有多少条数据，table表示查询的哪个数据表，其他的例如sex表示查询sex=1的所有数据，当然也可以有多个条件。
### 更新查询
```
http://192.168.4.151/administration/app/app.php?api=edit&id=1&sex=1&table=users
```
同理，api=edit表示对某条数据进行修改，id=1表示对id为1的那条数据进行修改，table=users表示tables表，sex=1是要修改的字段，这里也可以是多个字段进行批量修改
### 条件查询
```
http://192.168.4.151/administration/app/app.php?api=check&username=swimly&table=users
```
api=check表示对数据库进行条件查询，table=users表示查询的是users表词条的含义是查询username=swimly的那条数据，返回值是一个bool值，这里的查询条件也可以是多条，可以用作用户名验证，邮箱验证和用户登录。
### 添加新数据
```
http://192.168.4.151/administration/app/app.php?api=add&username=browser&password=122514&email=979741120@qq.com&table=users
```
api=add表示像数据库添加一条新数据，table表示向users表中插入，其他的字段都是向数据库插入的字段。
