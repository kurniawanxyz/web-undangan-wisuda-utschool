<?php

namespace App\Http\Controllers;

use App\Http\Requests\KehadiranStoreRequest;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class KehadiranController extends Controller
{
    public function index()
    {
        return view('kehadiran.index');
    }

    public function store(KehadiranStoreRequest $req)
    {
        try{
            $data = User::create($req->validated());
            dd($data);

            $pdf = Pdf::loadView('pdf.undangan',[
                "data" => $data->toArray()
            ]);
            flash()->success('Berhasil! Data kehadiran anda sudah tersimpan');
            return $pdf->download('undangan.pdf');
        }catch (\Exception $e){
            flash()->error($e->getMessage());
        }
        return back();
    }
}
