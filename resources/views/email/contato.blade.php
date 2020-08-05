@extends('adminlte::page')



{{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script> --}}
<script src="/vendor/jquery/jquery.min.js">
</script>
<script src="/jquerymask/jquerymasky.js"></script>
<script src="/js/Endereco/endereco.js"></script>
{{-- 
<script src="/js/Endereco/endereco.js"></script> --}}

@section('content')

@include('flash::message')

<div class="container">



    <div class="row">

        <div class="col-xs-1 col-md-1">


        </div>

        <div class="col-xs-10 col-md-10">

            <div id="accordion" style="margin-top: 40px;">

                <div class="card-border-light">
                    <div class="card-header" id="headingTwo" style="background-color: white;">
                        <div class="container">
                            <div class="row">
                                <div class="col-">
                                    <h2 class="mb-0" style="color:dodgerblue; font-size: 25px;">

                                        Contatar Suporte
                                        <span class="fa-stack fa-sm">
                                            <i class="fas fa-circle fa-stack-2x"></i>
                                            <i class="fas fa-headphones fa-stack-1x fa-inverse"></i>
                                        </span>

                                    </h2>

                                </div>


                                <div class="col-xs-8 col-2" style="text-align: end; margin-left: auto;">
                                    <div class="btn-group" role="group" aria-label="">
                                        <button class=" btn btn-secondary btn-sm" type="button" title="Voltar"
                                            style="height:30px; margin-top: 10px; width:70px;">
                                            <a href="/home" style="color: white;">Voltar<span class="fas fa-undo"
                                                    style="padding-left: 5px; color:white; font-size:9px;"></span></a>
                                        </button>
                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>
                </div>


                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div  style="text-align: center;">
                        <p> 
                            Entre em contato com o suporte técnico em caso de <b>problemas técnicos</b> ou <b>dúvidas sobre o funcionamento da plataforma</b>. Qualquer outro assunto, favor contatar o Fale Conosco da Bio Extratus clicando <a href="https://bioextratus.typeform.com/to/OROwAP"><b>aqui</b></a>.
                        </p>

                    </div>
                    <div class="card-body">
                    

                        <ul style="list-style-type: none;">



                            <form action="{{route('enviaremail')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <li style=""><strong> NOME:&nbsp;&nbsp;&nbsp;</strong>
                                        <input input type="text" name="nome" class="form-control"
                                            value="{{Auth::user()->name}}" readonly title="Nome">
                                    </li>
                                </div>
                                <div class="form-group">
                                    <li style=""><strong> EMAIL:&nbsp;&nbsp;&nbsp;</strong>
                                        <input type="email" name="email" class="form-control"
                                            value="{{Auth::user()->email}}" readonly title="Email">
                                    </li>
                                </div>
                                <div class="form-group">
                                    <li style=""><strong> TELEFONE DE CONTATO:&nbsp;&nbsp;&nbsp;</strong>
                                        <input type="text" id="phone_contact" name="telefone" class="form-control"
                                            title="Telefone Principal">
                                    </li>
                                </div>
                                <div class="form-group">
                                    <li style=""><strong> MENSAGEM:&nbsp;&nbsp;&nbsp;</strong>
                                        <textarea rows="6" class="form-control" name="mensagem" style="height:100px;"
                                            placeholder="Deixe seu recado..." title="Insira a Mensagem"></textarea>
                                    </li>
                                </div>
                                <div class="form-group" style="text-align: end;">
                                    <button class="btn btn-primary" title="Enviar Mensagem">Enviar</button>
                                </div>
                            </form>
                        </ul>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-xs-1 col-md-1"></div>

</div>
</div>






@endsection































{{-- 

@extends('adminlte::page')


@section('content')

<div class="card border">
    <div class="card-body">
        <h5>Contato - Suporte Técnico</h5>


        <form action="{{route('enviaremail')}}" method="post">
@csrf
<div class="form-group">
    <label>Nome</label>
    <input input type="text" name="nome" class="form-control" value="{{Auth::user()->name}}" readonly>
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" readonly>
</div>
<div class="form-group">
    <label>Telefone de Contato</label>
    <input type="text" id="phone_contact" name="telefone" class="form-control">
</div>
<div class="form-group">
    <label>Mensagem</label>
    <textarea rows="6" class="form-control" name="mensagem" style="height:100px;"></textarea>
</div>
<div class="col-md-6">
    <button class="btn btn-primary">Enviar</button>
</div>
</form>
</div>
</div>

@endsection --}}