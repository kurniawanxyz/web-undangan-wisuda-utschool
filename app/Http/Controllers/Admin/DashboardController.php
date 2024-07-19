<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $participants = User::latest();
        if($request->has('query')){
            $participants->where("name", "LIKE", "%" . $request->input('query') . "%")->orWhere("email", "LIKE", "%" . $request->input('query') . "%");
        }
        $participants = $participants->paginate(1);

        return view('admin.dashboard', compact('participants'));
    }
}
