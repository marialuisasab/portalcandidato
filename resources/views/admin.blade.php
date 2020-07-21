<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>


    {{-- script do jquery (deve vir antes do bootstrap pois o bootstrap precisa do jquery) --}}
    <script src="/vendor/jquery/jquery.min.js">
    </script>

    {{-- script do bootstrap para o javascript (deve vir depois do jquery) --}}
    <script src="vendor/bootstrap/js/bootstrap.min.js">
    </script>
    {{-- link do font de icones --}}
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="vendor/fontawesome-free/css/all.css">
    {{-- link do bootstrap para o css (deve vir depois do jquery) --}}
    <link rel="stylesheet" href="/vendor/bootstrap-4.0.0/css/bootstrap.min.css">
    {{-- link do pooper --}}
    <link rel="stylesheet" href="vendor/popper/umd/popper.min.js">

    <link href="css/homeadmin.css" rel="stylesheet">

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class=" border-right" id="sidebar-wrapper" style="background-color: #658f69;">
            <div class="sidebar-heading" style="color: red; background-color:  #658f69;">Usuario Administrador</div>
            <div class="list-group list-group-flush">
                <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu"
                    style="list-style-type: none">
                    <li class="nav-header">Gerenciar Perfil:</li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link list-group-item-action">
                            <p><i class="fas fa-edit">Editar Perfil</i></p>
                        </a>
                    </li>
                    <li class="nav-header">Gerenciar Vagas:</li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link list-group-item-action ">
                            <p><i class=" fas fa-bullhorn"> Anunciar vaga</i>
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Gerenciar Curriculos:</li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link list-group-item-action">
                            <p><i class="fas fa-search">Buscar Curriculos</i></p>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light border-bottom" style="background-color: #CDD7BC;">
                <button class="fas fa-bars" type="button" id="menu-toggle" style="background-color: "></button>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">

            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->



    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>