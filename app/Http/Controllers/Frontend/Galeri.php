<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Galeri_model;

class Galeri extends Controller
{
    // Main page
    public function index()
    {
        $galeri = DB::table("galeri")
            ->join(
                "kategori_galeri",
                "kategori_galeri.id_kategori_galeri",
                "=",
                "galeri.id_kategori_galeri",
                "LEFT"
            )
            ->select("galeri.*", "kategori_galeri.nama_kategori_galeri")
            ->orderBy("galeri.id_galeri", "DESC")
            ->paginate(10);
        $site = $this->getConfigSite();

        $data = [
            "title" => "Galeri " . $site->namaweb,
            "deskripsi" => "Galeri " . $site->namaweb,
            "keywords" => "Galeri " . $site->namaweb,
            "galeris" => $galeri, 
            "content" => "frontend/galeri/index",
        ];
        return view("frontend/layout/wrapper", $data);
    }

    // detail
    public function detail($id_galeri)
    {
        $galeri = DB::table("galeri")
            ->join(
                "kategori_galeri",
                "kategori_galeri.id_kategori_galeri",
                "=",
                "galeri.id_kategori_galeri",
                "LEFT"
            )
            ->select("galeri.*", "kategori_galeri.nama_kategori_galeri")
            ->where("galeri.id_galeri", $id_galeri)
            ->orderBy("galeri.id_galeri", "DESC")
            ->first();
        $hits = $galeri->hits + 1;
        DB::table("galeri")
            ->where("id_galeri", $galeri->id_galeri)
            ->update([
                "hits" => $hits,
            ]);
        $data = [
            "title" => $galeri->judul_galeri,
            "deskripsi" => $galeri->judul_galeri,
            "keywords" => $galeri->judul_galeri,
            "galeri" => $galeri,
            "content" => "frontend/galeri/detail",
        ];
        return view("frontend/layout/wrapper", $data);
    }
}
