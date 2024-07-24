<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $participants = User::latest();
        if ($request->has('query')) {
            $participants->where("name", "LIKE", "%" . $request->input('query') . "%")->orWhere("email", "LIKE", "%" . $request->input('query') . "%");
        }
        $participants = $participants->paginate(10);

        return view('admin.dashboard', compact('participants'));
    }

    public function download_pdf(string $user_id)
    {
        $data = User::where("id", $user_id)->first();

        if (!$data) {
            flash()->error("User tidak ditemukan");
            return back();
        }

        return response()->download(storage_path("app/public/user_pdf/{$data->id}.pdf"), "{$data->id}.pdf", [
            'Content-Type' => 'application/pdf',
        ]);
    }

    public function download_all_pdf()
    {
        $zipFileName = 'user_pdfs.zip';
        $zipFilePath = storage_path("app/public/{$zipFileName}");

        $zip = new ZipArchive();
        $zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        $files = Storage::files('public/user_pdf');

        foreach ($files as $file) {
            $filePath = storage_path("app/{$file}");
            $fileName = basename($file);

            $zip->addFile($filePath, $fileName);
        }

        $zip->close();
        return response()->download($zipFilePath, $zipFileName)->deleteFileAfterSend(true);
    }
}
