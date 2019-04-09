<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Case Management System LBH</title>
    <meta name="description" content="SIK-LBH">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="/assets/css/normalize.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="/assets/css/cs-skin-elastic.css">
    <!--<link rel="stylesheet" href="/assets/css/bootstrap-select.less">-->
    <link rel="stylesheet" href="/assets/scss/style.css">
    <link href="/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!--Multistep Form Style-->
    <link href="/assets/forms/style.css" rel="stylesheet"/>

    <!--Datepicker Style-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

    <!--Select2js-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

</head>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/cmslbh"><h2><strong>CMS</strong></h2><h3>LBH</h3>
                <a class="navbar-brand hidden" href="/"><img src="/images/logo.jpg"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="/cmslbh/home"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>

                    <h3 class="menu-title">FORM</h3><!-- /.menu-title -->
                    @can('manage-people')
                    <li class="menu-item">
                        <a href="{{ route('people.person.index') }}" class="menu-item" data-toggle="tooltip" title="Form Person"> <i class="menu-icon fa fa-user" label="Form Personal"></i>Data Person</a>
                    </li>
                    @endcan
                    <li class="menu-item">
                        <a href="{{ route('applications.application.index') }}" class="menu-item" data-toggle="tooltip" title="Form Kelompok"> <i class="menu-icon fa fa-group"></i>Permohonan</a>
                    </li>
                    @can('manage-cases')
                    <li class="menu-item">
                        <a href="{{ route('client_cases.client_case.index')}}" class="menu-item" data-toggle="tooltip" title="Form Kasus"> <i class="menu-icon fa fa-file"></i>Data Kasus</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('case_consultations.case_consultation.index')}}" class="menu-item" data-toggle="tooltip" title="Form Kasus"> <i class="menu-icon fa fa-file"></i>Konsultasi Kasus</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('case_classifications.case_classification.index')}}" class="menu-item" data-toggle="tooltip" title="Penanganan Kasus"> <i class="menu-icon fa fa-address-card"></i>Klasifikasi Kasus</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('case_handlings.case_handling.index')}}" class="menu-item" data-toggle="tooltip" title="Penanganan Kasus"> <i class="menu-icon fa fa-address-card"></i>Penanganan Kasus</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('case_progresses.case_progress.index')}}" class="menu-item" data-toggle="tooltip" title="Perkembangan Kasus"> <i class="menu-icon fa fa-tasks"></i>Perkembangan Kasus</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('case_transfers.case_transfer.index')}}" class="menu-item" data-toggle="tooltip" title="Perkembangan Kasus"> <i class="menu-icon fa fa-tasks"></i>Transfer Kasus</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('case_meeting_results.case_meeting_result.index')}}" class="menu-item" data-toggle="tooltip" title="Penanganan Kasus"> <i class="menu-icon fa fa-address-card"></i>Hasil Rapat PK</a>
                    </li>
                    @endcan                    

                    @can('manage-transfers')
                    <h3 class="menu-title">REPORT</h3><!-- /.menu-title -->
                    <li class="menu-item">
                        <a href="{{route('people.person.index')}}" class="menu-item"> <i class="menu-icon fa fa-user-circle"></i>Print</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('case_documents.case_document.index')}}" class="menu-item"> <i class="menu-icon fa fa-clone"></i>Dokumen</a>
                    </li>
                    @endcan

                    @can('manage-people')
                    <h3 class="menu-title">DATA</h3><!-- /.menu-title -->
                    <li class="menu-item">
                        <a href="{{route('networks.network.index')}}" class="menu-item"> <i class="menu-icon fa fa-address-book"></i>Jaringan/Lembaga</a>
                    </li>
                    @endcan

                    @can('manage-users')
                    <h3 class="menu-title">ADMIN</h3><!-- /.menu-title -->
                    <li class="menu-item">
                        <a href="{{route('users.index')}}" class="menu-item"> <i class="menu-icon fa fa-address-book"></i>Users</a>
                    </li>
                    <li class="menu-item">
                        <a href="#" class="menu-item"> <i class="menu-icon fa fa-cog"></i>Settings</a>
                     </li>
                    @endcan
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">1</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 1 Notification</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                          </div>
                        </div>

                        <!-- <div class="dropdown for-message">
                          <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-email"></i>
                            <span class="count bg-primary">1</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have 1 Mails</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jon Doe</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                          </div>
                        </div> -->
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area float-right">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <span class="fa fa-sign-out fa-2x" aria-hidden="true"></span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                      

{{--                                 <a href="{{ route('logout') }}"
    onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
    <span class="fa fa-sign-out" aria-hidden="true"></span></a>
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form> --}}
                    </div>                    
                    <div class="user-area dropdown float-right">
                        <a href="#" class="menu-item" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="/images/admin.png" alt="">
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                                <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                                <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                                <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->

        <!-- content-->

        <div class="content mt-3">

        @yield('content')

        </div> <!-- endcontent -->

    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <script src="/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="/assets/js/plugins.js"></script>
    <script src="/assets/js/main.js"></script>

    <!--Multistep Form-->
<!--     <script src="public/assets/forms/js/jquery.min.js"></script>
<script src="public/assets/forms/js/popper.min.js"></script>
<script src="public/assets/forms/js/bootstrap.min.js"></script> -->
    <script src="/assets/forms/script.js"></script>


    <script src="/assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="/assets/js/dashboard.js"></script>
    <script src="/assets/js/widgets.js"></script>
    <script src="/assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="/assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="/assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="/assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
    ( function ( $ ) {
        "use strict";

        jQuery( '#vmap' ).vectorMap( {
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: [ '#1de9b6', '#03a9f5' ],
            normalizeFunction: 'polynomial'
        } );
    } )( jQuery );
    </script>

</body>
</html>
