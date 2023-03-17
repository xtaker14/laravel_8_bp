<?php 
$bg   = DB::table('heading')->where('halaman','Kontak')->orderBy('id_heading','DESC')->first();
 ?>
<!--Inner Header Start-->
<section class="wf100 p80 inner-header" style="background-image: url('{{ asset('assets/upload/image/'.$bg->gambar) }}'); background-position: bottom center;">
   <div class="container">
      <h1>{{ $title }}</h1>
   </div>
</section>
<!--Inner Header End--> 
<!--Contact Start-->
<section class="contact-page wf100 p50">
   <div class="container contact-info">
      <div class="row">
         <!--Contact Info Start-->
         <div class="col-md-6">
            <div class="c-info">
               <h6><i class="fa fa-home"></i> Alamat:</h6>
               <p>
                <strong><?php echo $config_site->namaweb ?></strong>
                <br><?php echo nl2br($config_site->alamat) ?>
              </p>
            </div>
         </div>
         <!--Contact Info End--> 
         <!--Contact Info Start-->
         <div class="col-md-6">
            <div class="c-info">
               <h6>Kontak:</h6>
               <p>
                  <i class="fa fa-phone"></i> Telepon: <?php echo $config_site->telepon ?>
                  <br><i class="fa fa-envelope"></i> Email: <?php echo $config_site->email ?>
                  <br><i class="fa fa-link"></i> Website: <a target="__BLANK" href="<?php echo $config_site->website ?>"><?php echo $config_site->website ?></a>
               </p>
            </div>
         </div>
         <!--Contact Info End--> 
         
      </div>
      <br><br>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <div class="contact-form">
               <form id="form_newsletter" action="{{ url('kontak/send_email') }}" method="post" accept-charset="utf-8">
                  {{ csrf_field() }}
                  <ul class="cform">
                     <li class="half pr-15">
                        <input type="text" name="inp_full_name" value="{{ old('inp_full_name'); }}" class="form-control" placeholder="Full Name">
                        @if ($errors->has('inp_full_name'))
                           <span class="text-danger">{{ $errors->first('inp_full_name') }}</span>
                        @endif 
                     </li>
                     <li class="half pl-15">
                        <input type="text" name="inp_email" value="{{ old('inp_email'); }}" class="form-control" placeholder="Email">
                        @if ($errors->has('inp_email'))
                           <span class="text-danger">{{ $errors->first('inp_email') }}</span>
                        @endif 
                     </li>
                     <li class="half pr-15">
                        <input type="text" name="inp_contact" value="{{ old('inp_contact'); }}" class="form-control" placeholder="Contact">
                        @if ($errors->has('inp_contact'))
                           <span class="text-danger">{{ $errors->first('inp_contact') }}</span>
                        @endif 
                     </li>
                     <li class="half pl-15">
                        <input type="text" name="inp_subject" value="{{ old('inp_subject'); }}" class="form-control" placeholder="Subject">
                        @if ($errors->has('inp_subject'))
                           <span class="text-danger">{{ $errors->first('inp_subject') }}</span>
                        @endif 
                     </li>
                     <li class="full">
                        <textarea name="txt_content_email" value="{{ old('txt_content_email'); }}" class="textarea-control" placeholder="Message">{{ old('txt_content_email'); }}</textarea>
                        @if ($errors->has('txt_content_email'))
                           <span class="text-danger">{{ $errors->first('txt_content_email') }}</span>
                        @endif 
                     </li>
                     <li class="full">
                        <input type="submit" name="submit" value="Contact us" class="btn btn-info btn-lg btn-block">
                     </li>
                  </ul>
               </form>
            </div>
         </div>
         <div class="col-md-6">
            <div class="google-map">
               <?php echo $config_site->google_map ?>
            </div>
         </div>
      </div>
   </div>
   <br><br>
</section>
<!--Contact End--> 