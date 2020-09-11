@extends('adminlte::page')

<script src="https://code.jquery.com/jquery-3.5.1.min.js">
</script>

{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script> --}}
<script src="/jquerymask/jquerymasky.js"></script>
<script src="/jqueryMaskMoney/jquery.maskMoney.js" type="text/javascript"></script>
<script src=" https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js " type=" text / javascript "> </script>
{{-- 
<script src="vendor/jquery/jquery.js"></script> --}}
<script src="/js/Dadospessoais/edit.js"></script>
<script src="/js/Dadospessoais/validaCPFexistente.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
    integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous">
</script>


@section('content')

<div class="container">



    <div class="row">

        <div class="col-xs-1 col-md-1">


        </div>

        <div class="col-xs-10 col-md-10">

            <div id="accordion" style="margin-top: 40px;">
                <div class="card-border-light">
                    <div class="card-header" id="headingOne" style="background-color:white;">
                        <div class="container">
                            <div class="row">
                                <div class="col-">
                                    <h2 class="mb-0" style="color:dodgerblue; font-size:25px;">
                                        Editar Perfil
                                        <span class="fa-stack fa-sm">
                                            <i class="fas fa-circle fa-stack-2x"></i>
                                            <i class="fas fa-id-card fa-stack-1x fa-inverse"></i>
                                        </span>

                                    </h2>

                                </div>


                                <div class="col-xs-7 col-2" style="margin-left: auto; margin-top:7px;">
                                    <div class="btn-group " role="group" aria-label="">


                                        <button class=" btn btn-secondary btn-sm"
                                            style="height:30px; margin-top: 10px; width:70px;" title="Voltar " value=""
                                            id="botaovoltar">
                                            <a style="color: white;" href="/home">Voltar<span class="fas fa-undo"
                                                    style="padding-left: 5px; color:white; font-size:9px;"></span></a>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body" style="box-sizing: border-box;">

                            <ul style="list-style-type: none;">

                                <form action="/perfil/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <li><strong>FOTO:&nbsp;&nbsp;&nbsp;</strong><span> </span>
                                            @if(Auth::user()->foto != null)
                                                <img src="{{url('/fotos/'.Auth::user()->foto)}}"
                                                    alt="{{Auth::user()->name}}" style="max-width: 50px;">
                                                <p>Para trocar a foto, basta anexar abaixo uma nova imagem.</p>
                                            @endif
                                            <input type="file" class="form-control-file" id="foto" name="foto"
                                                file_extension=".jpg" accept='image/*'
                                                title="Alterar Foto de Perfil">
                                        </li>
                                    </div>



                                    <div class="form-group">
                                        <li><strong> NOME:*&nbsp;&nbsp;&nbsp;</strong>
                                            <input type="text" class="form-control" name="nome" id="nome" autofocus
                                                placeholder="Nome" value="{{Auth::user()->name}}" title="Nome">
                                        </li>
                                        <div class="invalid-feedback" id="mensnome" style="display: none;">
                                            Você precisa preencher o nome!
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <li><strong> E-MAIL:&nbsp;&nbsp;&nbsp;</strong>
                                            <input type="text" class="form-control" name="nome" id="nome" autofocus
                                                placeholder="Nome Completo" value="{{Auth::user()->email}}" title="Nome" disabled>
                                        </li>
                                        
                                    </div>




                                    <div class="form-group" style="text-align: end;">
                                        <button type="submit" class="btn btn-primary" id="botaosalvarend"
                                            title="Confirmar Alterações" value="{{Auth::user()->id}}">Salvar<span
                                                class="fas fa-save" style="padding-left: 15px;"></button>
                                        <button class=" btn btn-danger" type="cancel" title="Cancelar Edição">
                                            <a href="{{route('admin.index')}}" style="color:white;">Cancelar<span
                                                    class="fas fa-window-close" style="padding-left: 15px;"></span></a>
                                        </button>
                                    </div>
                                </form>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xs1 col-md-1"></div>

    </div>
</div>


@endsection