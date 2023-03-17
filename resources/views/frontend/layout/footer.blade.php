<?php 
use App\Models\Nav_model;
// Nav profil
$myprofil    = new Nav_model();
$nav_profilf  = $myprofil->nav_profil();
$nav_layananf = $myprofil->nav_layanan();
?>
<!--Footer Start-->
<footer class="h3footer wf100">
   <div class="container">
      <div class="row">
         <!--Footer Widget Start-->
         <div class="col-md-4 col-sm-6">
            <div class="footer-widget">
               <h3>{{ $config_site->namaweb }}</h3>
               <p>{{ $config_site->deskripsi }}</p>
               <hr style="border-top: solid thin #EEE;padding:0; margin: 5px 0;">
               <p><strong>Our office:</strong>
                  <?php echo nl2br($config_site->alamat) ?>
                  <br><strong>Phone:</strong> {{ $config_site->telepon }}
                  <br><strong>Fax:</strong> {{ $config_site->fax }}
                  <br><strong>Email:</strong> {{ $config_site->email }}
                  <br><strong>Website:</strong> {{ $config_site->website }}</p>
            </div>
         </div>
         <!--Footer Widget End--> 
         <!--Footer Widget Start-->
         <div class="col-md-5 col-sm-6">
            <div class="footer-widget">
               <h3>Layanan</h3>
               <ul class="lastest-products">
                  <?php foreach($nav_layananf as $nav_layananf) { ?>
                  <li><img src="{{ asset('assets/upload/image/thumbs/'.$nav_layananf->gambar) }}" alt="{{ $nav_layananf->judul_berita }}"> <strong><a href="{{ asset('layanan/'.$nav_layananf->slug_berita) }}">{{ $nav_layananf->judul_berita }}</a></strong> <span class="pdate"><i>Updated:</i> <?php echo tanggal('tanggal_id',$nav_layananf->tanggal_post) ?></span> </li>
                  <?php } ?>
               </ul>
            </div>
         </div>
         <!--Footer Widget End--> 
         <!--Footer Widget Start-->
         <div class="col-md-3 col-sm-12">
            <div class="footer-widget">
               <h3>Newsletter</h3>
               <div class="newsletter">
                  <form id="form_newsletter" action="{{ url('subscribers/proses') }}" method="post" accept-charset="utf-8">
                     {{ csrf_field() }}
                     <ul>
                        <li>
                           <input type="text" value="{{ old('inp_name'); }}" name="inp_name" placeholder="Your Name">
                           @if ($errors->has('inp_name'))
                              <span class="text-danger">{{ $errors->first('inp_name') }}</span>
                           @endif 
                        </li>
                        <li>
                           <input type="text" value="{{ old('inp_email'); }}" name="inp_email" placeholder="Your Email">
                           @if ($errors->has('inp_email'))
                              <span class="text-danger">{{ $errors->first('inp_email') }}</span>
                           @endif 
                        </li>
                        <li>
                           <input type="submit" value="Subscribe Now">
                        </li>
                     </ul>
                  </form>
               </div>
               <div class="footer-social">
                  <a href="#"><i class="fab fa-facebook-f"></i></a> 
                  <a href="#"><i class="fab fa-twitter"></i></a> 
                  <a href="#"><i class="fab fa-linkedin-in"></i></a> 
                  <a href="#"><i class="fab fa-instagram"></i></a> 
                  {{-- <a href="#"><i class="fab fa-youtube"></i></a>  --}}
               </div>
            </div>
         </div>
         <!--Footer Widget End--> 
      </div>
      {{-- <div class="row footer-copyr">
         <div class="col-md-4 col-sm-4"> <img src="{{ asset('assets/upload/image/'.$config_site->logo) }}" alt="" style="max-height: 50px; width: auto;"> </div>
         <div class="col-md-8 col-sm-8">
               <p><a target="_blank" href="javascript:;">{{ $config_site->namaweb }}</a></p>
            </div>
      </div> --}}
   </div>
</footer>
<!--Footer End--> 
</div>
<!--   JS Files Start  --> 
<script src="{{ asset('assets/aws/js/jquery-3.3.1.min.js') }}"></script> 
<script src="{{ asset('assets/aws/js/jquery-migrate-1.4.1.min.js') }}"></script> 
<script src="{{ asset('assets/aws/js/popper.min.js') }}"></script> 
<script src="{{ asset('assets/aws/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('assets/sweetalert/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/aws/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('assets/aws/js/jquery.prettyPhoto.js') }}"></script> 
<script src="{{ asset('assets/aws/js/isotope.min.js') }}"></script> 
<script src="{{ asset('assets/aws/js/slick.min.js') }}"></script> 
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('assets/aws/js/custom.js') }}"></script>
<script>
   $(function(){
      AOS.init({
         once: true
      });
   });
</script>
@stack('frontend-after-scripts')

@if ($errors->has('inp_name') || $errors->has('inp_email'))
   <script>
      $(function(){
         $('html, body').animate({
            scrollTop: $("#form_newsletter").offset().top
         }, 2000);
      });
   </script>
@endif

@if(session()->get('flash_sukses_subscribe'))
   <script>
      $(function(){
         swal({
            title: "{{ session()->get('flash_sukses_subscribe') }}",
            type: "info",
            showCancelButton: false,
            confirmButtonClass: 'btn btn-success',
            buttonsStyling: false,
            confirmButtonText: "OK",
            closeOnConfirm: true,
            showLoaderOnConfirm: true,
         },
            function (isConfirm) {
               if (isConfirm) {
                  return true;
               }
               return false;
            });
      });
   </script>
@endif 

@if(session()->get('flash_sukses_kontak'))
   <script>
      $(function(){
         swal({
            title: "{{ session()->get('flash_sukses_kontak') }}",
            type: "info",
            showCancelButton: false,
            confirmButtonClass: 'btn btn-success',
            buttonsStyling: false,
            confirmButtonText: "OK",
            closeOnConfirm: true,
            showLoaderOnConfirm: true,
         },
            function (isConfirm) {
               if (isConfirm) {
                  return true;
               }
               return false;
            });
      });
   </script>
@endif 

</body>
</html>