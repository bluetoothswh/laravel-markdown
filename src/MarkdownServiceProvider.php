<?php

namespace LaraMall\Markdown;

use Illuminate\Support\ServiceProvider;

class MarkdownServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //发布配置文件
        $this->publishes([
            __DIR__.'/config/markdown.php' => config_path('markdown.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/markdown.php',
            'markdown'
        );
        $this->app->bind('markdown', 'LaraMall\Markdown\Markdown');
    }
}
