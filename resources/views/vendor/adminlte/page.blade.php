@extends('adminlte::master')
  



@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body',
    (config('adminlte.sidebar_mini', true) === true ?
        'sidebar-mini ' :
        (config('adminlte.sidebar_mini', true) == 'md' ?
         'sidebar-mini sidebar-mini-md ' : '')
    ) .
    (config('adminlte.layout_topnav') || View::getSection('layout_topnav') ? 'layout-top-nav ' : '') .
    (config('adminlte.layout_boxed') ? 'layout-boxed ' : '') .
    (!config('adminlte.layout_topnav') && !View::getSection('layout_topnav') ?
        (config('adminlte.layout_fixed_sidebar') ? 'layout-fixed ' : '') .
        (config('adminlte.layout_fixed_navbar') === true ?
            'layout-navbar-fixed ' :
            (isset(config('adminlte.layout_fixed_navbar')['xs']) ? (config('adminlte.layout_fixed_navbar')['xs'] == true ? 'layout-navbar-fixed ' : 'layout-navbar-not-fixed ') : '') .
            (isset(config('adminlte.layout_fixed_navbar')['sm']) ? (config('adminlte.layout_fixed_navbar')['sm'] == true ? 'layout-sm-navbar-fixed ' : 'layout-sm-navbar-not-fixed ') : '') .
            (isset(config('adminlte.layout_fixed_navbar')['md']) ? (config('adminlte.layout_fixed_navbar')['md'] == true ? 'layout-md-navbar-fixed ' : 'layout-md-navbar-not-fixed ') : '') .
            (isset(config('adminlte.layout_fixed_navbar')['lg']) ? (config('adminlte.layout_fixed_navbar')['lg'] == true ? 'layout-lg-navbar-fixed ' : 'layout-lg-navbar-not-fixed ') : '') .
            (isset(config('adminlte.layout_fixed_navbar')['xl']) ? (config('adminlte.layout_fixed_navbar')['xl'] == true ? 'layout-xl-navbar-fixed ' : 'layout-xl-navbar-not-fixed ') : '')
        ) .
        (config('adminlte.layout_fixed_footer') === true ?
            'layout-footer-fixed ' :
            (isset(config('adminlte.layout_fixed_footer')['xs']) ? (config('adminlte.layout_fixed_footer')['xs'] == true ? 'layout-footer-fixed ' : 'layout-footer-not-fixed ') : '') .
            (isset(config('adminlte.layout_fixed_footer')['sm']) ? (config('adminlte.layout_fixed_footer')['sm'] == true ? 'layout-sm-footer-fixed ' : 'layout-sm-footer-not-fixed ') : '') .
            (isset(config('adminlte.layout_fixed_footer')['md']) ? (config('adminlte.layout_fixed_footer')['md'] == true ? 'layout-md-footer-fixed ' : 'layout-md-footer-not-fixed ') : '') .
            (isset(config('adminlte.layout_fixed_footer')['lg']) ? (config('adminlte.layout_fixed_footer')['lg'] == true ? 'layout-lg-footer-fixed ' : 'layout-lg-footer-not-fixed ') : '') .
            (isset(config('adminlte.layout_fixed_footer')['xl']) ? (config('adminlte.layout_fixed_footer')['xl'] == true ? 'layout-xl-footer-fixed ' : 'layout-xl-footer-not-fixed ') : '')
        )
        : ''
    ) .
    (config('adminlte.sidebar_collapse') || View::getSection('sidebar_collapse') ? 'sidebar-collapse ' : '') .
    (config('adminlte.right_sidebar') && config('adminlte.right_sidebar_push') ? 'control-sidebar-push ' : '') .
    config('adminlte.classes_body')
)

@section('body_data',
(config('adminlte.sidebar_scrollbar_theme', 'os-theme-light') != 'os-theme-light' ? 'data-scrollbar-theme=' . config('adminlte.sidebar_scrollbar_theme')  : '') . ' ' . (config('adminlte.sidebar_scrollbar_auto_hide', 'l') != 'l' ? 'data-scrollbar-auto-hide=' . config('adminlte.sidebar_scrollbar_auto_hide')   : ''))

@php( $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout') )
@php( $profile_url = View::getSection('profile_url') ?? config('adminlte.profile_url', 'logout') )
@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $logout_url = $logout_url ? route($logout_url) : '' )
    @php( $profile_url = $profile_url ? route($profile_url) : '' )
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $logout_url = $logout_url ? url($logout_url) : '' )
    @php( $profile_url = $profile_url ? url($profile_url) : '' )
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

