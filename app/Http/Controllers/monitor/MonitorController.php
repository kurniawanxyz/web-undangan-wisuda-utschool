<?php

namespace App\Http\Controllers\monitor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    public function __invoke()
    {
        $participants = User::latest()->paginate(1);
        return view('monitor.index', compact('participants'));
    }
}
