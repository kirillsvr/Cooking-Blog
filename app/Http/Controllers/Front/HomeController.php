<?php

namespace App\Http\Controllers\Front;

use App\Actions\Main\MainIndexAction;
use App\Actions\RegistrationWithOutPasswordAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegistrateWithOutPassword;
use function view;

class HomeController extends Controller
{
    public function index(MainIndexAction $action)
    {
        return view('front.home.index', $action->execute());
    }

    public function register(StoreRegistrateWithOutPassword $request, RegistrationWithOutPasswordAction $action)
    {
        $action->execute($request->validated());
        return response()->json(['Ok'], 200);
    }
}
