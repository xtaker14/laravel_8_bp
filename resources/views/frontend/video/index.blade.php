@php
   $salt_id_video = env('SALT_BASE64_ID'); 
@endphp

<!--Inner Header Start-->
<section class="wf100 p80 inner-header">
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
            
         <?php foreach($videos as $video) { ?>
            <div class="col-md-6 col-sm-6">
               <div class="blog-post">
                  <a href="{{ asset('video/detail/'.base64_encode($video->id_video . $salt_id_video)) }}">
                     <div class="blog-thumb"> 
                        <div class="embed-responsive embed-responsive-16by9">
                           <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $video->video }}?rel=0" allowfullscreen></iframe>
                        </div>
                     </div>
                  </a>
                  <hr>
                  <div class="post-txt">
                     <h5>
                        <a href="{{ asset('video/detail/'.base64_encode($video->id_video . $salt_id_video)) }}">
                           <?php echo $video->judul ?>
                        </a>
                     </h5>
                  </div>
               </div>
            </div>
         <?php } ?>

          </div>
         <div class="gt-pagination">
            {{ $videos->links() }}
         </div>
      </div>
   </div>
</section>
<!--Blog End--> 