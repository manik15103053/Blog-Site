<?php

namespace App\Service;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider{
   public function register()
   {
       //Category
       $this->app->bind(
        'App\Repositories\Interface\CategoryInterface',
        'App\Repositories\Admin\CategoryRepository'
       );
       //Category Language
       $this->app->bind(
        'App\Repositories\Interface\CategoryLanguageInterface',
        'App\Repositories\Admin\CategoryLanguageRepository'
       );
       //Tag
       $this->app->bind(
        'App\Repositories\Interface\TagInterface',
        'App\Repositories\Admin\TagRepository'
       );
       //Tag Language
       $this->app->bind(
        'App\Repositories\Interface\TagLanguageInterface',
        'App\Repositories\Admin\TagLanguageRepositry'
       );
   }
}
