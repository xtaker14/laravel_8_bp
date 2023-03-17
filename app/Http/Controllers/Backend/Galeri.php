<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
use App\Models\Galeri_model;

class Galeri extends Controller
{
    // Main page
    public function index()
    {
        
        $mygaleri = new Galeri_model();
        $galeri = $mygaleri->semua();
        $kategori_galeri = DB::table("kategori_galeri")
            ->orderBy("urutan", "ASC")
            ->get();

        $data = [
            "title" => "Data Galeri",
            "galeri" => $galeri,
            "kategori_galeri" => $kategori_galeri,
            "content" => "backend/galeri/index",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // Cari
    public function cari(Request $request)
    {
        
        $mygaleri = new Galeri_model();
        $keywords = $request->keywords;
        $galeri = $mygaleri->cari($keywords);
        $kategori_galeri = DB::table("kategori_galeri")
            ->orderBy("urutan", "ASC")
            ->get();

        $data = [
            "title" => "Data Galeri",
            "galeri" => $galeri,
            "kategori_galeri" => $kategori_galeri,
            "content" => "backend/galeri/index",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site = DB::table("konfigurasi")->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST["hapus"])) {
            $id_galerinya = $request->id_galeri;
            for ($i = 0; $i < sizeof($id_galerinya); $i++) {
                DB::table("galeri")
                    ->where("id_galeri", $id_galerinya[$i])
                    ->delete();
            }
            return redirect("admin/galeri")->with([
                "sukses" => "Data telah dihapus",
            ]);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST["update"])) {
            $id_galerinya = $request->id_galeri;
            for ($i = 0; $i < sizeof($id_galerinya); $i++) {
                DB::table("galeri")
                    ->where("id_galeri", $id_galerinya[$i])
                    ->update([
                        "id_user" => $this->logged_in_user->id,
                        "id_kategori_galeri" => $request->id_kategori_galeri,
                    ]);
            }
            return redirect("admin/galeri")->with([
                "sukses" => "Data kategori telah diubah",
            ]);
        }
    }

    //Status
    public function status_galeri($status_galeri)
    {
        
        $mygaleri = new Galeri_model();
        $galeri = $mygaleri->status_galeri($status_galeri);
        $kategori_galeri = DB::table("kategori_galeri")
            ->orderBy("urutan", "ASC")
            ->get();

        $data = [
            "title" => "Data Galeri",
            "galeri" => $galeri,
            "kategori_galeri" => $kategori_galeri,
            "content" => "backend/galeri/index",
        ];
        return view("backend/layout/wrapper", $data);
    }

