<?php

namespace App\Http\Controllers;

use App\Models\Mahasisawa\Mahasiswa;
use App\Models\Ranking;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(){
        $data = Ranking::join('mahasiswas', 'rankings.mahasiswa_id', '=', 'mahasiswas.id')
                            ->select('rankings.skor', 'mahasiswas.nim', 'mahasiswas.nama')
                            ->orderBy('rankings.skor', 'desc')
                            ->get();

        return view('index', compact('data'));
    }
}
