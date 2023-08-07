<?php

namespace App\Admin\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Admin\Sections\Users;

class UsersSectionModelPolicy {

    use HandlesAuthorization;

public function before($user, $ability, $section, $item){
     return \auth::user()->perm==1;
}

public function display($user, $section, $item){
    return $user->perm==1;
}

public function create($user, $section, $item){
    return $user->perm==1;
}

public function edit($user, $section, $item){
    return $user->perm==1;
}

public function delete($user, $section, $item){
    return false;
}



}