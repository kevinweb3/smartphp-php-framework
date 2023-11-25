## smartphp-php-framework
develop my own php framework step by step

### smartphp introduce
smartphp is a self-developed micro PHP framework, designed to learn the core knowledge of PHP, without commercial use, referring to the current more popular Codeigniter/Thinkphp/Laravel three PHP frameworks. Based on the hobby of programming learning, the smartphp framework structure will be developed step by step and updated from time to time.

### smartphp目录结构
smartphp                WEB deployment root directory
├─app                   Application directory
│  ├─controllers        Controller directory
│  ├─models             Models directory
│  ├─hooks              Custom hook directory
│  ├─views              View directory
├─config                Configuration file directory
│  ├─Config             Custom configuration
├─system                Framework core directory
│ ├─core                Framework core file directory
│ ├─config              Framework system default configuration
│ ├─database            Database operations class directory
│ ├─helpers             Auxiliary function operation class directory
│ ├─libraries           System library operation class directory
│ ├─Smartphp.php        Framework entry kernel file
│ ├─BaseController.php  Frame controller base class file
│ ├─BaseModel.php       Framework model base class file
│ ├─BaseView.php        Framework view base class file
├─public                Static file directory
├─index.php             Entry file

### smartphp框架解析
index.php: Program entry file