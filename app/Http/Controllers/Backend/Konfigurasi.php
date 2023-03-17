<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
use App\Models\Konfigurasi_model;

class Konfigurasi extends Controller
{
    // Main page
    public function index()
    {
        
        $mykonfigurasi = new Konfigurasi_model();
        $site = $mykonfigurasi->listing();

        $data = [
            "title" => "Data Konfigurasi",
            "site" => $site,
            "content" => "backend/konfigurasi/index",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // logo
    public function logo()
    {
        
        $mykonfigurasi = new Konfigurasi_model();
        $site = $mykonfigurasi->listing();

        $data = [
            "title" => "Update Logo",
            "site" => $site,
            "content" => "backend/konfigurasi/logo",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // logo
    public function profil()
    {
        
        $mykonfigurasi = new Konfigurasi_model();
        $site = $mykonfigurasi->listing();

        $data = [
            "title" => "Profil " . $site->namaweb,
            "site" => $site,
            "content" => "backend/konfigurasi/profil",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // gambar
    public function gambar()
    {
        
        $mykonfigurasi = new Konfigurasi_model();
        $site = $mykonfigurasi->listing();

        $data = [
            "title" => "Update Gambar Banner",
            "site" => $site,
            "content" => "backend/konfigurasi/gambar",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // icon
    public function icon()
    {
        
        $mykonfigurasi = new Konfigurasi_model();
        $site = $mykonfigurasi->listing();

        $data = [
            "title" => "Update Icon",
            "site" => $site,
            "content" => "backend/konfigurasi/icon",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // email
    public function email()
    {
        
        $mykonfigurasi = new Konfigurasi_model();
        $site = $mykonfigurasi->listing();

        $data = [
            "title" => "Update Setting Email",
            "site" => $site,
            "content" => "backend/konfigurasi/email",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // pembayaran
    public function pembayaran()
    {
        
        $mykonfigurasi = new Konfigurasi_model();
        $site = $mykonfigurasi->listing();

        $data = [
            "title" => "Update Panduan Pembayaran",
            "site" => $site,
            "content" => "backend/konfigurasi/pembayaran",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // Proses
    public function proses(Request $request)
    {
        
        request()->validate([
            "namaweb" => "required",
        ]);
        DB::table("konfigurasi")
            ->where("id_konfigurasi", $request->id_konfigurasi)
            ->update([
                "namaweb" => $request->namaweb,
                "nama_singkat" => $request->nama_singkat,
                "singkatan" => $request->singkatan,
                "tagline" => $request->tagline,
                "tagline2" => $request->tagline2,
                "tentang" => $request->tentang,
                "website" => $request->website,
                "email" => $request->email,
                "email_cadangan" => $request->email_cadangan,
                "alamat" => $request->alamat,
                "telepon" => $request->telepon,
                "hp" => $request->hp,
                "fax" => $request->fax,
                "deskripsi" => $request->deskripsi,
                "keywords" => $request->keywords,
                "metatext" => $request->metatext,
                "facebook" => $request->facebook,
                "twitter" => $request->twitter,
                "instagram" => $request->instagram,
                "nama_facebook" => $request->nama_facebook,
                "nama_twitter" => $request->nama_twitter,
                "nama_instagram" => $request->nama_instagram,
                "google_map" => $request->google_map,
                "text_bawah_peta" => $request->text_bawah_peta,
                "link_bawah_peta" => $request->link_bawah_peta,
                "cara_pesan" => $request->cara_pesan,
                "id_user" => $this->logged_in_user->id,
            ]);
        return redirect("admin/konfigurasi")->with([
            "sukses" => "Data telah diupdate",
        ]);
    }

    // Proses
    public function proses_email(Request $request)
    {
        
        request()->validate([
            "smtp_protocol" => "required",
            "smtp_host" => "required",
            "smtp_port" => "required",
            "smtp_timeout" => "required",
            "smtp_user" => "required",
            "smtp_pass" => "required",
            "smtp_encryption" => "required",
            "smtp_sender_email" => "required",
            "smtp_sender_name" => "required",
        ]);
        DB::table("konfigurasi")
            ->where("id_konfigurasi", $request->id_konfigurasi)
            ->update([
                "smtp_protocol" => $request->smtp_protocol,
                "smtp_host" => $request->smtp_host,
                "smtp_port" => $request->smtp_port,
                "smtp_timeout" => $request->smtp_timeout,
                "smtp_user" => $request->smtp_user,
                "smtp_pass" => $request->smtp_pass,
                "smtp_encryption" => $request->smtp_encryption,
                "smtp_sender_email" => $request->smtp_sender_email,
                "smtp_sender_name" => $request->smtp_sender_name,
                "id_user" => $this->logged_in_user->id,
            ]);
        return redirect("admin/konfigurasi/email")->with([
            "sukses" => "Data setting email telah diupdate",
        ]);
    }

    // logo
    public function proses_logo(Request $request)
    {
        
        request()->validate([
            "logo" => "required|file|image|mimes:jpeg,png,jpg|max:8024",
        ]);
        // UPLOAD START
        $image = $request->file("logo");
        $filenamewithextension = $request
            ->file("logo")
            ->getClientOriginalName();
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $input["nama_file"] =
            Str::slug($filename, "-") .
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
        DB::table("konfigurasi")
            ->where("id_konfigurasi", $request->id_konfigurasi)
            ->update([
                "id_user" => $this->logged_in_user->id,
                "logo" => $input["nama_file"],
            ]);
        return redirect("admin/konfigurasi/logo")->with([
            "sukses" => "Logo telah diupdate",
        ]);
    }

    // logo
    public function proses_profil(Request $request)
    {
        
        request()->validate([
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
            DB::table("konfigurasi")
                ->where("id_konfigurasi", $request->id_konfigurasi)
                ->update([
                    "id_user" => $this->logged_in_user->id,
                    "nama_singkat" => $request->nama_singkat,
                    "tentang" => $request->tentang,
                    "gambar" => $input["nama_file"],
                ]);
        } else {
            DB::table("konfigurasi")
                ->where("id_konfigurasi", $request->id_konfigurasi)
                ->update([
                    "id_user" => $this->logged_in_user->id,
                    "nama_singkat" => $request->nama_singkat,
                    "tentang" => $request->tentang,
                ]);
        }
        return redirect("admin/konfigurasi/profil")->with([
            "sukses" => "Logo telah diupdate",
        ]);
    }

    // icon
    public function proses_icon(Request $request)
    {
        
        request()->validate([
            "icon" => "required|file|image|mimes:jpeg,png,jpg|max:8024",
        ]);
        // UPLOAD START
        $image = $request->file("icon");
        $filenamewithextension = $request
            ->file("icon")
            ->getClientOriginalName();
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $input["nama_file"] =
            Str::slug($filename, "-") .
            "." .
            $image->getClientOriginalExtension();
        $destinationPath = "./assets/upload/image/thumbs";
        $img = Image::make($image->getRealPath(), [
            "width" => 150,
            "height" => 150,
            "grayscale" => false,
        ]);
        $img->save($destinationPath . "/" . $input["nama_file"]);
        $destinationPath = "./assets/upload/image";
        $image->move($destinationPath, $input["nama_file"]);
        // END UPLOAD
        DB::table("konfigurasi")
            ->where("id_konfigurasi", $request->id_konfigurasi)
            ->update([
                "id_user" => $this->logged_in_user->id,
                "icon" => $input["nama_file"],
            ]);
        return redirect("admin/konfigurasi/icon")->with([
            "sukses" => "Icon telah diupdate",
        ]);
    }

    // gambar
    public function proses_gambar(Request $request)
    {
        
        request()->validate([
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
        DB::table("konfigurasi")
            ->where("id_konfigurasi", $request->id_konfigurasi)
            ->update([
                "id_user" => $this->logged_in_user->id,
                "gambar" => $input["nama_file"],
            ]);
        return redirect("admin/konfigurasi/gambar")->with([
            "sukses" => "Gambar Banner telah diupdate",
        ]);
    }

    // edit
    public function proses_pembayaran(Request $request)
    {
        
        request()->validate([
            "judul_pembayaran" => "required",
            "isi_pembayaran" => "required",
            "gambar_pembayaran" => "image|mimes:jpeg,png,jpg|max:8024",
        ]);
        // UPLOAD START
        $image = $request->file("gambar_pembayaran");
        if (!empty($image)) {
            $filenamewithextension = $request
                ->file("gambar_pembayaran")
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
            DB::table("konfigurasi")
                ->where("id_konfigurasi", $request->id_konfigurasi)
                ->update([
                    "judul_pembayaran" => $request->judul_pembayaran,
                    "isi_pembayaran" => $request->isi_pembayaran,
                    "gambar_pembayaran" => $input["nama_file"],
                    "id_user" => $this->logged_in_user->id,
                ]);
        } else {
            DB::table("konfigurasi")
                ->where("id_konfigurasi", $request->id_konfigurasi)
                ->update([
                    "judul_pembayaran" => $request->judul_pembayaran,
                    "isi_pembayaran" => $request->isi_pembayaran,
                    "id_user" => $this->logged_in_user->id,
                ]);
        }
        return redirect("admin/konfigurasi/pembayaran")->with([
            "sukses" => "Data metode pembayaran telah diupdate",
        ]);
    }
}
