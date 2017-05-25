# DMS
DMS: DevicesManageSystem

主要用与公司设备管理相关，源自CIApplication，在此基础上进行了修改和优化

<h2>简要说明</h2>
<h4>一、支持了以域名的访问方式</h4>
<h4>二、改为了需要在apache中配置documentroot该目录的方式</h4>


项目解读理解：
1、最主要的几个地方就是application下面的controllers、models、views以及static下面的js；

application/controllers：主要是封装的一些方法，方便管理，抽象层；

application/models：数据库查询，数据层；

application/views：页面显示代码，显示层；

static/js：页面事件逻辑判断代码，action层；


日志：

1、05.20：理清代码逻辑，优化了views中所有页面的显示；


TODO:

1、日志打印优化，如果用户已登录，日志中打印登录用户对应名称；如果未登录，只打印使用用户的IP地址；0524Done
	日志打印优化，具体时间显示错误，改成服务器时间；
	
2、如果用户已登录，右上角显示已登录用户名称；

3、修改views中的aboutPage页面；

4、部署到Linux-QA服务器；

5、添加域名访问支持；

6、普通用户必须得登录，才能借手机；

