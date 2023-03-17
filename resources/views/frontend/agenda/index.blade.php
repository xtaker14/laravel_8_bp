<?php 
$bg   = DB::table('heading')->where('halaman','Agenda')->orderBy('id_heading','DESC')->first();
 ?>
<!--Inner Header Start-->
<section class="wf100 p80 inner-header" style="background-image: url('{{ asset('assets/upload/image/'.$bg->gambar) }}'); background-position: bottom center;">
   <div class="container">
      <h1>{{ $title }}</h1>
   </div>
</section>
<!--Inner Header End--> 
<!--Blog Start-->
<section class="wf100 p80 blog">
   <div class="blog-grid">
      <div class="container">
         <div class="row">
            <?php foreach($agenda as $agenda) { ?>
            <!--Blog Small Post Start-->
            <div class="col-md-6 col-sm-12">
               <div class="blog-post">
                  <div class="blog-thumb"> <a href="{{ asset('agenda/read/'.$agenda->slug_agenda) }}"><i class="fas fa-link"></i></a> <img src="{{ asset('assets/upload/image/thumbs/'.$agenda->gambar) }}" alt="><?php  echo $agenda->judul_agenda ?>"> </div>
                  <div class="post-txt">
                     <h5><a href="{{ asset('agenda/read/'.$agenda->slug_agenda) }}"><?php  echo $agenda->judul_agenda ?></a></h5>
                     <ul class="post-meta">
                        <li> <a href="{{ asset('agenda/read/'.$agenda->slug_agenda) }}"><i class="fas fa-calendar-alt"></i> {{ tanggal('hari',$agenda->tanggal_post)}}</a> </li>
                        <li> <a href="{{ asset('agenda/read/'.$agenda->slug_agenda) }}"><i class="fas fa-comments"></i> {{ $agenda->nama_kategori_agenda }}</a> </li>
                     </ul>
                     <p><?php echo \Illuminate\Support\Str::limit(strip_tags($agenda->isi), 100, $end='...') ?></p>
                     <a href="{{ asset('agenda/read/'.$agenda->slug_agenda) }}" class="read-post">Baca detail</a>
                  </div>
               </div>
            </div>
            <!--Blog Small Post End--> 
            <?php } ?>
         </div>
         <div class="gt-pagination">
            {{ $agendas->links() }}
         </div>
      </div>
   </div>
</section>
<!--Blog End--> 