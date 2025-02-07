<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>CvCoders|{{ request()->routeIs('home') ? 'Dasboard' : 'Projects' }}</title>
    <meta name="description" content="Dashboard Stisla adalah platform yang membantu Anda dalam mengelola proyek dan tugas dengan lebih efektif.">
    <meta name="keywords" content="dashboard, stisla, project management, task management, source code, cvcoders">
    <meta name="author" content="Stisla Team">
    <meta name="robots" content="index, follow">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset('assets/modules/jqvmap/dist/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/weather-icon/css/weather-icons-wind.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/summernote/summernote-bs4.css')}}">
    @stack('css')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    {{-- <link rel="icon" href="{{asset('assets/img/favicon.png')}}" type="image/png"> --}}
    <link rel="shortcut icon" href="{{asset('assets/cvcoders/cvc-high-resolution-logo-black-transparent.png')}}" type="image/png">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>
