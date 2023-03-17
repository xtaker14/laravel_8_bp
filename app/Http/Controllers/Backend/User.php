<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;

class User extends Controller
{
    // Index
    public function index()
    {
        
        $user = DB::table("users")
            ->orderBy("id", "DESC")
            ->get();

        $data = [
            "title" => "Pengguna Website",
            "user" => $user,
            "content" => "backend/user/index",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // Index
    public function edit($id_user)
    {
        
        $user = DB::table("users")
            ->where("id", $id_user)
            ->orderBy("id", "DESC")
            ->first();

        $data = [
            "title" => "Edit Pengguna Website",
            "user" => $user,
            "content" => "backend/user/edit",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site = DB::table("konfigurasi")->first();
        // PROSES HAPUS MULTIPLE
        if (isset($_POST["hapus"])) {
            $id_usernya = $request->id_user;
            for ($i = 0; $i < sizeof($id_usernya); $i++) {
                DB::table("users")
                    ->where("id", $id_usernya[$i])
                    ->delete();
            }
            return redirect("admin/user")->with([
                "sukses" => "Data telah dihapus",
            ]);
            // PROSES SETTING DRAFT
        }
    }

    // tambah
    public function tambah(Request $request)
    {
        
        request()->validate([
            "nama" => "required",
            "username" => "required|unique:users",
            "password" => "required",
            "email" => "required",
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
            $destinationPath = "./assets/upload/user/thumbs/";
            $img = Image::make($image->getRealPath(), [
                "width" => 150,
                "height" => 150,
                "grayscale" => false,
            ]);
            $img->save($destinationPath . "/" . $input["nama_file"]);
            $destinationPath = "./assets/upload/user/";
            $image->move($destinationPath, $input["nama_file"]);
            // END UPLOAD
            DB::table("users")->insert([
                "nama" => $request->nama,
                "email" => $request->email,
                "username" => $request->username,
                "password" => sha1($request->password),
                "akses_level" => $request->akses_level,
                "gambar" => $input["nama_file"],
            ]);
        } else {
            DB::table("users")->insert([
                "nama" => $request->nama,
                "email" => $request->email,
                "username" => $request->username,
                "password" => sha1($request->password),
                "akses_level" => $request->akses_level,
            ]);
        }
        return redirect("admin/user")->with([
            "sukses" => "Data telah ditambah",
        ]);
    }

    // edit
    public function proses_edit(Request $request)
    {
        
        request()->validate([
            "nama" => "required",
            "username" => "required",
            "password" => "required",
            "email" => "required",
            "gambar" => "file|image|mimes:jpeg,png,jpg|max:8024",
        ]);
        // UPLOAD START
        $image = $request->file("gambar");
        if (!empty($image)) {
            // UPLOAD START
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
            $destinationPath = "./assets/upload/user/thumbs/";
            $img = Image::make($image->getRealPath(), [
                "width" => 150,
                "height" => 150,
                "grayscale" => false,
            ]);
            $img->save($destinationPath . "/" . $input["nama_file"]);
            $destinationPath = "./assets/upload/user/";
            $image->move($destinationPath, $input["nama_file"]);
            // END UPLOAD
            $slug_user = Str::slug($request->nama, "-");
            DB::table("users")
                ->where("id", $request->id_user)
                ->update([
                    "nama" => $request->nama,
                    "email" => $request->email,
                    "username" => $request->username,
                    "password" => sha1($request->password),
                    "akses_level" => $request->akses_level,
                    "gambar" => $input["nama_file"],
                ]);
        } else {
            $slug_user = Str::slug($request->nama, "-");
            DB::table("users")
                ->where("id", $request->id_user)
                ->update([
                    "nama" => $request->nama,
                    "email" => $request->email,
                    "username" => $request->username,
                    "password" => sha1($request->password),
                    "akses_level" => $request->akses_level,
                ]);
        }
        return redirect("admin/user")->with([
            "sukses" => "Data telah diupdate",
        ]);
    }

    // Delete
    public function delete($id_user)
    {
        
        DB::table("users")
            ->where("id", $id_user)
            ->delete();
        return redirect("admin/user")->with(["sukses" => "Data telah dihapus"]);
    }
}
