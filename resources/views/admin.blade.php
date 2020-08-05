@extends('adminlte::page')
{{-- Link do Bootstrap --}}
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
{{-- <link rel ="stylesheet" href="css/homeCandidato.css"> --}}
<script src="/vendor/jquery/jquery.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>

@section('content')

<div class="container">

    <div class="row">

        <div class="col-xs-3 col-md-3" style="background-color: white;">
            <div style="text-justify:  center;">
                @if(count($admin)==0)
                <ul style="text-align: center;">
                    <p>Você não é um usuario cadastrado e bla...</p>
                </ul>
                @endif

                @foreach($admin as $item)
                <ul style="text-align: center;">
                    <p style="padding-left: 10px;"><strong class="lead"
                            style="font-family: Arial, Helvetica, sans-serif;">Nome:</strong><em
                            style="padding-left: 10px;">{{Auth::user()->name}}</em></p>
                    <p style="padding-left: 10px;"><strong class="lead"
                            style="font-family: Arial, Helvetica, sans-serif;">ID
                            administrador:</strong><em style="padding-left: 10px;">{{Auth::user()->id}}</em></p>
                    <p style="padding-left: 10px;"><strong class="lead"
                            style="font-family: Arial, Helvetica, sans-serif;">Email:</strong><em
                            style="padding-left: 10px;">{{Auth::user()->email}}</em></p>
                </ul>
                @endforeach
            </div>
        </div>
        <div class="col-xs-7 col-md-7" style="background-color: white;">
            <div class="box box-primary">
                <div class="box-body box-profile">

                    <div class="card-body" style="text-align: center;">
                        @if(Auth::user()->foto != null)
                        <img src="{{'/fotos/'.Auth::user()->foto}}" alt="{{Auth::user()->name}}"
                            style="max-width: 100px; text-align: center; border-radius: 50%;">
                        @else
                        <img class="profile-user-img img-responsive img-circle" src="/img/imagemtie.png"
                            alt="Usuário sem foto">
                        @endif
                    </div>
                    <h3 class="profile-username text-center" style="font-family: Arial, Helvetica, sans-serif;">
                        Seja Bem-Vindo(a), {{Auth::user()->name}}</h3>
                    <p style="padding-left: 10px; text-align: center;"><strong class="lead">Verifique as suas opções de
                            gerenciamento do sistema no menu ao lado!!!</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 100px;">
        <div class=" col-md">
            <div class="d-flex border">
                <div class="bg-primary text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-cog"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Configuração</p>
                    <h3 class="font-weight-bold mb-0"></h3>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-success text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-circle-notch"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Processos</p>
                    <h3 class="font-weight-bold mb-0"></h3>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-danger text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-bullhorn"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Anunciar Vagas</p>
                    <h3 class="font-weight-bold mb-0"></h3>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-info text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-envelope"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Email</p>
                    <h3 class="font-weight-bold mb-0"></h3>
                </div>
            </div>
        </div>
    </div>

</div>
</div>




@endsection