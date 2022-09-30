<?php

namespace App\Http\Controllers\Admin\Genre;

use App\Http\Controllers\Controller;
use App\Http\Requests\Genre\StoreRequest;
use App\Models\Genre;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Genre::create($data);
        return redirect()->route('admin.genre.index');
    }
}
