<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{url('front/images/favicon.ico')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FMS | Administration</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{url('back/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('back/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DATATABLE -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css" />
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('index')}}" class="nav-link">Accueil</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('contact.create')}}" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <?php $user = auth()->user(); ?>
                            <!-- Message Start -->
                            <div class="media">
                                <img src="" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        @if ($user->statut == "eleve")
                                        {{ $user->eleve->prenom }}
                                        @elseif ($user->statut == "admin")
                                        {{ $user->admin->prenom }}
                                        @endif

                                        @if ($user->statut == "eleve")
                                        {{ $user->eleve->nom }}
                                        @elseif ($user->statut == "admin")
                                        {{ $user->admin->nom }}
                                        @endif
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>Il y a 4 heures</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">Voir tout les messages</a>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{route('indexback')}}" class="brand-link">
                <img src="{{url('front/images/favicon.ico')}}" alt="FollowMyStudent" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Administration</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{url($user->image_profil)}}" class="img-size-50 img-circle mr-3">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            @if ($user->statut == "eleve")
                            {{ $user->eleve->prenom }}
                            @elseif ($user->statut == "admin")
                            {{ $user->admin->prenom }}
                            @endif

                            @if ($user->statut == "eleve")
                            {{ $user->eleve->nom }}
                            @elseif ($user->statut == "admin")
                            {{ $user->admin->nom }}
                            @endif
                        </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{route('indexback')}}" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Utilisateurs
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('avatar.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Gestion avatars
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('offre.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-list-alt"></i>
                                <p>
                                    Offres
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('home.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Acceuil view
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('forum.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Forum
                                </p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="{{route('questionnaire.index')}}" class="nav-link">
                                <i class="nav-icon fas  fa-question-circle"></i>
                                <p>
                                    Questionnaire
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('contact.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-question-circle"></i>
                                <p>
                                    Demandes de contact
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('log.view')}}" class="nav-link">
                                <i class="nav-icon fas fa-eye"></i>
                                <p>
                                    Log
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">
                                @section("title")

                                @show
                            </h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                @section("content")

                @show
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">

            </div>
            <!-- Default to the left -->
            <strong id="copyright">Copyright &copy; <script>
                    document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                </script> <a>FollowMyStudent</a>.</strong> Tout droits réservés.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    @section("script")

    @show
    <!-- jQuery -->
    <script src="{{url('back/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{url('back/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('back/dist/js/adminlte.min.js')}}"></script>
    <script src="{{url('back/js/avatar_selector.js')}}" type="text/javascript"></script>

    <!-- DATATABLE -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable({

                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                }
            });

            $('#master').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked', false);
                }
            });

            $('.delete_all').on('click', function(e) {


                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });


                if (allVals.length <= 0) {
                    alert("Veuillez séléctionner au moins une ligne.");
                } else {


                    var check = confirm("Etes vous sur de vouloir supprimer ces lignes?");
                    if (check == true) {


                        var join_selected_values = allVals.join(",");


                        $.ajax({
                            url: $(this).data('url'),
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: 'ids=' + join_selected_values,
                            success: function(data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function() {
                                        $(this).parents("tr").remove();
                                    });
                                    alert(data['success']);
                                } else if (data['error']) {
                                    alert(data['error']);
                                } else {
                                    alert('Whoops...Quelque chose s\'est mal passé!!');
                                }
                            },
                            error: function(data) {
                                alert(data.responseText);
                            }
                        });


                        $.each(allVals, function(index, value) {
                            $('table tr').filter("[data-row-id='" + value + "']").remove();
                        });
                    }
                }
            });


            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
                onConfirm: function(event, element) {
                    element.trigger('confirm');
                }
            });


            $(document).on('confirm', function(e) {
                var ele = e.target;
                e.preventDefault();


                $.ajax({
                    url: ele.href,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data['success']) {
                            $("#" + data['tr']).slideUp("slow");
                            alert(data['success']);
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('Whoops...Quelque chose s\'est mal passé!!');
                        }
                    },
                    error: function(data) {
                        alert(data.responseText);
                    }
                });


                return false;
            });
        });
    </script>
</body>

</html>