@section('body')
    <div class="wrapper" style="height: auto; min-height: 100%;" >
        @if(config('adminlte.layout_topnav') || View::getSection('layout_topnav'))
        <nav class="main-header navbar {{config('adminlte.classes_topnav_nav', 'navbar-expand-md')}} {{config('adminlte.classes_topnav', 'navbar-white navbar-light')}}">
            <div class="{{config('adminlte.classes_topnav_container', 'container')}}">
                @if(config('adminlte.logo_img_xl'))
                    <a href="{{ $dashboard_url }}" class="navbar-brand logo-switch">
                        <img src="{{ asset(config('adminlte.logo_img', 'vendor/adminlte/dist/img/AdminLTELogo.png')) }}" alt="{{config('adminlte.logo_img_alt', 'AdminLTE')}}" class="{{config('adminlte.logo_img_class', 'brand-image-xl')}} logo-xs">
                        <img src="{{ asset(config('adminlte.logo_img_xl')) }}" alt="{{config('adminlte.logo_img_alt', 'AdminLTE')}}" class="{{config('adminlte.logo_img_xl_class', 'brand-image-xs')}} logo-xl">
                    </a>
                @else
                    <a href="{{ $dashboard_url }}" class="navbar-brand {{ config('adminlte.classes_brand') }}">
                        <img src="{{ asset(config('adminlte.logo_img', 'vendor/adminlte/dist/img/AdminLTELogo.png')) }}" alt="{{config('adminlte.logo_img_alt', 'AdminLTE')}}" class="{{ config('adminlte.logo_img_class', 'brand-image img-circle elevation-3') }}" style="opacity: .8">
                        <span class="brand-text font-weight-light {{ config('adminlte.classes_brand_text') }}">
                            {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
                        </span>
                    </a>
                @endif

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <ul class="nav navbar-nav">
                        @each('adminlte::partials.menu-item-top-nav-left', $adminlte->menu(), 'item')
                    </ul>
                </div>
            @else


               {{--}Inicio do navbar{{--}}
            <nav class="main-header navbar {{config('adminlte.classes_topnav_nav', 'navbar-expand-md')}} {{config('adminlte.classes_topnav', 'navbar-white navbar-light')}}" style="background-color: aliceblue">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" @if(config('adminlte.sidebar_collapse_remember')) data-enable-remember="true" @endif @if(!config('adminlte.sidebar_collapse_remember_no_transition')) data-no-transition-after-reload="false" @endif @if(config('adminlte.sidebar_collapse_auto_size')) data-auto-collapse-size="{{config('adminlte.sidebar_collapse_auto_size')}}" @endif>
                            <i class="fas fa-bars"></i>
                            <span class="sr-only">{{ __('adminlte::adminlte.toggle_navigation') }}</span>
                        </a>
                    </li>
                   
                    @each('adminlte::partials.menu-item-top-nav-left', $adminlte->menu(), 'item')
                    @yield('content_top_nav_left')
                </ul>





  
                {{--}}Espaço ao lado do botaõ de buscar{{--}}


            @endif
                <ul class="navbar-nav ml-auto @if(config('adminlte.layout_topnav') || View::getSection('layout_topnav'))order-1 order-md-3 navbar-no-expand @endif">
                    @yield('content_top_nav_right')
                    @each('adminlte::partials.menu-item-top-nav-right', $adminlte->menu(), 'item')
                    @if(Auth::user())
                        @if(config('adminlte.usermenu_enabled'))
                        <li class="nav-item dropdown user-menu">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                @if(config('adminlte.usermenu_image'))
                                <img src="{{ Auth::user()->adminlte_image() }}" class="user-image img-circle elevation-2" alt="{{ Auth::user()->name }}">
                                @endif
                                <span @if(config('adminlte.usermenu_image'))class="d-none d-md-inline"@endif>{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                @if(!View::hasSection('usermenu_header') && config('adminlte.usermenu_header'))
                                <li class="user-header {{ config('adminlte.usermenu_header_class', 'bg-primary') }} @if(!config('adminlte.usermenu_image'))h-auto @endif">
                                    @if(config('adminlte.usermenu_image'))
                                    <img src="{{ Auth::user()->adminlte_image() }}" class="img-circle elevation-2" alt="{{ Auth::user()->name }}">
                                    @endif
                                    <p class="@if(!config('adminlte.usermenu_image'))mt-0 @endif">
                                        {{ Auth::user()->name }}
                                        @if(config('adminlte.usermenu_desc'))
                                        <small>{{ Auth::user()->adminlte_desc() }}</small>
                                        @endif
                                    </p>
                                </li>
                                @else
                                @yield('usermenu_header')
                                @endif
                                @each('adminlte::partials.menu-item-top-nav-user', $adminlte->menu(), 'item')
                                @hasSection('usermenu_body')
                                <li class="user-body">
                                    @yield('usermenu_body')
                                </li>
                                @endif
                                <li class="user-footer">
                                    @if($profile_url)
                                    <a href="{{ $profile_url }}" class="btn btn-default btn-flat">Profile</a>
                                    @endif

                                    <a class="btn btn-default btn-flat float-right @if(!$profile_url)btn-block @endif" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-fw fa-power-off"></i> {{ __('adminlte::adminlte.log_out') }}
                                    </a>
                                    <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
                                        @if(config('adminlte.logout_method'))
                                            {{ method_field(config('adminlte.logout_method')) }}
                                        @endif
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-fw fa-power-off"></i> {{ __('adminlte::adminlte.log_out') }}
                            </a>
                            <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
                                @if(config('adminlte.logout_method'))
                                    {{ method_field(config('adminlte.logout_method')) }}
                                @endif
                                {{ csrf_field() }}
                            </form>
                        </li>
                        @endif
                    @endif
                    @if(config('adminlte.right_sidebar'))
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-widget="control-sidebar" @if(!config('adminlte.right_sidebar_slide')) data-controlsidebar-slide="false" @endif @if(config('adminlte.right_sidebar_scrollbar_theme', 'os-theme-light') != 'os-theme-light') data-scrollbar-theme="{{config('adminlte.right_sidebar_scrollbar_theme')}}" @endif @if(config('adminlte.right_sidebar_scrollbar_auto_hide', 'l') != 'l') data-scrollbar-auto-hide="{{config('adminlte.right_sidebar_scrollbar_auto_hide')}}" @endif>
                                <i class="{{config('adminlte.right_sidebar_icon')}}"></i>
                            </a>
                        </li>
                    @endif
                </ul>
                
                @if(config('adminlte.layout_topnav') || View::getSection('layout_topnav'))
                    </nav>
                @endif


                {{--}}final do navbar{{--}}


               
             



            </nav>
        @if(!config('adminlte.layout_topnav') && !View::getSection('layout_topnav'))

        {{--}}Inicio do Menu do portal{{--}}
        <aside class="main-sidebar {{config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4')}}" style="position: fixed;">
            @if(config('adminlte.logo_img_xl'))
                <a href="{{ $dashboard_url }}" class="brand-link logo-switch">
                    <img src="{{ asset(config('adminlte.logo_img', 'vendor/adminlte/dist/img/AdminLTELogo.png')) }}" alt="{{config('adminlte.logo_img_alt', 'AdminLTE')}}" class="{{config('adminlte.logo_img_class', 'brand-image-xl')}} logo-xs">
                    <img src="{{ asset(config('adminlte.logo_img_xl')) }}" alt="{{config('adminlte.logo_img_alt', 'AdminLTE')}}" class="{{config('adminlte.logo_img_xl_class', 'brand-image-xs')}} logo-xl">
                </a>
            @else
                <a href="{{ $dashboard_url }}" class="brand-link {{ config('adminlte.classes_brand') }}">
                    <img src="{{ asset(config('adminlte.logo_img', 'vendor/adminlte/dist/img/AdminLTELogo.png')) }}" alt="{{config('adminlte.logo_img_alt', 'AdminLTE')}}" class="{{ config('adminlte.logo_img_class', 'brand-image img-circle elevation-3') }}" style="opacity: .8">
                    <span class="brand-text font-weight-light {{ config('adminlte.classes_brand_text') }}">
                        {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
                    </span>
                </a>
            @endif
            <div class="sidebar">

                {{--}}Menu informações dentro do menu{{--}}
                <nav class="mt-2" >
                    <ul class="nav nav-pills nav-sidebar flex-column {{config('adminlte.classes_sidebar_nav', '')}}" data-widget="treeview" role="menu" @if(config('adminlte.sidebar_nav_animation_speed') != 300) data-animation-speed="{{config('adminlte.sidebar_nav_animation_speed')}}" @endif @if(!config('adminlte.sidebar_nav_accordion')) data-accordion="false" @endif>
                        @each('adminlte::partials.menu-item', $adminlte->menu(), 'item')
                    </ul>
                </nav>
            </div>



            {{--}} fim do menu do portal{{--}}
        </aside>
        @endif

        <div class="content-wrapper" style="height: auto; min-height: 100%;">
            @if(config('adminlte.layout_topnav') || View::getSection('layout_topnav'))
            <div class="container">
            @endif

            {{--}}Cabeçalho do painel perfil, meus processos e etc{{--}}
            <section class="content-header" style="background-color: white;">
                <div class="{{config('adminlte.classes_content_header', 'container-fluid')}}">
                    @yield('content_header')
                </div>
            </section>
 

            {{--}}Conteudo do perfil, dados pessoais e etc background{{--}}
            <section class="content" style="height: auto !important; min-height: 0px !important; background-color: white;">
                <div class="{{config('adminlte.classes_content', 'container-fluid')}}">
                    @yield('content')
                </div>
            </section>
            @if(config('adminlte.layout_topnav') || View::getSection('layout_topnav'))
            </div>
            @endif
        </div>

        {{-- @hasSection('footer') --}}
        {{-- <footer class="main-footer"> --}}
            {{-- <footer class="site-footer mt-5" id="idfooter">

            @yield('footer')
        </footer>    @endif--}}




        <footer class="main-footer" style="background-color: #26272b;">
    <div class="container">

    <div class="row" >
      <div class="col-xs-4 col-md-4"></div>
      <div class ="col-sm-4 col-md-4">
        <h6 id="idlogininform">Para mais informações:</h6>
      </div>
      <div class="col-sm-4 col-md-4"></div>
    </div>
    <div class="row" style="margin-top: 10px; ">
      <div class="col-sm-2 col-md-2">

      </div>

      <div class="col-xs-4 col-md-4">

        <ul class="footer-links">
          <li ><p class="fas fa-map-marked-alt">  Rodovia Km1, MG-123 - Zona Rural</p></li>
          <li><p class="fas fa-phone"> (031) 3855-3000</p></li>
          <li><p class="fas fa-envelope"> rh@bioextratus.com.br </p></li>
        </ul>
      </div>

      <div class="col-xs-4 col-md-4">

        <ul class="footer-links">
          <li><p class="fas fa-road"> Alvinópolis - MG, CEP: 35950-000</p></li>
          <li><p class="fas fa-registered"> CNPJ: 02.176.615/0001-07</p></li>
        </div>
        <div class="col-xs-2 col-md-2 ">


        </ul>
      </div>
    </div>

  </div>
  <hr>

   <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-6 col-xs-12">
        <p class="copyright-text">Copyright &copy; 2020 Todos os direitos são reservados à Bioextratus Cosmetics Natural
          <a href="https:https://loja.bioextratus.com.br">Site Oficial</a>.
        </p>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12">

        <ul class="social-icons">
          <li><a class="facebook" href="https://www.facebook.com/bioextratus/">
            <img  class ="redesimg" src="/img/ImagemFacebook.jpg"></a></li>
            <li><a class="twitter" href="https://www.linkedin.com/in/bio-extratus-cosmetic-natural-ltda-918900159/">{{--<i class="fa fa-linkedin"></i> --}}
              <img class="redesimg" src="/img/ImagemLinkedin.jpg"></a></li>
              <li><a class="dribbble" href="https://www.instagram.com/bioextratus/?hl=pt-br">
                <img class ="redesimg"src="/img/ImagemInstagram.jpg" ></a></li>
                <li><a class="youtube" href="https://www.youtube.com/bioextratusoficial">
                  <img class="redesimg"src="/img/ImagemYoutube.png"></a></li>
                  <li><a class="flickr" href="https://www.flickr.com/photos/bioextratus/">
                    <img class="redesimg"src="/img/ImagemFlicker.png"></a></li>
                  </ul>
                </div>
              </div>
            </div>
  </footer>

     

        @if(config('adminlte.right_sidebar'))
            <aside class="control-sidebar control-sidebar-{{config('adminlte.right_sidebar_theme')}}">
                @yield('right-sidebar')
            </aside>
        @endif

    </div>
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @stack('js')
    @yield('js')
@stop