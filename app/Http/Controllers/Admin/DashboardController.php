<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $participants = User::latest();
        if ($request->has('query')) {
            $participants->where("name", "LIKE", "%" . $request->input('query') . "%")->orWhere("email", "LIKE", "%" . $request->input('query') . "%");
        }
        $participants = $participants->paginate(1);

        return view('admin.dashboard', compact('participants'));
    }

    public function download_pdf(string $user_id)
    {
        $data = User::where("id", $user_id)->first();

        if (!$data) {
            flash()->error("User tidak ditemukan");
            return back();
        }

        $pdf = Pdf::loadView('pdf.undangan', [
            "data" => $data->toArray()
        ]);
        return $pdf->download('undangan.pdf');
    }
}
