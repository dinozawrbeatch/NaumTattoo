<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class CRUDController extends Controller
{
    protected string $modelName;

    public function __construct($model)
    {
       $this->modelName = $model;
    }

    public function index()
    {
        $content = $this->modelName::all();

        return view('index', ['content' => $content]);
    }

    public function create()
    {
        return view('create', $this->modelName);
    }

    public function store(Request $request)
    {
        $this->modelName::create($request->all());

        return redirect('index');
    }

    public function show(int $id)
    {
        $model = $this->modelName::find($id)->first();

        return view('show', $model);
    }

    public function edit(string $id)
    {
        $model = $this->modelName::find($id)->first();

        return view('edit', $model);
    }

    public function update(Request $request, string $id)
    {
        $model = $this->modelName::find($id)->first();
        $model?->update($request->all());

        return redirect('show', $id);
    }

    public function destroy(string $id)
    {
        $model = $this->modelName::find($id)->first();
        $model?->delete($id);

        return redirect('index');
    }
}
