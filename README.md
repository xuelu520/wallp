
#哇扑-一个有趣的网站

    <哇扑>是 wall paper 简称，一个用户分享分享图片，分享壁纸的站点。

##环境配置
* php5.5 + mysql + redis  
* php框架采用 codeigniter3,第三方类库采用conposer管理。
* 壁纸存储方案采用又拍云-云存储，本地数据库只存图片链接。
* 前端登录采用QQ登录以及微信登录，暂时不准备用自己的注册系统。

##初始化设置
配置文件
>/application/config/config-sample.php copy一份改名为config.php，同时修改内部配置  
>/application/config/redis.php 更改redis服务器IP地址  
>/application/config/database.php 更改mysql 账号密码  

依赖PHP拓展  
* php5-mysql  
* php5-curl  
[composer安装](http://www.phpcomposer.com/)以及更新项目依赖类库  
```shell
composer install  
```  

数据库操作

* 执行/sql/wallp.sql

后台ADMIN 账号：admin,密码：123456

移动端计划中...欢迎大家加入。  
  makyu | 871110792@qq.com