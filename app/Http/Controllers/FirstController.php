<?php

namespace App\Http\Controllers;

use Illuminate\Broadcasting\Channel;
use Illuminate\Http\Request;


class FirstController extends Controller
{
    public function storeContract(Request $request)
    {
      dd($request->email);
    }

    
    public function aboutabout(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:55',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:6|max:12',
        ]);


        \Log::Channel('aboutstore')->info('The contract From submited by'.rand(1,20));
        return redirect()->back();
        //dd($request->all());
    }
}
