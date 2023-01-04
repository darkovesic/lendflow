<?php

namespace App\Http\Controllers;

use App\Http\Requests\BooksRequest;
use App\Services\NyTimeAPI;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ServeBook extends Controller
{
    use ValidatesRequests;

    public function __invoke(BooksRequest $request): Response
    {
        return response(
            (new NyTimeAPI())($request->validated()),
            Response::HTTP_OK
        );
    }
}
