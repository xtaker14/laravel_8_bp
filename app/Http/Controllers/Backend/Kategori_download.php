<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Kategori_download extends Controller
{
    // Index
    public function index()
    {
        
        $kategori_download = DB::table("kategori_download")
            ->orderBy("urutan", "ASC")
            ->get();

        $data = [
            "title" => "Kategori Download",
            "kategori_download" => $kategori_download,
            "content" => "backend/kategori_download/index",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // tambah
    public function tambah(Request $request)
    {
        
        request()->validate([
            "nama_kategori_download" => "required|unique:kategori_download",
            "urutan" => "required",
        ]);
        $slug_kategori_download = Str::slug(
            $request->nama_kategori_download,
            "-"
        );
        DB::table("kategori_download")->insert([
            "nama_kategori_download" => $request->nama_kategori_download,
            "slug_kategori_download" => $slug_kategori_download,
            "urutan" => $request->urutan,
            "keterangan" => $request->keterangan,
        ]);
        return redirect("admin/kategori_download")->with([
            "sukses" => "Data telah ditambah",
        ]);
    }

    // edit
    public function edit(Request $request)
    {
        
        request()->validate([
            "nama_kategori_download" => "required",
            "urutan" => "required",
        ]);
        $slug_kategori_download = Str::slug(
            $request->nama_kategori_download,
            "-"
        );
        DB::table("kategori_download")
            ->where("id_kategori_download", $request->id_kategori_download)
            ->update([
                "nama_kategori_download" => $request->nama_kategori_download,
                "slug_kategori_download" => $slug_kategori_download,
                "urutan" => $request->urutan,
                "keterangan" => $request->keterangan,
            ]);
        return redirect("admin/kategori_download")->with([
            "sukses" => "Data telah diupdate",
        ]);
    }

    // Delete
    public function delete($id_kategori_download)
    {
        
        DB::table("kategori_download")
            ->where("id_kategori_download", $id_kategori_download)
            ->delete();
        return redirect("admin/kategori_download")->with([
            "sukses" => "Data telah dihapus",
        ]);
    }
}
