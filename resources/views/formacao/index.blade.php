@extends('adminlte::page')
{{-- Author: Marcos Vinicius Timoteo Nunes --}}



{{-- importação do jquery --}}
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script> --}}
<script src="/vendor/jquery/jquery.min.js">
</script>

{{-- importação do arquivo JS --}}
<script src="/js/formacao/formacao.js"></script>


{{-- importação select2 --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/i18n/pt-BR.js"></script>
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
                <div class="col-sm">
                  <h2 class="mb-0" style="color:dodgerblue; text-align: center; font-size:25px;">
                    Formação Acadêmica e Cursos Complementares
                    <span class="fa-stack fa-sm">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fas fa-user-graduate fa-stack-1x fa-inverse"></i>
                    </span>
                  </h2>
                </div>
                <div class="col-xs-8 col-md-8" style="margin-top: 5px; margin-right: auto; text-align:end;">
                  <div class="btn-group btn-sm" role="group">
                    <button class=" btn btn-primary btn-sm" title="Adicionar Formação">
                      <a href="/curso/novo" style="color: white;">Adicionar<span class="fa fa-plus"
                          style="padding-left:15px;"></span> </a>
                    </button>
                    <button class=" btn btn-success btn-sm">
                      <a style=" color: white;" href="/experiencias" title="Cadastrar Experiências ">Proximo<span
                          class="fas fa-forward" style="padding-left:15px;"></span>
                      </a>
                    </button>
                    <button class=" btn btn-secondary btn-sm">
                      <a style="color: white;" href="/endereco" title="Voltar">Voltar<span class="fas fa-undo"
                          style="padding-left:15px;"></span></a>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
              @foreach($cursos as $c)
              <div class="container">
                <div class="row" style="margin-top: 25px; text-align:center;">
                  <div class="col-sm">


                    <button class=" btn btn-primary" title="Editar Formação">
                      <a style="color:white;" href="/curso/editar/{{$c->idcurso}}">Editar
                        <span class="fa fa-edit" style="padding-left:15px;"></span></a>
                    </button>


                    <button class=" btn btn-danger" name="idexcluirforma" value="{{$c->idcurso}}"
                      title="Excluir Formação">
                      <a style="color:white;">Excluir<span class=" fa fa-trash-alt" style="padding-left:15px;"></span>
                      </a>
                    </button>

                  </div>
                </div>

                <div class="row" style="margin-top: 25px;">
                  <div class="col-sm">
                    <ul></ul>
                    <ul class="item-ii" style="list-style-type: none; margin-right: auto;">
                      <li class="item-11"><strong> NOME DO CURSO:&nbsp;&nbsp;&nbsp;</strong> {{$c->nome}}
                      </li>
                      <hr>


                      @if ($c->escolaridade == '2')
                      <li class="item-2"><strong>
                          CATEGORIA:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getCategoria($c->categoria_idcategoria)}}
                      </li>
                      <hr>
                      @else
                      @endif



                      {{-- se a escolaridade for 1 --}}
                      @if ($c->escolaridade == '1')
                      {{-- se a escolaridade for 1 e os niveis forem superior (graduação, pos graduação, mestrado, doutorado) --}}
                      <?php 
                       $vetorniveisSsuperior=array("7","8","9","10","11","12","13","14");
                        ?>
                      @foreach ($vetorniveisSsuperior as $niveis)
                      @if($c->nivel_idnivel == $niveis)
                      @if ($c->instituicao_idinstituicao != null)
                      <li class="item-2"><strong>
                          INSTITUIÇÃO&nbsp;&nbsp;&nbsp;</strong>{{Helper::getInstituicoesId($c->instituicao_idinstituicao)}}
                      </li>
                      <hr>
                      @else
                      <li class="item-2"><strong>
                          INSTITUIÇÃO&nbsp;&nbsp;&nbsp;</strong><span style="color: red;">Não informado</span>
                      </li>
                      <hr>
                      @endif
                      @else
                      @endif
                      @endforeach


                      {{-- se a escolaridade for 1 e os niveis forem  (medio, tecnico, fundamental) --}}
                      <?php 
                                            $vetorniveisNsuperior=array("1","2","3","4","5","6");
                                             ?>
                      @foreach ($vetorniveisNsuperior as $niveis)
                      @if($c->nivel_idnivel == $niveis)
                      <li class="item-2"><strong> ESCOLA:&nbsp;&nbsp;&nbsp;</strong>{{$c->escola}}
                      </li>
                      <hr>
                      @else
                      @endif
                      @endforeach


                      @else

                      {{-- se a escolaridade for 2 e os niveis forem --}}
                      @if ($c->escola != null)
                      <li class="item-2"><strong>
                          INSTITUIÇÃO&nbsp;&nbsp;&nbsp;</strong>{{$c->escola}}
                      </li>
                      <hr>
                      @else
                      <li class="item-2"><strong>
                          INSTITUIÇÃO&nbsp;&nbsp;&nbsp;</strong><span style="color: red;">Não informado</span>
                      </li>
                      <hr>
                      @endif
                      @endif


                      @if($c->escolaridade == '1')
                      <li class="item-2"><strong> NIVEL:&nbsp;&nbsp;&nbsp;</strong>
                        {{Helper::getNivel($c->nivel_idnivel)}}
                      </li>
                      <hr>

                      {{-- se area for diferente de Null, quer dizer que estamos falando de um nivel superior ou seja,  diferente
                      do ensino medio, fundamental, tecnico... --}}
                      @if($c->area_idarea !=null)
                      <li class="item-2"><strong> AREA:&nbsp;&nbsp;&nbsp;</strong> {{Helper::getArea($c->area_idarea)}}
                      </li>
                      <hr>
                      @else
                      @endif



                      {{-- se a escolaridade for 1 e os niveis forem superiores (graduação, pos graduação, mestrado e doutorado) --}}
                      <?php 
                       $vetorniveisSsuperior=array("7","8","9","10","11","12","13","14");
                      ?>
                      @foreach ($vetorniveisSsuperior as $niveis)
                      @if($c->nivel_idnivel == $niveis)
                      @if ($c->periodo != null)
                      <li class="item-2"><strong> PERÍODO:&nbsp;&nbsp;&nbsp;</strong>{{$c->periodo}}
                      </li>
                      <hr>
                      @else
                      <li class="item-2"><strong> PERÍODO:&nbsp;&nbsp;&nbsp;</strong> <span style="color: red;">Não
                          Informado!</span>
                      </li>
                      <hr>
                      @endif
                      @else
                      @endif
                      @endforeach



                      @else
                      @endif





                      <li class="item-2"><strong>
                          DATA DE INÍCIO:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getData($c->dtinicio)}}
                      </li>
                      <hr>

                      @if($c->dtfim == null)
                      <li class="item-2"><strong> DATA DE CONCLUSÃO:&nbsp;&nbsp;&nbsp;</strong> <span
                          style="color: red;">Não
                          Concluido!</span>
                      </li>
                      @else
                      <li class="item-2"><strong> DATA DE
                          CONCLUSÃO:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getData($c->dtfim)}}
                      </li>
                      @endif


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