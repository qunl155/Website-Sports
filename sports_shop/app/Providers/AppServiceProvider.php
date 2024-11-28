<?php

namespace App\Providers;
use App\Models\Menu;
use Illuminate\View\View;
use App\View\Composers\MenuComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {

    }

    public function boot(): void
    {
        $value = Menu::select('id', 'name', 'parent_id')->where('active', 1)->orderByDesc('id')->get();
        Facades\View::share('key', $value);
        Paginator::useBootstrap();
    }
}