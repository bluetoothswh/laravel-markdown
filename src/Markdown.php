<?php

namespace LaraMall\Markdown;

class Markdown
{
    protected $driver;
    protected $parser;
    protected $maps;
    /*
    |--------------------------------------------------------------------------
    |
    |   构造函数
    |
    |--------------------------------------------------------------------------
    */
    public function __construct()
    {
        $this->driver 	= config('markdown.driver');
        $this->maps     = $this->maps();
    }
    /*
    |--------------------------------------------------------------------------
    |
    |   链式赋值
    |
    |--------------------------------------------------------------------------
    */
    public function put($field, $value)
    {
        $this->$field 	= $value;
        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    |
    |   设置驱动
    |
    |--------------------------------------------------------------------------
    */
    public function driver($driver)
    {
        $this->driver 	= $driver;
        return $this;
    }


    /*
    |--------------------------------------------------------------------------
    |
    |   驱动数组
    |
    |--------------------------------------------------------------------------
    */
    public function maps()
    {
        return [
                'github'=>['obj'=>'GithubMarkdown', 'func'=>'parse'],
                'all'=>['obj'=>'Markdown', 'func'=>'parse'],
                'extra'=>['obj'=>'MarkdownExtra', 'func'=>'parse'],
                'inline'=>['obj'=>'GithubMarkdown', 'func'=>'parseParagraph'],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |
    |   生成markdown对象
    |
    |--------------------------------------------------------------------------
    */
    public function html($markdown = '#{.red-text} 测试标题')
    {
        $obj           = '\cebe\markdown\\'.$this->maps[$this->driver]['obj'];
        return call_user_func([new $obj,$this->maps[$this->driver]['func']], $markdown);
    }
}
