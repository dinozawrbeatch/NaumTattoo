<?php

namespace App\Http\Controllers;

use App\Models\Review;

class ReviewController extends CRUDController
{
    public function __construct()
    {
        parent::__construct(Review::class);
    }

    public function create()
    {
        return view ('admin.reviews.create', ['review' => $this->modelName]);
    }
}
