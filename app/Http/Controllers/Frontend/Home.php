<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Berita_model;
use App\Models\Agenda_model;
use App\Models\Statistik_data_model;
use App\Models\Heading_model;

class Home extends Controller
{
    // Homepage
    public function index()
    {
        $site_config = $this->getConfigSite();
        $video = DB::table('video')
            ->where('posisi', 'Homepage')
            ->orderBy('urutan', 'ASC')
            ->orderBy('id_video', 'DESC')
            ->first();
        $slider = DB::table('galeri')
            ->where('jenis_galeri', 'Homepage')
            ->limit(5)
            ->orderBy('urutan', 'ASC')
            ->orderBy('id_galeri', 'DESC')
            ->get();
        $layanan = DB::table('berita')
            ->where(['jenis_berita' => 'Layanan', 'status_berita' => 'Publish'])
            ->limit(3)
            ->orderBy('urutan', 'ASC')
            ->get();
        $news = new Berita_model();
        $berita = $news->home();
        $model_agenda_event = new Agenda_model();
        $main_agenda_event = $model_agenda_event
            // ->where('jenis_agenda', 'Agenda')
            ->whereIn('jenis_agenda', ['Agenda', 'Event'])
            ->where('status_agenda', 'Publish')
            ->orderBy('urutan', 'ASC')
            ->orderBy('id_agenda', 'DESC')
            ->limit(1)
            ->first();
        $all_agenda_event = $model_agenda_event
            // ->where('jenis_agenda', 'Agenda')
            ->whereIn('jenis_agenda', ['Agenda', 'Event'])
            ->where('status_agenda', 'Publish')
            ->orderBy('urutan', 'ASC')
            ->orderBy('id_agenda', 'DESC')
            ->offset(1)
            ->limit(2)
            ->get();
        $model_statistik_data = new Statistik_data_model();
        $statistik_data = $model_statistik_data
            ->orderBy('urutan', 'ASC')
            ->orderBy('id', 'DESC')
            ->get();
        $statistic_img = Heading_model::where('halaman','Statistic')
            ->orderBy('id_heading','DESC')->first();
        // dd($statistik_data);

        $data = [
            'title' => $site_config->namaweb . ' - ' . $site_config->tagline, 
            'deskripsi' => $site_config->namaweb . ' - ' . $site_config->tagline, 
            'keywords' => $site_config->namaweb . ' - ' . $site_config->tagline, 
            'slider' => $slider, 
            'berita' => $berita, 
            'beritas' => $berita, 
            'layanan' => $layanan, 
            'video' => $video, 
            'main_agenda_event' => $main_agenda_event, 
            'all_agenda_event' => $all_agenda_event, 
            'statistik_data' => $statistik_data, 
            'statistic_img' => $statistic_img, 
            'content' => 'frontend/home/index'
        ];

        return view('frontend/layout/wrapper', $data);
    }

    // Homepage
    public function tentang_kami()
    {
        $site_config = $this->getConfigSite();
        $news = new Berita_model();
        $berita = $news->home();
        // Staff
        $kategori_staff = DB::table('kategori_staff')
            ->orderBy('urutan', 'ASC')
            ->get();
        $layanan = DB::table('berita')
            ->where(['jenis_berita' => 'Layanan', 'status_berita' => 'Publish'])
            ->orderBy('urutan', 'ASC')
            ->get();

        $data = ['title' => 'Tentang ' . $site_config->namaweb, 'deskripsi' => 'Tentang ' . $site_config->namaweb, 'keywords' => 'Tentang ' . $site_config->namaweb, 'berita' => $berita, 'layanan' => $layanan, 'kategori_staff' => $kategori_staff, 'content' => 'frontend/home/tentang_kami'];
        return view('frontend/layout/wrapper', $data);
    } 
}
