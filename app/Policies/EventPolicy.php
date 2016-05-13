<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Admin;
use Illuminate\Http\Request;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function destroy(Request $request, Admin $admin){
        $loggedInAdmin = $request->session()->get('login');

        return $loggedInAdmin ===  $admin->email;
    }
}
