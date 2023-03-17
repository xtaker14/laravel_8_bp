<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>{{ $title }}</title>
<meta name="description" content="{{ $deskripsi }}">
<meta name="keywords" content="{{ $keywords }}">
<meta name="author" content="{{ $config_site->namaweb }}">
<!-- icon -->
<link rel="shortcut icon" href="{{ asset('assets/upload/image/'.$config_site->icon) }}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
<!-- CSS FILES START -->
<style>
    :root {
        /* --- main search --- */
        --main_search_btn_bgcolor: #2a579a;

        /* --- home button play video --- */
        --video_img_btn_bgcolor: #2a579a;

        /* --- slider --- */
        --slider_border_radius: 0px;
        --slider_color: #00546B;
        --slider_font_family: 'Roboto Condensed', sans-serif;
        --slider_bgcolor: #fff;
        --slider_border: 0px;

        /* --- layanan --- */
        --layanan_btn_color: #20b1aa;
        --layanan_btn_border_color: #c8e6c9;

        /* --- statistic --- */
        --statistic_bgcolor: rgba(42, 87, 154, 0.1);
        --statistic_title_separator: #2a579a;

        /* --- download --- */
        --download_dot_bgcolor: #2a579a;

        /* --- one --- */
        /* --one_bgcolor: #66bb6a;
        --one_color: #fff;
        --one_border: 1px solid transparent;
        --one_border_color: #17a2b8; 
        --one_border_radius: .3rem;
        */

        --one_bgcolor: transparent;
        --one_color: #2a579a;
        --one_border: 1px solid transparent;
        --one_border_color: #2a579a;
        --one_border_radius: 0rem;
        --one_section_title_color: #2a579a;
        --one_subtitle_color: #2a579a;
        --one_icon_calendar_color: #3568a9;

        /* --- two --- */
        --two_color: #2a579a;
        
        /* --- three --- */
        --three_border_color: #2a579a;
    }
</style>
<link href="{{ asset('assets/aws/css/custom.css') }}" rel="stylesheet">
<link href="{{ asset('assets/aws/css/color.css') }}" rel="stylesheet">
<link href="{{ asset('assets/aws/css/responsive.css') }}" rel="stylesheet">
<link href="{{ asset('assets/aws/css/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/aws/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/sweetalert/css/sweetalert.css') }}">
<link href="{{ asset('assets/aws/css/prettyPhoto.css') }}" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link href="{{ asset('assets/aws/css/all.min.css') }}" rel="stylesheet">
<?php echo $config_site->metatext ?>
<style>

</style>
@stack('frontend-after-style')
</head>

<body>