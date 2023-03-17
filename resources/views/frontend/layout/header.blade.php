@php
   // $no_wa = '6281211122050';
   $no_wa = str_replace('+','',$config_site->hp);
@endphp
<div id="parent_chat_wa">
   <a href="https://api.whatsapp.com/send?phone={{$no_wa}}&text=%23PerluBantuan%20Halo%2C%20" target="_blank" class="btn_whatsapp">
      <img src="{{ asset('assets/aws/images/whatsapp.gif') }}" alt="Whatsapp">
      <div class="div_txt_whatsapp">
         <span>Hubungi Kami</span>
         <span class="span_txt_whatsapp">Customer Service</span>
      </div>
   </a>
</div>

<div class="wrapper home3">
   <!--Header Start-->
   <header class="header-style-3 wf100">
      <div class="topbar">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <p><i class="fas fa-map-marker-alt"></i> Selamat datang di {{ $config_site->namaweb }}</p>
               </div>
               <div class="col-md-6">
                  <ul class="topbar-social">
                     <li class="social-links"> 
                        <a href="{{ $config_site->twitter }}"><i class="fab fa-twitter"></i></a> 
                        <a href="{{ $config_site->facebook }}"><i class="fab fa-facebook"></i></a> 
                        <a href="{{ $config_site->instagram }}"><i class="fab fa-instagram"></i></a> 
                     </li>
                     <li> <a class="acclink" href="javascript:;">INDONESIA</a> </li>                     
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div class="h3-logo-row">
         <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-12">
                  <div class="logo">
                     <a href="{{ asset('/') }}"><img src="{{ asset('assets/upload/image/'.$config_site->logo) }}" alt="{{ $config_site->namaweb }}" style="max-height: 80px; width: auto;"></a>
                  </div>
               </div>
               
               <div class="col-md-6 col-sm-12">
                  {{-- <ul class="header-contact">
                     <li><i class="fas fa-phone"></i> {{ $config_site->telepon }}</li>
                     <li><i class="fas fa-envelope"></i> {{ $config_site->email }}</li>
                  </ul> --}}
                  
                  {{-- <form class="search-form">
                     <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                     <button class="sbtn" type="submit"><i class="fas fa-search"></i></button>
                  </form>  --}}
                  
                  <div class="home_parent_search">
                     <input type="text" name="email" placeholder="Search" id="input_search">
                     <a class="btn btn-info" href="javascript:;" id="btn_search"><i class="fas fa-search"></i></a>
                     <form action="" id="form_search"></form>
                  </div>
               </div>
            </div>
         </div>
      </div><div class="navrow">
<div class="container">