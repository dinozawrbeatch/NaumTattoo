<?php

namespace App\Http\Controllers;

use App\Models\Tattoo;

class TattooController extends CRUDController
{
    public function __construct()
    {
        parent::__construct(Tattoo::class);
    }

    public function create()
    {
        return view('admin.tattoos.create', ['tattoo' => $this->modelName]);
    }
}
