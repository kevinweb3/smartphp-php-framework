## smartphp-php-framework
develop my own php framework step by step

### smartphp introduce
smartphp is a self-developed micro PHP framework, designed to learn the core knowledge of PHP, without commercial use, referring to the current more popular Codeigniter/Thinkphp/Laravel three PHP frameworks. Based on the hobby of programming learning, the smartphp framework structure will be developed step by step and updated from time to time.

### smartphp目录结构
📦smartphp----------------WEB deployment root directory<br />
├─📂app-------------------Application directory<br />
│  ├─📂controllers--------Controller directory<br />
│  ├─📂models-------------Models directory<br />
│  ├─📂hooks--------------Custom hook directory<br />
│  ├─📂views--------------View directory<br />
├─📂config----------------Configuration file directory<br />
│  ├─📜Config-------------Custom configuration<br />
├─📂system----------------Framework core directory<br />
│ ├─📂core----------------Framework core file directory<br />
│ ├─📂config--------------Framework system default configuration<br />
│ ├─📂database------------Database operations class directory<br />
│ ├─📂helpers-------------Auxiliary function operation class directory<br />
│ ├─📂libraries-----------System library operation class directory<br />
│ ├─📜Smartphp.php--------Framework entry kernel file<br />
│ ├─📜BaseController.php--Frame controller base class file<br />
│ ├─📜BaseModel.php-------Framework model base class file<br />
│ ├─📜BaseView.php--------Framework view base class file<br />
├─📂public----------------Static file directory<br />
├─📜index.php-------------Entry file<br />

### smartphp框架解析
index.php: Program entry file