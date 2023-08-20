<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;

class AdminController extends Controller
{
    public function authorize(AdminRequest $request)
    {
        $validatedData = $request->validated();

        if ($validatedData['login'] !== 'admin' || $validatedData['password'] !== '123') {
            return redirect()->route('login')->with('error', 'Неверные учетные данные');
        }

        return route('login');
    }
}
