# Phalcon-base

---

Phalcon base structure for build application.

```php
.
├── README.md
├── app
│   ├── cache
│   ├── config
│   │   ├── config.php ##配置文件
│   │   ├── loader.php ##注册自动加载器
│   │   └── services.php ##依赖注入相关服务
│   ├── controllers
│   │   ├── ControllerBase.php ##基础控制器
│   │   └── IndexController.php
│   ├── library
│   │   ├── Dom ##测试命名空间(可删除)
│   │   │   ├── Html.php
│   │   │   └── xls
│   │   │       └── xlsDom.php
│   │   └── Response.php ##测试命名空间(可删除)
│   ├── models
│   │   ├── ModelBase.php ##基础模型
│   │   └── User.php ##测试
│   ├── plugins
│   └── views ##测试
│       ├── index
│       │   └── index.volt
│       ├── index.volt
│       └── layouts
├── index.html
└── public
    ├── css
    ├── files
    ├── img
    ├── index.php ##主入口
    ├── js
    ├── temp
    ├── xhprof ##XHprof 开发分析工具
    │   ├── xhprof_html
    │   │   ├── callgraph.php
    │   │   ├── css
    │   │   │   └── xhprof.css
    │   │   ├── docs
    │   │   │   ├── index.html
    │   │   │   ├── sample-callgraph-image.jpg
    │   │   │   ├── sample-diff-report-flat-view.jpg
    │   │   │   ├── sample-diff-report-parent-child-view.jpg
    │   │   │   ├── sample-flat-view.jpg
    │   │   │   └── sample-parent-child-view.jpg
    │   │   ├── index.php
    │   │   ├── jquery
    │   │   │   ├── indicator.gif
    │   │   │   ├── jquery-1.2.6.js
    │   │   │   ├── jquery.autocomplete.css
    │   │   │   ├── jquery.autocomplete.js
    │   │   │   ├── jquery.tooltip.css
    │   │   │   └── jquery.tooltip.js
    │   │   ├── js
    │   │   │   └── xhprof_report.js
    │   │   └── typeahead.php
    │   └── xhprof_lib
    │       ├── display
    │       │   ├── typeahead_common.php
    │       │   └── xhprof.php
    │       └── utils
    │           ├── callgraph_utils.php
    │           ├── xhprof_lib.php
    │           └── xhprof_runs.php
    └── xhprof.php ##开启 XHprof 并且加载主入口 index.php 输出日志

```