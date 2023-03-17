@php
   use \Illuminate\Support\Str;
   $salt_id_video = env('SALT_BASE64_ID'); 
@endphp

@push('frontend-after-scripts')
   <script>
      $(document).ready(function(){
         var $w = window;
         var $window = $(window);
         
         $window.on('scroll.scroll_statistic_counter', function(){
            if (
               $window.scrollTop() >= 
               $('.statistic_counter').offset().top + $('.statistic_counter').outerHeight() - window.innerHeight
            ) {
               statisticCounter();
               $window.off('scroll.scroll_statistic_counter');
            }
         });

         function statisticCounter(){
            $('.statistic_counter .counter').each(function () {
               $(this)
                  .prop("Counter", 0)
                  .animate({
                     Counter: $(this).text(),
                  },
                  {
                     duration: 3000,
                     easing: "swing",
                     step: function (cntr_now) {
                        cntr_now = Number(Math.ceil(cntr_now)).toLocaleString('en');
                        cntr_now = cntr_now.replace(/\./, ','); // fraction
                        cntr_now = cntr_now.replace(/,/g, '.'); // separator

                        $(this).text(cntr_now);
                     },
                  });
            });
         }
      });
   </script>
@endpush

<!--Slider Start-->
<section id="home-slider" class="owl-carousel owl-theme wf100">
    <?php foreach($slider as $slider) { ?>
    <div class="item">
        <div class="slider-caption h3slider">
            <div class="container">
                <?php if($slider->status_text=="Ya") { ?>
                <strong>{{ strip_tags($slider->isi) }}</strong>
                <h1>{{ $slider->judul_galeri }}</h1>
                <a href="{{ $slider->website }}">Baca detail</a>
                <?php } ?>
            </div>
        </div>
        <img src="{{ asset('assets/upload/image/' . $slider->gambar) }}" alt="">
    </div>
    <?php } ?>
</section>
<!--Slider End-->
<!--Service Area Start-->
<section class="donation-join wf100">
    <div class="container text-center">
        <div class="row">
            <?php 
            $cntr_aos = 0;
            foreach($layanan as $layanan) { 
            ?>
            <div class="col-md-4 col-sm-12" data-aos="fade-right" data-aos-delay="{{ 200*$cntr_aos; }}">
                <br>
                <img src="{{ asset('assets/upload/image/thumbs/' . $layanan->gambar) }}"
                    alt="{{ $layanan->judul_berita }}" class="img img-thumbnail img-fluid">
                <div class="volbox">
                    <h6>{{ $layanan->judul_berita }}</h6>
                    <p>{{ $layanan->keywords }}</p>
                    <a href="{{ asset('layanan/' . $layanan->slug_berita) }}">Lihat detail</a>
                </div>
            </div>
            <!--box  end-->
            <?php 
               $cntr_aos++;
               } 
            ?>

        </div>
    </div>
