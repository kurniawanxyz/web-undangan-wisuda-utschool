<?php

namespace App\Http\Controllers;

use App\Http\Requests\KehadiranStoreRequest;
use App\Models\FormStatus;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KehadiranController extends Controller
{
    public function index()
    {
        $form = FormStatus::where('id', 1)->first();
        if ($form) {
            $form_status = $form->form_status;
            return view('kehadiran.index', compact('form_status'));
        }
        return view('kehadiran.index');
    }

    public function store(KehadiranStoreRequest $req)
    {
        try {
            $data = User::create($req->validated());
            $name = $data->toArray()['name'];
            $id = $data->toArray()['id'];

            if ($req->kehadiran === 'tidak_hadir') {
                return view('kehadiran.tidak_hadir');
            }

            $pdf = Pdf::setPaper('A4', 'landscape')->loadView('pdf.undangan ', [
                "name" => $name
            ]);
            $pdfPath = "public/user_pdf/{$id}.pdf";
            Storage::put($pdfPath, $pdf->output());

            return response()->file(storage_path("app/{$pdfPath}"), [
                'Content-Type' => 'application/pdf',
            ]);
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
        return back();
    }
    public function delete(string $user_id)
    {
        try {
            DB::beginTransaction();
            $user = User::where("id", $user_id)->first();

            if (!$user) {
                flash()->error("User tidak ditemukan");
                return back();
            }

            $name = $user->name;
            $user->delete();

            if (Storage::exists("public/user_pdf/{$user->id}.pdf")) {
                Storage::delete("public/user_pdf/{$user->id}.pdf");
            }

            flash()->success("Berhasil meghapus user '$name'");

            DB::commit();
            return back();
        } catch (\Exception $e) {
            DB::rollBack();
            flash()->error($e->getMessage());
            return back();
        }
    }
}
