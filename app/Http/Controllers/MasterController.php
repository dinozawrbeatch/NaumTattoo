<?php

namespace App\Http\Controllers;

use App\Models\Master;

class MasterController extends CRUDController
{
    public function __construct()
    {
        parent::__construct(Master::class);
    }

    public function create()
    {
        return view('admin.masters.create');
    }
}
