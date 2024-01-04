<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Cart;
use App\Models\FavoriteList;
use App\Observers\CartObserver;
use App\Models\Partner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Cart', function () {
            return Cart::current();
        });

        $this->app->singleton('FavoriteList', function () {
            return FavoriteList::current();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $cart = $this->app->make('Cart');
            view()->share('headerCartCount', $cart->countTotalQuantity());
            view()->share('headerCartTotal', $cart->getTotal());
            $favorites = $this->app->make('FavoriteList');
            view()->share('headerFavoritesCount', $favorites->countTotalQuantity());
            $store = null;
            $currentRoute = \Route::current();
            if (!is_null($currentRoute)) {
                $currentStoreSlug = \Route::current()->parameter('storeSlug');
                if (!is_null($currentStoreSlug)) {
                    $store = Partner::where('slug', $currentStoreSlug)->first();
                    if ($store) {
                        $storeCatalog = Category::getCatalog($store->id);
                        view()->share('storeCatalog', $storeCatalog);
                    }
                }
            }
            $commonCatalog = Category::getCommonCatalog();
            view()->share('commonCatalog', $commonCatalog);

            $stores = Partner::all();
            view()->share('headerAllStores', $stores);

            if (Auth::user()) {
                $notifications = Auth::user()->notifications;
                view()->share('notifications', $notifications);
            }
        });

        // Paginator::useBootstrapThree();
    }
}
