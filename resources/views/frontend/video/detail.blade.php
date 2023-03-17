<?php 
$bg   = DB::table('heading')->where('halaman','Dokumen')->orderBy('id_heading','DESC')->first();
 ?>
<!--Inner Header Start-->
<section class="wf100 p80 inner-header" style="background-image: url('{{ asset('assets/upload/image/'.$bg->gambar) }}'); background-position: bottom center;">
   <div class="container">
      <h1>{{ $title }}</h1>
   </div>
</section>
<!--Inner Header End--> 
<!--About Start-->
<section class="wf100 about">
<!--About Txt Video Start-->
<div class="about-video-section wf100">
   <div class="container">
      <div class="row">
         <div class="col-lg-8">
            <div class="about-text text-aws">
            <style type="text/css" media="screen">
                              .text-aws img {
                                 width: auto;
                                 max-width: 100%;
                                 height: auto;
                              }
                           </style>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $video->video }}?rel=0" allowfullscreen></iframe>
                </div>            
               <?php echo $video->keterangan; ?>
            </div>
         </div>
         <div class="col-lg-4">
            <a href="#"><img src="{{ asset('assets/upload/image/'.$video->gambar) }}" alt="{{ $title }}" class="img img-fluid img-thumbnail"></a>
         </div>
         
         
      </div>
   </div>
</div>
</section>
<!--About Txt Video End--> 



