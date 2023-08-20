<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends CRUDController
{
    public function __construct()
    {
        parent::__construct(Product::class);
    }

    public function create()
    {
        return view("admin.$this->modelLink.create");
    }
}
