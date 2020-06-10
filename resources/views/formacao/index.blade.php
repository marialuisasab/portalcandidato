@extends('adminlte::page')

@section('content')



<div class="container">



  <div class="row">

    <div class="col-xs-1 col-md-1">


    </div>

    <div class="col-xs-10 col-md-10">

      <div id="accordion" style="margin-top: 40px;">

        <div class="card-border-light">
          <div class="card-header" id="headingTwo" style="background-color: aliceblue;">
            <div class="container">
              <div class="row">
                <div class="col-sm">
                  <h2 class="mb-0" style="color:dodgerblue; text-align: center;">

                    Formação Acadêmica e Cursos Complementares
                    <span class="fa-stack fa-sm">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fas fa-user-graduate fa-stack-1x fa-inverse"></i>
                    </span>

                  </h2>

                </div>
                <div class="col-xs-1 col-md-1"></div>

                {{-- <div class="col-xs-7 col-md-7">

                  <button class=" btn btn-link">
                    <a style="color:dodgerblue;" href="/formacao/editar/{{Auth::user()->id}}">
                <strong>Editar</strong></a>
                <span class="fa fa-edit" style="font-size: 25px; text-align: center;"></span>

                </button>

                <button class=" btn btn-link">
                  <a href="/curso/novo" style="color: dodgerblue;"><strong> Novo </strong></a>
                  <span class="fa fa-plus" style="font-size: 25px; text-align: center;"></span>
                </button>

                <button class=" btn btn-link" style="color: gray;" type="cancel">
                  <a style="color: gray;" href="/endereco"><strong>Voltar</strong></a>
                  <span class="fas fa-undo" style="font-size: 25px; text-align: center;"></span>

                </button>

                <button class=" btn btn-link" style="color: green;" type="cancel">
                  <a style="color: green;" href="#"><strong> Proximo</strong></a>
                  <span class="fas fa-forward" style="font-size: 25px; text-align: center;"></span>

                </button>



              </div> --}}
            </div>


          </div>




        </div>


        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">

            @foreach($cursos as $c)

            <div class="container">
              <div class="row" style="margin-top: 25px; text-align:center;">
                <div class="col-sm">

                  <button class=" btn btn-link">
                    <a style="color:dodgerblue;" href="/formacao/editar/{{Auth::user()->id}}">
                      <strong>Editar</strong></a>
                    <span class="fa fa-edit" style="font-size: 25px; text-align: center;"></span>

                  </button>

                  <button class=" btn btn-link">
                    <a href="/curso/novo" style="color: dodgerblue;"><strong> Novo </strong></a>
                    <span class="fa fa-plus" style="font-size: 25px; text-align: center;"></span>
                  </button>

                  <button class=" btn btn-link" style="color:red;">
                    <a href="/curso/excluir/{{$c->idcurso}}" style="color:red;"><span class=" fa fa-trash-alt"
                        style="font-size: 25px; text-align: center;">Excluir</span> </a>

                  </button>

                  <button class=" btn btn-link" style="color: gray;">
                    <a style="color: gray;" href="/endereco"><strong><span class="fas fa-undo"
                          style="font-size: 25px; text-align: center;">Voltar</span></strong></a>


                  </button>

                  <button class=" btn btn-link" style="color: green;">
                    <a style=" color: green;" href="#"><strong><span class="fas fa-forward"
                          style="font-size: 25px; text-align: center;">Proximo</span> </strong></a>


                  </button>
                </div>
              </div>

              <div class="row" style="margin-top: 25px;">

                <div class="col-sm">
                  <ul></ul>

                  <ul style="list-style-type: none; margin-right: auto;">



                    <li><strong> NOME DO CURSO:&nbsp;&nbsp;&nbsp;</strong> {{$c->nome}}
                    </li>
                    <hr>

                    @if($c->escolaridade === 1)
                    <li><strong> NIVEL:&nbsp;&nbsp;&nbsp;</strong> {{Helper::getNivel($c->nivel_idnivel)}}
                    </li>
                    <hr>

                    <li><strong> AREA:&nbsp;&nbsp;&nbsp;</strong> {{Helper::getArea($c->area_idarea)}}</li>
                    <hr>

                    @if($c->periodo)
                    <li><strong> PERÍODO:&nbsp;&nbsp;&nbsp;</strong>{{$c->periodo}}
                    </li>
                    <hr>
                    @endif
                    @else

                    <li><strong>
                        CATEGORIA:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getCategoria($c->categoria_idcategoria)}}
                    </li>
                    <hr>
                    @endif

                    <li><strong>
                        DATA DE INÍCIO:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getData($c->dtinicio)}}
                    </li>
                    <hr>

                    @if($c->dtfim)
                    <li><strong> DATA DE CONCLUSÃO:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getData($c->dtfim)}}
                    </li>
                    @endif
                    <hr>
                  </ul>

                </div>
              </div>
            </div>




            @endforeach



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

  <div class="card border">
    <div class= "card-body"> 
      
      <div class="row">  
        <div class="col-10"><h5>Formação Acadêmica e Cursos Complementares</h5></div>
        <div class="col-2"><a href="/curso/novo" class="btn btn-sm btn-primary"> Novo </a></div>
      </div>

      @foreach($cursos as $c)
      <div class="container px-lg-5">
          <div class="row mx-lg-n5">
            <div class="col py-3 px-lg-5">             
              <p>Nome do curso: <b>{{$c->nome}}</b></p>
@if($c->escolaridade === 1)
<p>Nível: <b>{{Helper::getNivel($c->nivel_idnivel)}}</b> </p>
<p>Área: <b>{{Helper::getArea($c->area_idarea)}}</b> </p>
@if($c->periodo)
<p>Período: <b>{{$c->periodo}}</b></p>
@endif
@else
<p>Categoria: <b>{{Helper::getCategoria($c->categoria_idcategoria)}}</b></p>
@endif
<p>Data de Início: <b>{{Helper::getData($c->dtinicio)}}</b></p>
@if($c->dtfim)
<p>Data de Conclusão: <b>{{Helper::getData($c->dtfim)}}</b></p>
@endif
</div>
<div class="col py-3 px-lg-5">
  <a href="/curso/editar/{{$c->idcurso}}" class="btn btn-sm btn-primary"> Editar </a>
  <a href="/curso/excluir/{{$c->idcurso}}" class="btn btn-sm btn-danger"> Excluir </a>
</div>
</div>
</div>
@endforeach
</div>
</div>
@endsection --}}