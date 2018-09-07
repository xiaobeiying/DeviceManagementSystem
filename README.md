<h2>该分支简要说明</h2>
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
	日志打印优化，具体时间显示错误，改成服务器时间； 0525Done:修改了CI_Log中的writeToLog()方法
2、如果用户已登录，右上角显示已登录用户名称；0525Done
3、修改views中的aboutPage页面；0525Done
4、修改views/aboutPage中的likeDev，由原来的get请求改成post，带session参数，日志更完整； 0526Done
5、支持普通用户登录； 0526Done  
6、普通用户在设备查询页面，申请一列的按钮，只显示自己申请中的和可申请的，不显示别人申请的；0527Done
7、客人用户只能查看设备查询、查看管理员、我的页面、关于系统4个页面，但不能借手机，不显示设备查询页申请一列按钮；0527Done
8、普通用户登录后，只能看设备查询、用户管理、我的页面、关于系统4个页面，可以借手机；0527Done
9、部署到Linux-QA服务器； 0529Done
10、添加域名和外网访问支持；
11、修复借出时间不正确问题；0606Done
12、新增功能：已报废设备不能再借用，即不显示在设备查询页面；0606Done 
13、修复标签过滤返回为空问题；0606Done

需求：除了草鸡管理员以外，其他登录用户只能修改自己的登录名、密码和头像；
目前已知bug：用户登录后，可随意修改自己或他人的设置项，后续修复；
修复上述bug，并处理了多处权限相关细节

TODO-0621：
1、我的页面，未显示出签借人所借设备（签借人有个人填写，有的写真实姓名，有的是登录名）；修改方案：同时判断当前登录用户的注册名和登录名；
2、首次添加设备信息时，图片添加未成功；
3、优化：添加设备时，品牌输入改成下拉列表选择；
4、优化：设备查询中的品牌列表变成动态获取；

TODO-180828:
1、修改上述TODO-0621所有问题；
2、数据库devices表中新增hdexport、camera_1080p、phone_CPU、phone_GPU、phone_cores、phone_Architecture、phone_resolution 共7个字段； 0828 Done
3、数据库测试数据添加；0828 Done
4、数据写入调试：添加设备页面修改，业务逻辑、数据库写入；0828 Done
5、修改关于页面； 0828 Done
6、manDevices/changeDevInfo页面修改，增加参数、业务逻辑、数据库读写；0828 Done
7、checkDevices页面修改； 0830 Done
8、Bug：添加设备时，总是提示设备添加失败；Bug Fixed 0830 Done
9、添加设备addDevice页面修改，增加参数、业务逻辑、数据库读写；0830 Done
10、修改showDev/showDevInfoPage页面，增加新增参数展示；0830 Done
11、修改checkDevices/showDevInfoPage页面，增加新增参数展示；0830 Done
13、修改searchDevices/showDevs页面，增加新增参数展示；0830 Done
14、设备查询页面searchDevices，包含manDevices/manDevices.php和showDev/showDev/showDevs.php两个页面，添加新增参数过滤等；0830 Done
15、设备查询页面searchDevices（showDevMod）数据读取调试：展示页面修改，业务逻辑、数据库读取；0831 Done
16、展示页面修改，包括条件过滤等；0831 Done
17、部署正式环境；
18、Bug：设备查询详情页和设备盘点详情页中UI显示异常；