<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        \App\Models\Rejestracja::class => '\App\Admin\Sections\Rejestracje',
        \App\Models\Osoba::class => '\App\Admin\Sections\Osobyy',
        \App\Models\User::class => 'App\Admin\Sections\Users',
        \App\Models\Modele::class => '\App\Admin\Sections\Modeles',
        \App\Models\Marka::class => '\App\Admin\Sections\Marki',
        \App\Models\Rodzpaliwa::class => '\App\Admin\Sections\Paliwa',
    ];

    /**
     * Register sections.
     *
     * @param \SleepingOwl\Admin\Admin $admin
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//
        $this->registerPolicies('App\\Admin\\Policies\\');
        parent::boot($admin);
    }
}