    //Kategori
    public function kategori($id_kategori_galeri)
    {
        
        $mygaleri = new Galeri_model();
        $galeri = $mygaleri->all_kategori_galeri($id_kategori_galeri);
        $kategori_galeri = DB::table("kategori_galeri")
            ->orderBy("urutan", "ASC")
            ->get();

        $data = [
            "title" => "Data Galeri",
            "galeri" => $galeri,
            "kategori_galeri" => $kategori_galeri,
            "content" => "backend/galeri/index",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // Tambah
    public function tambah()
    {
        
        $kategori_galeri = DB::table("kategori_galeri")
            ->orderBy("urutan", "ASC")
            ->get();

        $data = [
            "title" => "Tambah Galeri",
            "kategori_galeri" => $kategori_galeri,
            "content" => "backend/galeri/tambah",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // edit
    public function edit($id_galeri)
    {
        
        $mygaleri = new Galeri_model();
        $galeri = $mygaleri->detail($id_galeri);
        $kategori_galeri = DB::table("kategori_galeri")
            ->orderBy("urutan", "ASC")
            ->get();

        $data = [
            "title" => "Edit Galeri",
            "galeri" => $galeri,
            "kategori_galeri" => $kategori_galeri,
            "content" => "backend/galeri/edit",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
        
        request()->validate([
            "judul_galeri" => "required|unique:galeri",
            "gambar" => "required|file|image|mimes:jpeg,png,jpg|max:8024",
        ]);
        // UPLOAD START
        $image = $request->file("gambar");
        $filenamewithextension = $request
            ->file("gambar")
            ->getClientOriginalName();
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $input["nama_file"] =
            Str::slug($filename, "-") .
            "-" .
            time() .
            "." .
            $image->getClientOriginalExtension();
        $destinationPath = "./assets/upload/image/thumbs/";
        $img = Image::make($image->getRealPath(), [
            "width" => 150,
            "height" => 150,
            "grayscale" => false,
        ]);
        $img->save($destinationPath . "/" . $input["nama_file"]);
        $destinationPath = "./assets/upload/image/";
        $image->move($destinationPath, $input["nama_file"]);
        // END UPLOAD
        $slug_nama_galeri = Str::slug($request->nama_galeri, "-");
        if ($request->mulai_diskon == "") {
            $mulai_diskon = null;
        } else {
            $mulai_diskon = date("Y-m-d", strtotime($request->mulai_diskon));
        }
        if ($request->selesai_diskon == "") {
            $selesai_diskon = null;
        } else {
            $selesai_diskon = date(
                "Y-m-d",
                strtotime($request->selesai_diskon)
            );
        }
        DB::table("galeri")->insert([
            "id_user" => $this->logged_in_user->id,
            "id_kategori_galeri" => $request->id_kategori_galeri,
            "id_user" => $this->logged_in_user->id,
            "judul_galeri" => $request->judul_galeri,
            "isi" => $request->isi,
            "jenis_galeri" => $request->jenis_galeri,
            "gambar" => $input["nama_file"],
            "website" => $request->website,
            "status_text" => $request->status_text,
            "urutan" => $request->urutan,
        ]);
        return redirect("admin/galeri")->with([
            "sukses" => "Data telah ditambah",
        ]);
    }

    // edit
    public function edit_proses(Request $request)
    {
        
        request()->validate([
            "judul_galeri" => "required",
            "gambar" => "file|image|mimes:jpeg,png,jpg|max:8024",
        ]);
        // UPLOAD START
        $image = $request->file("gambar");
        if (!empty($image)) {
            $filenamewithextension = $request
                ->file("gambar")
                ->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input["nama_file"] =
                Str::slug($filename, "-") .
                "-" .
                time() .
                "." .
                $image->getClientOriginalExtension();
            $destinationPath = "./assets/upload/image/thumbs/";
            $img = Image::make($image->getRealPath(), [
                "width" => 150,
                "height" => 150,
                "grayscale" => false,
            ]);
            $img->save($destinationPath . "/" . $input["nama_file"]);
            $destinationPath = "./assets/upload/image/";
            $image->move($destinationPath, $input["nama_file"]);
            // END UPLOAD
            $slug_nama_galeri = Str::slug($request->nama_galeri, "-");
            if ($request->mulai_diskon == "") {
                $mulai_diskon = null;
            } else {
                $mulai_diskon = date(
                    "Y-m-d",
                    strtotime($request->mulai_diskon)
                );
            }
            if ($request->selesai_diskon == "") {
                $selesai_diskon = null;
            } else {
                $selesai_diskon = date(
                    "Y-m-d",
                    strtotime($request->selesai_diskon)
                );
            }
            DB::table("galeri")
                ->where("id_galeri", $request->id_galeri)
                ->update([
                    "id_user" => $this->logged_in_user->id,
                    "id_kategori_galeri" => $request->id_kategori_galeri,
                    "id_user" => $this->logged_in_user->id,
                    "judul_galeri" => $request->judul_galeri,
                    "isi" => $request->isi,
                    "jenis_galeri" => $request->jenis_galeri,
                    "gambar" => $input["nama_file"],
                    "website" => $request->website,
                    "status_text" => $request->status_text,
                    "urutan" => $request->urutan,
                ]);
        } else {
            $slug_nama_galeri = Str::slug($request->nama_galeri, "-");
            if ($request->mulai_diskon == "") {
                $mulai_diskon = null;
            } else {
                $mulai_diskon = date(
                    "Y-m-d",
                    strtotime($request->mulai_diskon)
                );
            }
            if ($request->selesai_diskon == "") {
                $selesai_diskon = null;
            } else {
                $selesai_diskon = date(
                    "Y-m-d",
                    strtotime($request->selesai_diskon)
                );
            }
            DB::table("galeri")
                ->where("id_galeri", $request->id_galeri)
                ->update([
                    "id_user" => $this->logged_in_user->id,
                    "id_kategori_galeri" => $request->id_kategori_galeri,
                    "id_user" => $this->logged_in_user->id,
                    "judul_galeri" => $request->judul_galeri,
                    "isi" => $request->isi,
                    "jenis_galeri" => $request->jenis_galeri,
                    "website" => $request->website,
                    "status_text" => $request->status_text,
                    "urutan" => $request->urutan,
                ]);
        }
        return redirect("admin/galeri")->with([
            "sukses" => "Data telah ditambah",
        ]);
    }

    // Delete
    public function delete($id_galeri)
    {
        
        DB::table("galeri")
            ->where("id_galeri", $id_galeri)
            ->delete();
        return redirect("admin/galeri")->with([
            "sukses" => "Data telah dihapus",
        ]);
    }
}
