<?php

namespace LaraMall\Markdown;

class Markdown
{
    protected $driver;
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
    }
    /*
    |--------------------------------------------------------------------------
    |
    |   赋值
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
    |   使用哪种markdown
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
    |   生成markdown对象
    |
    |--------------------------------------------------------------------------
    */
    public function html($markdown)
    {
        if ($this->driver == 'all') {
            $this->parser = new \cebe\markdown\Markdown();
            return  $this->parser->parse($markdown);
        } elseif ($this->driver == 'github') {
            $this->parser = new \cebe\markdown\GithubMarkdown();
            return  $this->parser->parse($markdown);
        } elseif ($this->driver == 'extra') {
            $this->parser = new \cebe\markdown\MarkdownExtra();
            return $this->parser->parse($markdown);
        } elseif ($this->driver == 'inline') {
            $this->parser = new \cebe\markdown\GithubMarkdown();
            return $this->parser->parseParagraph($markdown);
        } else {
            $this->parser = new \cebe\markdown\GithubMarkdown();
            return  $this->parser->parse($markdown);
        }
    }
}
