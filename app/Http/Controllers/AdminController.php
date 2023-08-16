<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;

class AdminController extends Controller
{
    public function authorize(AdminRequest $adminRequest)
    {
        $adminRequest->validate($adminRequest->all());
        if ($adminRequest->login === 'admin' && $adminRequest->password === '123') {
            return view ();
        }
    }
}
