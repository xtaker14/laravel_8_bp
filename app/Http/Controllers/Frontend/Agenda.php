<?php
namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Agenda_model;
Paginator::useBootstrap();

class Agenda extends Controller
{
 
    // Agendapage
    public function index()
    {
        Paginator::useBootstrap();
    	// $site 	= $this->getConfigSite();
    	$model 	= new Agenda_model();
		$agenda = $model->listing();

        $data = array(  'title'     => 'Agenda & Events',
                        'deskripsi' => 'Agenda & Events',
                        'keywords'  => 'Agenda & Events', 
                        'agenda'	=> $agenda,
                        'agendas'    => $agenda,
                        'content'   => 'frontend/agenda/index'
                    );
        return view('frontend/layout/wrapper',$data);
    }

    // Agendapage
    public function kategori($slug_kategori)
    {
        Paginator::useBootstrap();
        $site       = $this->getConfigSite();
    	$model 	= new Agenda_model();
        // $kategori   = DB::table('kategori_agenda')->where('slug_kategori_agenda',$slug_kategori)->first();
        $kategori   = $model->where('jenis_agenda',$slug_kategori)->first();
        if(!$kategori)
        {
            return redirect('agenda');
        }
        $model      = new Agenda_model();
        $agenda     = $model->jenis_agenda($slug_kategori);


        $data = array(  'title'     => ucwords($slug_kategori),
                        'deskripsi' => ucwords($slug_kategori),
                        'keywords'  => ucwords($slug_kategori), 
                        'agenda'    => $agenda,
                        'agendas'    => $agenda,
                        'content'   => 'frontend/agenda/index'
                    );
        return view('frontend/layout/wrapper',$data);
    } 

    // kontak
    public function read($slug_agenda)
    {
        Paginator::useBootstrap();
        $site   = $this->getConfigSite();
        $slider = DB::table('galeri')->where('jenis_galeri','Agendapage')->orderBy('id_galeri', 'DESC')->first();
        // $agenda = DB::table('agenda')->where('status_agenda','Publish')->orderBy('id_agenda', 'DESC')->get();
        $model  = new Agenda_model();
        $read   = $model->read($slug_agenda);
        if(!$read)
        {
            return redirect('agenda');
        }

        $data = array(  'title'     => $read->judul_agenda,
                        'deskripsi' => $read->judul_agenda,
                        'keywords'  => $read->judul_agenda,
                        'slider'    => $slider, 
                        'read'      => $read,
                        'content'   => 'frontend/agenda/read'
                    );
        return view('frontend/layout/wrapper',$data);
    }
}