<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Image;
use App\Models\Berita_model;

class Berita extends Controller
{
    // Main page
    public function index()
    { 
        Paginator::useBootstrap();
        $myberita = new Berita_model();
        $berita = $myberita->berita_update();
        $kategori = DB::table("kategori")
            ->orderBy("urutan", "ASC")
            ->get();

        $data = [
            "title" => "Data Berita",
            "berita" => $berita,
            "beritas" => $berita,
            "kategori" => $kategori,
            "content" => "backend/berita/index",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // Add
    public function add()
    {
        $data = ["title" => "Data Berita"];
        return view("admin/berita/add", $data);
    }

    // Cari
    public function cari(Request $request)
    { 
        $myberita = new Berita_model();
        $keywords = $request->keywords;
        $berita = $myberita->cari($keywords);
        $kategori = DB::table("kategori")
            ->orderBy("urutan", "ASC")
            ->get();

        $data = [
            "title" => "Data Berita",
            "berita" => $berita,
            "kategori" => $kategori,
            "content" => "backend/berita/index",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site = DB::table("konfigurasi")->first();
        $pengalihan = $request->pengalihan;
        // PROSES HAPUS MULTIPLE
        if (isset($_POST["hapus"])) {
            $id_beritanya = $request->id_berita;
            for ($i = 0; $i < sizeof($id_beritanya); $i++) {
                DB::table("berita")
                    ->where("id_berita", $id_beritanya[$i])
                    ->delete();
            }
            return redirect($pengalihan)->with([
                "sukses" => "Data telah dihapus",
            ]);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST["draft"])) {
            $id_beritanya = $request->id_berita;
            for ($i = 0; $i < sizeof($id_beritanya); $i++) {
                DB::table("berita")
                    ->where("id_berita", $id_beritanya[$i])
                    ->update([
                        "id_user" => $this->logged_in_user->id,
                        "status_berita" => "Draft",
                    ]);
            }
            return redirect($pengalihan)->with([
                "sukses" => "Data telah diubah menjadi Draft",
            ]);
            // PROSES SETTING PUBLISH
        } elseif (isset($_POST["publish"])) {
            $id_beritanya = $request->id_berita;
            for ($i = 0; $i < sizeof($id_beritanya); $i++) {
                DB::table("berita")
                    ->where("id_berita", $id_beritanya[$i])
                    ->update([
                        "id_user" => $this->logged_in_user->id,
                        "status_berita" => "Publish",
                    ]);
            }
            return redirect($pengalihan)->with([
                "sukses" => "Data telah diubah menjadi Publish",
            ]);
        } elseif (isset($_POST["update"])) {
            $id_beritanya = $request->id_berita;
            for ($i = 0; $i < sizeof($id_beritanya); $i++) {
                DB::table("berita")
                    ->where("id_berita", $id_beritanya[$i])
                    ->update([
                        "id_user" => $this->logged_in_user->id,
                        "id_kategori" => $request->id_kategori,
                    ]);
            }
            return redirect($pengalihan)->with([
                "sukses" => "Data kategori telah diubah",
            ]);
        }
    }

    //Status
    public function status_berita($status_berita)
    { 
        Paginator::useBootstrap();
        $myberita = new Berita_model();
        $berita = $myberita->status_berita($status_berita);
        $kategori = DB::table("kategori")
            ->orderBy("urutan", "ASC")
            ->get();

        $data = [
            "title" => "Status Berita: " . $status_berita,
            "berita" => $berita,
            "kategori" => $kategori,
            "content" => "backend/berita/index",
        ];
        return view("backend/layout/wrapper", $data);
    }

    //Status
    public function jenis_berita($jenis_berita)
    {
        
        Paginator::useBootstrap();
        $myberita = new Berita_model();
        $berita = $myberita->jenis_berita($jenis_berita);
        $kategori = DB::table("kategori")
            ->orderBy("urutan", "ASC")
            ->get();

        $data = [
            "title" => "Jenis Berita: " . $jenis_berita,
            "berita" => $berita,
            "kategori" => $kategori,
            "content" => "backend/berita/index",
        ];
        return view("backend/layout/wrapper", $data);
    }

    //Status
    public function author($id_user)
    {
        
        Paginator::useBootstrap();
        $myberita = new Berita_model();
        $berita = $myberita->author($id_user);
        $kategori = DB::table("kategori")
            ->orderBy("urutan", "ASC")
            ->get();
        $author = DB::table("users")
            ->where("id", $id_user)
            ->orderBy("id", "ASC")
            ->first();

        $data = [
            "title" => "Data Berita dengan Penulis: " . $author->nama,
            "berita" => $berita,
            "kategori" => $kategori,
            "content" => "backend/berita/index",
        ];
        return view("backend/layout/wrapper", $data);
    }

    //Kategori
    public function kategori($id_kategori)
    {
        
        Paginator::useBootstrap();
        $myberita = new Berita_model();
        $berita = $myberita->all_kategori($id_kategori);
        $kategori = DB::table("kategori")
            ->orderBy("urutan", "ASC")
            ->get();
        $detail = DB::table("kategori")
            ->where("id_kategori", $id_kategori)
            ->first();
        $data = [
            "title" => "Kategori: " . $detail->nama_kategori,
            "berita" => $berita,
            "kategori" => $kategori,
            "content" => "backend/berita/index",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // Tambah
    public function tambah()
    {
        
        $kategori = DB::table("kategori")
            ->orderBy("urutan", "ASC")
            ->get();

        $data = [
            "title" => "Tambah Berita",
            "kategori" => $kategori,
            "content" => "backend/berita/tambah",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // edit
    public function edit($id_berita)
    {
        $myberita = new Berita_model();
        $berita = $myberita->detail($id_berita);
        $kategori = DB::table("kategori")
            ->orderBy("urutan", "ASC")
            ->get();

        $data = [
            "title" => "Edit Berita",
            "berita" => $berita,
            "kategori" => $kategori,
            "content" => "backend/berita/edit",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
        
        request()->validate([
            "judul_berita" => "required|unique:berita",
            "isi" => "required",
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
            $slug_berita = Str::slug($request->judul_berita, "-");
            DB::table("berita")->insert([
                "id_kategori" => $request->id_kategori,
                "id_user" => $this->logged_in_user->id,
                "slug_berita" => $slug_berita,
                "judul_berita" => $request->judul_berita,
                "isi" => $request->isi,
                "jenis_berita" => $request->jenis_berita,
                "status_berita" => $request->status_berita,
                "gambar" => $input["nama_file"],
                "icon" => $request->icon,
                "keywords" => $request->keywords,
                "tanggal_publish" =>
                    date("Y-m-d", strtotime($request->tanggal_publish)) .
                    " " .
                    $request->jam_publish,
                "urutan" => $request->urutan,
                "tanggal_post" => date("Y-m-d H:i:s"),
            ]);
        } else {
            $slug_berita = Str::slug($request->judul_berita, "-");
            DB::table("berita")->insert([
                "id_kategori" => $request->id_kategori,
                "id_user" => $this->logged_in_user->id,
                "slug_berita" => $slug_berita,
                "judul_berita" => $request->judul_berita,
                "isi" => $request->isi,
                "jenis_berita" => $request->jenis_berita,
                "status_berita" => $request->status_berita,
                "icon" => $request->icon,
                "keywords" => $request->keywords,
                "tanggal_publish" =>
                    date("Y-m-d", strtotime($request->tanggal_publish)) .
                    " " .
                    $request->jam_publish,
                "urutan" => $request->urutan,
                "tanggal_post" => date("Y-m-d H:i:s"),
            ]);
        }
        if ($request->jenis_berita == "Berita") {
            return redirect("admin/berita")->with([
                "sukses" => "Data telah ditambah",
            ]);
        } else {
            return redirect(
                "admin/berita/jenis_berita/" . $request->jenis_berita
            )->with(["sukses" => "Data telah ditambah"]);
        }
    }

    // edit
    public function edit_proses(Request $request)
    {
        
        request()->validate([
            "judul_berita" => "required",
            "isi" => "required",
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
            $slug_berita = Str::slug($request->judul_berita, "-");
            DB::table("berita")
                ->where("id_berita", $request->id_berita)
                ->update([
                    "id_kategori" => $request->id_kategori,
                    "id_user" => $this->logged_in_user->id,
                    "slug_berita" => $slug_berita,
                    "judul_berita" => $request->judul_berita,
                    "isi" => $request->isi,
                    "jenis_berita" => $request->jenis_berita,
                    "status_berita" => $request->status_berita,
                    "gambar" => $input["nama_file"],
                    "icon" => $request->icon,
                    "keywords" => $request->keywords,
                    "tanggal_publish" =>
                        date("Y-m-d", strtotime($request->tanggal_publish)) .
                        " " .
                        $request->jam_publish,
                    "urutan" => $request->urutan,
                ]);
        } else {
            $slug_berita = Str::slug($request->judul_berita, "-");
            DB::table("berita")
                ->where("id_berita", $request->id_berita)
                ->update([
                    "id_kategori" => $request->id_kategori,
                    "id_user" => $this->logged_in_user->id,
                    "slug_berita" => $slug_berita,
                    "judul_berita" => $request->judul_berita,
                    "isi" => $request->isi,
                    "jenis_berita" => $request->jenis_berita,
                    "status_berita" => $request->status_berita,
                    "icon" => $request->icon,
                    "keywords" => $request->keywords,
                    "tanggal_publish" =>
                        date("Y-m-d", strtotime($request->tanggal_publish)) .
                        " " .
                        $request->jam_publish,
                    "urutan" => $request->urutan,
                ]);
        }
        if ($request->jenis_berita == "Berita") {
            return redirect("admin/berita")->with([
                "sukses" => "Data telah ditambah",
            ]);
        } else {
            return redirect(
                "admin/berita/jenis_berita/" . $request->jenis_berita
            )->with(["sukses" => "Data telah ditambah"]);
        }
    }

    // Delete
    public function delete($id_berita, $jenis_berita)
    {
        
        DB::table("berita")
            ->where("id_berita", $id_berita)
            ->delete();
        return redirect("admin/berita/jenis_berita/" . $jenis_berita)->with([
            "sukses" => "Data telah dihapus",
        ]);
    }
}
