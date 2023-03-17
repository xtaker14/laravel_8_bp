<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Kategori_galeri extends Controller
{
    // Index
    public function index()
    {
        
        $kategori_galeri = DB::table("kategori_galeri")
            ->orderBy("urutan", "ASC")
            ->get();

        $data = [
            "title" => "Kategori Galeri",
            "kategori_galeri" => $kategori_galeri,
            "content" => "backend/kategori_galeri/index",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // tambah
    public function tambah(Request $request)
    {
        
        request()->validate([
            "nama_kategori_galeri" => "required|unique:kategori_galeri",
            "urutan" => "required",
        ]);
        $slug_kategori_galeri = Str::slug($request->nama_kategori_galeri, "-");
        DB::table("kategori_galeri")->insert([
            "nama_kategori_galeri" => $request->nama_kategori_galeri,
            "slug_kategori_galeri" => $slug_kategori_galeri,
            "urutan" => $request->urutan,
        ]);
        return redirect("admin/kategori_galeri")->with([
            "sukses" => "Data telah ditambah",
        ]);
    }

    // edit
    public function edit(Request $request)
    {
        
        request()->validate([
            "nama_kategori_galeri" => "required",
            "urutan" => "required",
        ]);
        $slug_kategori_galeri = Str::slug($request->nama_kategori_galeri, "-");
        DB::table("kategori_galeri")
            ->where("id_kategori_galeri", $request->id_kategori_galeri)
            ->update([
                "nama_kategori_galeri" => $request->nama_kategori_galeri,
                "slug_kategori_galeri" => $slug_kategori_galeri,
                "urutan" => $request->urutan,
            ]);
        return redirect("admin/kategori_galeri")->with([
            "sukses" => "Data telah diupdate",
        ]);
    }

    // Delete
    public function delete($id_kategori_galeri)
    {
        
        DB::table("kategori_galeri")
            ->where("id_kategori_galeri", $id_kategori_galeri)
            ->delete();
        return redirect("admin/kategori_galeri")->with([
            "sukses" => "Data telah dihapus",
        ]);
    }
}
