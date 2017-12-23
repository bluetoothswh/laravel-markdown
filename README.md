# laravel-markdown

一个解析Markdown为html的laravel组件

# 安装
````
composer require laramall/laravel-markdown

````

# 配置

````
php artisan vendor:publish

配置文件 config/markdown.php

'driver' => 'github'

driver可能的值

github  github解析模式

all     traditional markdown and parse full text

extra   use markdown extra

inline  parse only inline elements (useful for one-line descriptions)

````

# 系统要求

````
php >= 7.0

laravel >= 5.1

````

# 使用

````
Markdown::html('# 测试标题')

转化后的文字是
<h1>测试标题</h1>\n

````
