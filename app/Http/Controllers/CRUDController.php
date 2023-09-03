<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    private function validateModelFields($request, $fields): void
    {
        $rules = [];
        $messages = [];
        foreach ($this->modelName::FIELDS as $field => $value) {
            if ($field === 'id' || $field === 'image') continue;
            $rules[$field] = 'required';
            $messages["$field.required"] = "Это поле необходимо для заполнения";
        }

        $this->validate($request, $rules, $messages);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $requestData = $request->except('_token');
        if ($request->has('image')) {
            $imagePath = $requestData['image']->store('uploads', 'public');
            $requestData['image'] = $imagePath;
        }

        $this->validateModelFields($request, $this->modelName::FIELDS);
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

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, string $id)
    {
        $model = $this->modelName::find($id);
        $requestData = $request->except('_token');
        if ($request->has('image')) {
            Storage::delete([
                'public/' . $model->image,
                'uploads/' . $model->image,
            ]);
            $imagePath = $requestData['image']->store('uploads', 'public');
            $requestData['image'] = $imagePath;
        }
        $this->validateModelFields($request, $this->modelName::FIELDS);
        $model?->update($requestData);

        return redirect()->route("admin.$this->modelLink.show", $id);
    }

    public function destroy(string $id)
    {
        $model = $this->modelName::find($id)->first();
        if ($model->image) {
            Storage::delete([
                'public/' . $model->image,
                'uploads/' . $model->image,
            ]);
        }
        $model?->delete($id);

        return redirect()->route("admin.$this->modelLink.index");
    }
}
