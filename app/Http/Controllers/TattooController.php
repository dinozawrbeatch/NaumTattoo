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

    public function index()
    {
        $tattoos = Tattoo::simplePaginate(10);

        return view('admin.tattoos.index', [
            'tattoos' => $tattoos,
            'model' => $this->modelName
        ]);
    }

    public function show(int $id)
    {
        $tattoo = Tattoo::find($id);

        return view('admin.tattoos.show', ['tattoo' => $tattoo]);
    }
}
