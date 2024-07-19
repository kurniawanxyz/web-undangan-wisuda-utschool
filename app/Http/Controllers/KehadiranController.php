<?php

namespace App\Http\Controllers;

use App\Http\Requests\KehadiranStoreRequest;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class KehadiranController extends Controller
{
    public function index()
    {
        return view('kehadiran.index');
    }

    public function store(KehadiranStoreRequest $req)
    {
        try {
            $data = User::create($req->validated());
            dd($data);

            $pdf = Pdf::loadView('pdf.undangan', [
                "data" => $data->toArray()
            ]);
            flash()->success('Berhasil! Data kehadiran anda sudah tersimpan');
            return $pdf->download('undangan.pdf');
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
