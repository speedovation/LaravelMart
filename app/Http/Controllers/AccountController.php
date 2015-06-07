<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AccountController extends CoreController {

    public function authenticateAction() {
        $credentials = [
            "email" => Input::get("email"),
            "password" => Input::get("password")
        ];

        if (Auth::attempt($credentials)) {
            return Response::json([
                        "status" => "ok",
                        "account" => Auth::user()->toArray()
            ]);
        }

        return Response::json([
                    "status" => "error"
        ]);
    }

}
