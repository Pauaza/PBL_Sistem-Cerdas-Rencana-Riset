<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('template.template_user', function ($view) {
            // Jika Anda pakai guard khusus, misal: Auth::guard('mahasiswa')->check()
            if (Auth::guard('mahasiswa')->check()) {
                $mahasiswa = Auth::guard('mahasiswa')->user();
                
                // Ambil 10 histori terbaru langsung lewat relasi
                /** @var \App\Models\Mahasiswa $mahasiswa */
                $histories = $mahasiswa->histories()
                    ->latest('created_at')
                    ->take(10)
                    ->get();

                if (config('app.env') === 'production') {
                    URL::forceScheme('https');
                }

                $view->with('histories', $histories);
            }
        });
    }
}
