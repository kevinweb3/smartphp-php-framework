## smartphp-php-framework

### smartphp介绍
smartphp是一款自主开发的微型PHP框架，旨在学习PHP核心知识，不用商业用途，参照目前比较流行的 Codeigniter、Thinkphp、Laravel 三大PHP框架，基于爱好编程学习的目的会一步步把smartphp框架结构开发完成，不定期更新...

### smartphp目录结构
📦smartphp----------------WEB部署根目录<br />
├─📂app-------------------应用目录<br />
│  ├─📂controllers--------控制器目录<br />
│  ├─📂models-------------模块目录<br />
│  ├─📂hooks--------------自定义钩子目录<br />
│  ├─📂views--------------视图目录<br />
├─📂config----------------配置文件目录<br />
│  ├─📜Config-------------自定义配置<br />
├─📂system----------------框架核心目录<br />
│ ├─📂core----------------框架核心文件目录<br />
│ ├─📂config--------------框架系统默认配置<br />
│ ├─📂database------------数据库操作类目录<br />
│ ├─📂helpers-------------辅助函数操作类目录<br />
│ ├─📂libraries-----------系统库操作类目录<br />
│ ├─📜Smartphp.php--------框架入口内核文件<br />
│ ├─📜BaseController.ph---框架控制器基类文件<br />
│ ├─📜BaseModel.php-------框架模型基类文件<br />
│ ├─📜BaseView.php--------框架视图基类文件<br />
├─📂public----------------静态文件目录<br />
├─📜index.php-------------入口文件<br />

### smartphp框架解析
index.php: 程序入口文件