</section>
<!--Service Area End-->
<section class="wf100 about">
   <!--About Txt Video Start-->
   <div class="about-video-section wf100">
      <div class="container">
            <div class="row">
               <div class="col-lg-7" data-aos="fade-right" data-aos-delay="0">
                  <div class="about-text">
                        <h5>TENTANG KAMI</h5>
                        <h2>{{ $config_site->nama_singkat }}</h2>
                        <?php echo $config_site->tentang; ?>

                        <a href="{{ asset('kontak') }}" class="btn btn-info btn-lg">Kontak Kami</a>
                  </div>
               </div>
               <div class="col-lg-5" data-aos="fade-right" data-aos-delay="200">
                  <a href="#"><img src="{{ asset('assets/upload/image/' . $config_site->gambar) }}"
                           alt="{{ $config_site->nama_singkat }}" class="img img-fluid img-thumbnail">
                  </a>
               </div>
            </div>
      </div>
   </div>

   <!--Blog Start-->
   <section class="h2-news wf100 p80 blog">
      <div class="blog-grid">
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                        <div class="section-title-2">
                           <h5>Baca update kami</h5>
                           <h2>Berita & Updates</h2>
                        </div>
                  </div>
                  <div class="col-md-6"> <a href="{{ asset('berita') }}" class="view-more">Lihat berita lainnya</a>
                  </div>
                  <div class="col-md-12">
                        <hr>
                  </div>
               </div>
               <div class="row"
                  style="background-color: white; padding-top: 20px; padding-bottom: 20px; border-radius: 5px;">
                  <?php 
                  $cntr_aos = 0;
                  foreach($berita as $berita) { 
                  ?>
                  <!--Blog Small Post Start-->
                  <div class="col-md-4 col-sm-6" data-aos="fade-right" data-aos-delay="{{ 200*$cntr_aos; }}">
                        <div class="blog-post">
                           <div class="blog-thumb"> <a href="{{ asset('berita/read/' . $berita->slug_berita) }}"><i
                                       class="fas fa-link"></i></a> <img
                                    src="{{ asset('assets/upload/image/thumbs/' . $berita->gambar) }}"
                                    alt="><?php echo $berita->judul_berita; ?>"> </div>
                           <div class="post-txt">
                              <h5><a href="{{ asset('berita/read/' . $berita->slug_berita) }}"><?php echo $berita->judul_berita; ?></a>
                              </h5>
                              <ul class="post-meta">
                                    <li> 
                                       <a href="{{ asset('berita/read/' . $berita->slug_berita) }}">
                                          <i class="fas fa-calendar-alt"></i>
                                          {{ tanggal('hari', $berita->tanggal_post) }}
                                       </a> 
                                    </li>
                                    <li> 
                                       <a href="{{ asset('berita/kategori/' . $berita->slug_berita) }}">
                                          <i class="fas fa-sitemap"></i> 
                                          {{ $berita->nama_kategori }}
                                       </a> 
                                    </li>
                              </ul>
                              <p><?php echo Str::limit(strip_tags($berita->isi), 100, $end = '...'); ?></p>
                              <a href="{{ asset('berita/read/' . $berita->slug_berita) }}" class="read-post">Baca
                                    detail</a>
                           </div>
                        </div>
                  </div>
                  <!--Blog Small Post End-->
                  <?php 
                     $cntr_aos++;
                     } 
                  ?>
               </div>

            </div>
      </div>
   </section>
   <!--Blog End-->
   
   <!--About Txt Video End-->
   <!--About Section Start-->
   <section class="home2-about wf100 p100 gallery"
      style="background: url({{ asset('assets/aws/images/mappatt.jpg') }}) no-repeat; background-size: cover;">
      <div class="container">
            <div class="row">
               <div class="col-md-5" data-aos="fade-up" data-aos-delay="0">
                  <div class="video-img"> <a href="https://youtu.be/{{ $video->video }}" data-rel="prettyPhoto"
                           title="{{ $video->judul }}"><i class="fas fa-play"></i></a> <img
                           src="{{ asset('assets/upload/image/' . $video->gambar) }}" alt=""> </div>
               </div>
               <div class="col-md-7" data-aos="fade-left" data-aos-delay="200">
                  <div class="h2-about-txt">
                        <h3>Webinar</h3>
                        <h2>{{ $video->judul }}</h2>
                        <p><?php echo strip_tags($video->keterangan); ?></p>
                        <a class="aboutus" href="{{ asset('video/detail/'.base64_encode($video->id_video . $salt_id_video)) }}">Lihat Detail</a>
                  </div>
               </div>
            </div>
      </div>

   </section>
   <!--About Section End-->

   <section class="h2-news wf100 p80">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <div class="section-title-2">
                  <h5>Baca update kami</h5>
                  <h2>Agenda & Events</h2>
               </div>
            </div>
            <div class="col-md-6"> <a href="{{ asset('agenda') }}" class="view-more">Lihat agenda lainnya</a> </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="blog-post-large" data-aos="fade-right" data-aos-delay="0">
                  <div class="post-thumb"> 
                     <a href="#"><i class="fas fa-link"></i></a> 
                     <img src="{{ asset('assets/upload/image/thumbs/' . $main_agenda_event->gambar); }}" alt="">
                  </div>
                  <div class="post-txt">
                     <ul class="post-meta">
                        <li><i class="fas fa-calendar-alt"></i> {{ tanggal('hari',$main_agenda_event->tanggal_post) }}</li>
                        {{-- <li><i class="fas fa-comments"></i> 0 Comments</li> --}}
                     </ul>
                     <h5><a href="#">{{ $main_agenda_event->judul_agenda; }}</a></h5>
                     <p style="color: #fff;">
                        {{ Str::limit(strip_tags($main_agenda_event->isi), 100, $end = '...'); }}
                     </p>
                  </div>
               </div>
            </div>

            <div class="col-md-6">
               @php
                  $cntr_aos=0;
               @endphp
               @foreach ($all_agenda_event as $item)
                  <!--Blog Small Post Start-->
                  <div class="blog-small-post" data-aos="fade-up" data-aos-delay="{{ 200*$cntr_aos; }}">
                     <div class="post-thumb"> <a href="#">
                        <i class="fas fa-link"></i></a> <img src="{{ asset('assets/upload/image/thumbs/' . $item->gambar); }}" alt=""> 
                     </div>
                     <div class="post-txt">
                        <span class="pdate"> <i class="fas fa-calendar-alt"></i>  {{ tanggal('hari',$item->tanggal_post) }}</span>
                        <h5><a href="#">{{ $item->judul_agenda; }}</a></h5>
                        <p style="color: #999999;">
                           {{ Str::limit(strip_tags($item->isi), 100, $end = '...'); }}
                        </p>
                        <a href="#" class="rm">Baca detail</a> 
                     </div>
                  </div>
                  <!--Blog Small Post End--> 
               @php
                  $cntr_aos++;
               @endphp
               @endforeach 
            </div>
         </div>
      </div>
   </section> 

   <section class="our-core-projects wf100 p80 statistic_data" style="background-image: url('{{ asset('assets/upload/image/'.$statistic_img->gambar) }}');">
      <div class="statistic_data_color"></div>
      <div class="container-fluid">
         <div class="container text-center">
            <div class="title">
               <span class="subtitle">Statistik Data</span>
               <h3>Perkembangan</h3>
               <div class="title-separator"></div>
            </div>
            <!-- title -->
            <div class="row" style="justify-content: center;">
               @php
                  $cntr_aos=0;
               @endphp
               @foreach ($statistik_data as $idx => $val)
                  <div class="col-md-3 col-sm-6 statistic_counter" data-aos="fade-left" data-aos-delay="{{ 200*$cntr_aos; }}">
                     <div class="data-wrapper">
                        <h5 class="title-data">{{ $val->title; }}</h5>
                        <div class="info-data">
                           <h1 class="counter">{{ $val->value; }}</h1>
                           <span>{{ $val->subtitle; }}</span>
                        </div>
                     </div>
                     <!-- data-wrapper -->
                  </div>
               @php
                  $cntr_aos++;
               @endphp
               @endforeach 
            </div>
            <!-- row -->
         </div>
      </div>
   </section>

   <!--Testimonials Start-->
   <section class="testimonials-section bg-white wf100 p80">
      <div class="container">
         <div class="row">
               <div class="col-md-12">
                  <div class="section-title-2 text-center">
                     <h2>Download</h2>
                  </div>
                  <div id="testimonials" class="owl-carousel owl-theme">
                     <?php 
            $kategori_download = DB::table('kategori_download')
                  ->orderBy('kategori_download.urutan','ASC')
                  ->get();
            foreach($kategori_download as $kategori_download) {
            ?>
                     <!--testimonials box start-->
                     <div class="item">
                           <h4><?php echo $kategori_download->nama_kategori_download; ?></h4>
                           <hr>
                           <?php echo Str::limit(strip_tags($kategori_download->keterangan), 100, $end = '...'); ?>
                           <div class="tuser">
                              <a href="{{ asset('download/kategori/' . $kategori_download->slug_kategori_download) }}"
                                 class="btn btn-success"><i class="fa fa-laptop"></i> Lihat Detail</a>
                           </div>
                     </div>
                     <!--testimonials box End-->
                     <?php } ?>
                  </div>
               </div>
         </div>
      </div>
   </section>
    <!--Testimonials End-->

