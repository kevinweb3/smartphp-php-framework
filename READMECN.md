## smartphp-php-framework

### smartphp介绍
smartphp是一款自主开发的微型PHP框架，旨在学习PHP核心知识，不用商业用途，参照目前比较流行的 Codeigniter、Thinkphp、Laravel 三大PHP框架，基于爱好编程学习的目的会一步步把smartphp框架结构开发完成，不定期更新...

### smartphp目录结构
smartphp                WEB部署根目录
├─app                   应用目录
│  ├─controllers        控制器目录
│  ├─models             模块目录
│  ├─hooks              自定义钩子目录
│  ├─views              视图目录
├─config                配置文件目录
│  ├─Config             自定义配置
├─system                框架核心目录
│ ├─core                框架核心文件目录
│ ├─config              框架系统默认配置
│ ├─database            数据库操作类目录
│ ├─helpers             辅助函数操作类目录
│ ├─libraries           系统库操作类目录
│ ├─Smartphp.php        框架入口内核文件
│ ├─BaseController.php  框架控制器基类文件
│ ├─BaseModel.php       框架模型基类文件
│ ├─BaseView.php        框架视图基类文件
├─public                静态文件目录
├─index.php             入口文件

### smartphp框架解析
index.php: 程序入口文件