<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class CRUDController extends Controller
{
    protected string $modelName;
    protected string $modelLink;

    /**
     * @param string $model
     */
    public function __construct(string $model)
    {
        $this->modelName = $model;
        $this->modelLink = $model::MODEL_LINK;
    }

    public function index()
    {
        $rows = $this->modelName::simplePaginate(10);

        return view('admin.index', [
            'rows' => $rows,
            'modelName' => $this->modelName,
            'modelLink' => $this->modelLink
        ]);
    }

    public function create()
    {
        return view('admin.create', [
            'modelName' => $this->modelName
        ]);
    }

    public function store(Request $request)
    {
        $requestData = $request->except('_token');
        if ($request->has('image')) {
            $imagePath = $requestData['image']->store('uploads', 'public');
            $requestData['image'] = $imagePath;
        }
        $this->modelName::create($requestData);

        return redirect()->route("admin.$this->modelLink.index");
    }

    public function show(int $id)
    {
        $row = $this->modelName::find($id);

        return view('admin.show', [
            'row' => $row,
            'modelName' => $this->modelName,
            'modelLink' => $this->modelLink
        ]);
    }

    public function edit(string $id)
    {
        $model = $this->modelName::find($id);

        return view("admin.$this->modelLink.edit", ['model' => $model]);
    }

    public function update(Request $request, string $id)
    {
        $model = $this->modelName::find($id);
        $requestData = $request->except('_token');
        if ($request->has('image')) {
            $imagePath = $requestData['image']->store('uploads', 'public');
            $requestData['image'] = $imagePath;
        }
        $model?->update($requestData);

        return redirect()->route("admin.$this->modelLink.show", $id);
    }

    public function destroy(string $id)
    {
        $model = $this->modelName::find($id)->first();
        $model?->delete($id);

        return redirect()->route("admin.$this->modelLink.index");
    }
}
