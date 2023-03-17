<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
use App\Models\Download_model;

class Download extends Controller
{
    // Main page
    public function index()
    {
        
        $mydownload = new Download_model();
        $download = $mydownload->semua();
        $kategori_download = DB::table("kategori_download")
            ->orderBy("urutan", "ASC")
            ->get();

        $data = [
            "title" => "Data Download",
            "download" => $download,
            "kategori_download" => $kategori_download,
            "content" => "backend/download/index",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // Cari
    public function cari(Request $request)
    {
        
        $mydownload = new Download_model();
        $keywords = $request->keywords;
        $download = $mydownload->cari($keywords);
        $kategori_download = DB::table("kategori_download")
            ->orderBy("urutan", "ASC")
            ->get();

        $data = [
            "title" => "Data Download",
            "download" => $download,
            "kategori_download" => $kategori_download,
            "content" => "backend/download/index",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site = DB::table("konfigurasi")->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST["hapus"])) {
            $id_downloadnya = $request->id_download;
            for ($i = 0; $i < sizeof($id_downloadnya); $i++) {
                DB::table("download")
                    ->where("id_download", $id_downloadnya[$i])
                    ->delete();
            }
            return redirect("admin/download")->with([
                "sukses" => "Data telah dihapus",
            ]);
            // PROSES SETTING DRAFT
        } elseif (isset($_POST["update"])) {
            $id_downloadnya = $request->id_download;
            for ($i = 0; $i < sizeof($id_downloadnya); $i++) {
                DB::table("download")
                    ->where("id_download", $id_downloadnya[$i])
                    ->update([
                        "id_user" => $this->logged_in_user->id,
                        "id_kategori_download" =>
                            $request->id_kategori_download,
                    ]);
            }
            return redirect("admin/download")->with([
                "sukses" => "Data kategori telah diubah",
            ]);
        }
    }

    //Status
    public function status_download($status_download)
    {
        
        $mydownload = new Download_model();
        $download = $mydownload->status_download($status_download);
        $kategori_download = DB::table("kategori_download")
            ->orderBy("urutan", "ASC")
            ->get();

        $data = [
            "title" => "Data Download",
            "download" => $download,
            "kategori_download" => $kategori_download,
            "content" => "backend/download/index",
        ];
        return view("backend/layout/wrapper", $data);
    }

    //Kategori
    public function kategori($id_kategori_download)
    {
        
        $mydownload = new Download_model();
        $download = $mydownload->all_kategori_download($id_kategori_download);
        $kategori_download = DB::table("kategori_download")
            ->orderBy("urutan", "ASC")
            ->get();

        $data = [
            "title" => "Data Download",
            "download" => $download,
            "kategori_download" => $kategori_download,
            "content" => "backend/download/index",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // Tambah
    public function tambah()
    {
        
        $kategori_download = DB::table("kategori_download")
            ->orderBy("urutan", "ASC")
            ->get();

        $data = [
            "title" => "Tambah Download",
            "kategori_download" => $kategori_download,
            "content" => "backend/download/tambah",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // Unduh
    public function unduh($id_download)
    {
        
        $mydownload = new Download_model();
        $download = $mydownload->detail($id_download);
        $hits = $download->hits + 1;
        DB::table("download")
            ->where("id_download", $download->id_download)
            ->update([
                "hits" => $hits,
            ]);
        // $pathToFile = "./public/upload/file/" . $download->gambar;
        $pathToFile = public_path("upload/file/" . $download->gambar);
        return response()->download($pathToFile, $download->gambar);
    }

    // edit
    public function edit($id_download)
    {
        
        $mydownload = new Download_model();
        $download = $mydownload->detail($id_download);
        $kategori_download = DB::table("kategori_download")
            ->orderBy("urutan", "ASC")
            ->get();

        $data = [
            "title" => "Edit Download",
            "download" => $download,
            "kategori_download" => $kategori_download,
            "content" => "backend/download/edit",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
        
        request()->validate([
            "judul_download" => "required|unique:download",
            "gambar" =>
                "required|file|mimes:jpeg,png,jpg,pdf,doc,docx,xls,xlsx,ppt,pptx|max:8024",
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
        $destinationPath = "./assets/upload/file";
        $image->move($destinationPath, $input["nama_file"]);
        // END UPLOAD
        DB::table("download")->insert([
            "id_kategori_download" => $request->id_kategori_download,
            "id_user" => $this->logged_in_user->id,
            "judul_download" => $request->judul_download,
            "jenis_download" => $request->jenis_download,
            "isi" => $request->isi,
            "gambar" => $input["nama_file"],
            "website" => $request->website,
        ]);
        return redirect("admin/download")->with([
            "sukses" => "Data telah ditambah",
        ]);
    }

    // edit
    public function edit_proses(Request $request)
    {
        
        request()->validate([
            "judul_download" => "required",
            "gambar" =>
                "file|mimes:jpeg,png,jpg,pdf,doc,docx,xls,xlsx,ppt,pptx|max:8024",
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
            $destinationPath = "./assets/upload/file";
            $image->move($destinationPath, $input["nama_file"]);
            // END UPLOAD
            DB::table("download")
                ->where("id_download", $request->id_download)
                ->update([
                    "id_kategori_download" => $request->id_kategori_download,
                    "id_user" => $this->logged_in_user->id,
                    "judul_download" => $request->judul_download,
                    "jenis_download" => $request->jenis_download,
                    "isi" => $request->isi,
                    "gambar" => $input["nama_file"],
                    "website" => $request->website,
                ]);
        } else {
            DB::table("download")
                ->where("id_download", $request->id_download)
                ->update([
                    "id_kategori_download" => $request->id_kategori_download,
                    "id_user" => $this->logged_in_user->id,
                    "judul_download" => $request->judul_download,
                    "jenis_download" => $request->jenis_download,
                    "isi" => $request->isi,
                    "website" => $request->website,
                ]);
        }
        return redirect("admin/download")->with([
            "sukses" => "Data telah ditambah",
        ]);
    }

    // Delete
    public function delete($id_download)
    {
        
        DB::table("download")
            ->where("id_download", $id_download)
            ->delete();
        return redirect("admin/download")->with([
            "sukses" => "Data telah dihapus",
        ]);
    }
}
