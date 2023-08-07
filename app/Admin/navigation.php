<?php

use SleepingOwl\Admin\Navigation\Page;

return [
    (new Page(\App\Models\User::class))->setAccessLogic(function($p){return false;}),
    (new Page(\App\Models\Modele::class))->setAccessLogic(function($p){return false;}),
    (new Page(\App\Models\Marka::class))->setAccessLogic(function($p){return false;}),
    (new Page(\App\Models\Rodzpaliwa::class))->setAccessLogic(function($p){return false;}),
    
    [
    'title'=>'Administrator',
    'icon'=>'fas fa-users',
    'priority'=>200,
    'accessLogic'=>function($page){
        return \auth::user()->perm==1;
    },

    'pages'=>[                
                          [
                                'title'=>'Użytkownicy',
                                'icon'=>'fas fa-wrench',
                                'model'=>\App\Models\User::class,
                                'priority'=>201,
                                'accessLogic'=>function($page){
                                    return \auth::user()->perm==1;
                                }
                          ],
                          [
                                'title'=>'Modele',
                                'icon'=>'fas fa-users',
                                'model'=>\App\Models\Modele::class,
                                'priority'=>200,
                                'accessLogic'=>function($page){
                                    return \auth::user()->perm==1;
                                }
                          ],
                          (new Page(\App\Models\Marka::class))
                            ->setTitle("Marki")
                            ->setIcon('fa fa-truck')
                            ->setPriority(202),
                          (new Page(\App\Models\Rodzpaliwa::class))
                            ->setTitle("Paliwa")
                            ->setIcon('fa fa-leaf')
                            ->setPriority(203),

                        ],
                    ],
                        (new Page(\App\Models\Rejestracja::class))
                        ->setPriority(100)
                        ->setIcon('fas fa-pen')
                        ->setTitle('Przeglądy'),
                        (new Page(\App\Models\Osoba::class))
                        ->setPriority(102)
                        ->setIcon('fas fa-pen')
                        ->setTitle('Klienci'),
                        [
                            'title'=>'Logout',
                            'icon'=>'fas fa-exit',
                            'priority'=>204,
                            'url'=>route('logoutadmin')
                           
                      ],
                     
 
];
