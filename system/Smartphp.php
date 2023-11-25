<?php
namespace sytem;

// 框架系统目录
defined('CORE_PATH') or define('CORE_PATH', __DIR__);

/**
 * smrtphp框架系统核心入口文件
 */

class Smartphp {

  // 配置文件初始化
  protected $config = [];

  public function _construct($config) {
    $this -> config = $config;
  }

  // 核心入口程序运行
  public function run() {
    sql_autoload_register(array($this, 'loadClass'));   // 自动加载器自动加载
    $this->setReporting();   // 检测开发环境
    $this->removeMagicQuotes();   // 检测敏感字符并删除
    $this->unregisterGlobals();   // 检测自定义全局变量并移除
    $this->setDbConfig();    // 配置数据库信息
    $this->route();   // 路由处理
  }

  // 自动加载类
  public function loadClass($className) {
    $classMap = $this -> classMap();

    if (isset($classMap[$className])) {
      $file = $classMap[$className];      // 自动加载内核文件
    } elseif (strpos($className, '\\') !== false) {
      // 包含应用（application目录）文件
      $file = APP_PATH . str_replace('\\', '/', $className) . '.php';
      if (!is_file($file)) {
          return;
      }
    } else {
      return;
    }
    include $file;
  }

  // 内核文件命名空间映射关系, 自动加载 BaseController、BaseModel、View、Db、Sql
  protected function classMap()
  {
      return [
          'system\BaseController' => CORE_PATH . '/BaseController.php',
          'system\BaseModel' => CORE_PATH . '/BaseModel.php',
          'system\BaseView' => CORE_PATH . '/BaseView.php',
          'system\database\Db' => CORE_PATH . '/database/Db.php',
          'system\database\Sql' => CORE_PATH . '/database/Sql.php',
      ];
  }


  // 检测开发环境, 如果Debug模式则开启错误报告，否则关闭错误报告，开启日志信息
  public function setReporting() {
    if (APP_DEBUG === true) {
      error_reporting(E_ALL);
      ini_set('display_errors', 'On');
    } else {
      error_reporting(E_ALL);
      ini_set('display_errors', 'Off');
      ini_set('log_errors', 'On');
    }
  }

  // 删除敏感字符
  public function stripSlashesDeep() {
    $value = is_array($vlue) ? array_map(array($this, 'stripSlashesDeep'), $value) : stripslashes($value);
    return $value;
  }

  // 检测敏感字符并删除
  public function removeMagicQuotes() {
    if (get_magic_quotes_gpc()) {
      $_GET = isset($_GET) ? $this->stripSlashesDeep($_GET ) : '';
      $_POST = isset($_POST) ? $this->stripSlashesDeep($_POST ) : '';
      $_COOKIE = isset($_COOKIE) ? $this->stripSlashesDeep($_COOKIE) : '';
      $_SESSION = isset($_SESSION) ? $this->stripSlashesDeep($_SESSION) : '';
    }
  }

  // 检测自定义全局变量并移除
  public function unregisterGlobals() {
    if (ini_get('register_globals')) {
      $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
      foreach ($array as $value) {
        foreach ($GLOBALS[$value] as $key => $val) {
          if ($val === $GLOBALS[$key]) {
            unset($GLOBALS[$key]);
          }
        }
      }
    }
  }

  // 配置数据库信息
  public function setDbConfig() {
    if ($this -> config['db']) {
      define('DB_HOST', $this -> config['db']['host']);
      define('DB_NAME', $this -> config['db']['dbname']);
      define('DB_USER', $this -> config['db']['username']);
      define('DB_PASS', $this -> config['db']['password']);
    }
  }

  // 路由处理
  public function route() {
    $controllerName = $this -> config['defaultController'];
    $actionName = $this -> config['defaultAction'];
    $param = array();

    $url = $_SERVER['REQUEST_URI'];
    // 清除?之后的内容
    $position = strpos($url, '?');
    $url = $position === false ? $url : substr($url, 0, $position);
    // 删除前后的“/”
    $url = trim($url, '/');
    if ($url) {
      // 使用“/”分割字符串，并保存在数组中
      $urlArray = explode('/', $url);
      // 删除空的数组元素
      $urlArray = array_filter($urlArray);

      // 获取控制器名
      $controllerName = ucfirst($urlArray[0]);

      // 获取动作名
      array_shift($urlArray);
      $actionName = $urlArray ? $urlArray[0] : $actionName;

      // 获取URL参数
      array_shift($urlArray);
      $param = $urlArray ? $urlArray : array();
    }

    // 判断控制器和操作是否存在
    $controller = 'app\\controllers\\'. $controllerName . 'Controller';
    if (!class_exists($controller)) {
        exit($controller . '控制器不存在');
    }
    if (!method_exists($controller, $actionName)) {
        exit($actionName . '方法不存在');
    }

    // 如果控制器和操作名存在，则实例化控制器，因为控制器对象里面
    // 还会用到控制器名和操作名，所以实例化的时候把他们俩的名称也
    // 传进去。结合Controller基类一起看
    $dispatch = new $controller($controllerName, $actionName);

    // $dispatch保存控制器实例化后的对象，我们就可以调用它的方法，
    // 也可以像方法中传入参数，以下等同于：$dispatch->$actionName($param)
    call_user_func_array(array($dispatch, $actionName), $param);

  }
}