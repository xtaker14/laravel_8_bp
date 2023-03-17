<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use App\Models\Video_model;

class Video extends Controller
{
    // Main page
    public function index()
    {
        Paginator::useBootstrap();
        $video = DB::table("video")
            ->select("*")
            ->orderBy("id_video", "DESC")
            ->paginate(10);
        $site = $this->getConfigSite();

        $data = [
            "title" => "Video and Webinar " . $site->namaweb,
            "deskripsi" => "Video and Webinar " . $site->namaweb,
            "keywords" => "Video and Webinar " . $site->namaweb,
            "videos" => $video,
            "content" => "frontend/video/index",
        ];
        return view("frontend/layout/wrapper", $data);
    }

    // detail
    public function detail($id_video)
    {
        $dc_id_raw = base64_decode($id_video);
        $dc_id_video = preg_replace(sprintf('/%s/', env('SALT_BASE64_ID')), '', $dc_id_raw);

        $video = DB::table("video")
            // ->join(
            //     "kategori_video",
            //     "kategori_video.id_kategori_video",
            //     "=",
            //     "video.id_kategori_video",
            //     "LEFT"
            // )
            // ->select("video.*", "kategori_video.nama_kategori_video")
            ->select("video.*")
            ->where("video.id_video", $dc_id_video)
            ->orderBy("video.id_video", "DESC")
            ->first();

        if(!$video){
            abort(404);
        }

        $hits = $video->hits + 1;
        DB::table("video")
            ->where("id_video", $video->id_video)
            ->update([
                "hits" => $hits,
            ]);
        $data = [
            "title" => $video->judul,
            "deskripsi" => $video->judul,
            "keywords" => $video->judul,
            "video" => $video,
            "content" => "frontend/video/detail",
        ];
        return view("frontend/layout/wrapper", $data);
    } 
}
