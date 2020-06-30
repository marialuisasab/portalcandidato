@extends('adminlte::page')

{{-- importação do jquery --}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>

{{-- importação do arquivo JS --}}
<script src="/js/Experiencia/experiencia.js"></script>

@section('content')

@error('success')
<span class="invalid-feedback" role="alert">
  <strong>{{ $message }}</strong>
</span>
@enderror

@include('flash::message')

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
                  <h2 class="mb-0" style="color:dodgerblue;">

                    Experiencias Profissionais
                    <span class="fa-stack fa-sm">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fas fa-user-tie fa-stack-1x fa-inverse"></i>
                    </span>

                  </h2>

                </div>


                <div class="col-xs-8 col-md-8" style="margin-top: 25px; text-align:end; margin-left: auto;">

                  <button class=" btn btn-primary">
                    <a href="/experiencia/novo" style="color: white;">Adicionar<span class="fa fa-plus"
                        style="padding-left: 15px;"></span> </a>
                  </button>
                  <button class=" btn btn-success">
                    <a style=" color: white;" href="/habilidades">Proximo<span class="fas fa-forward"
                        style="padding-left:15px;"></span>
                    </a>
                  </button>
                  <button class=" btn btn-secondary">
                    <a style="color: white;" href="/cursos">Voltar<span class="fas fa-undo"
                        style="padding-left: 15px;"></span></a>
                  </button>


                </div>
              </div>
            </div>




          </div>


          <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">

              @foreach($experiencias as $e)

              <div class="container">
                <div class="row" style="margin-top: 25px; text-align:center;">
                  <div class="col-sm">

                    <button class=" btn btn-primary">
                      <a style="color:white;" href="/experiencia/editar/{{$e->idexperiencia}}">Editar
                        <span class="fa fa-edit" style="padding-left: 15px;"></span></a>
                    </button>


                    <button class=" btn btn-danger" name="botaoexcluir" value="{{$e->idexperiencia}}">
                      <a style="color: white;">Excluir<span class=" fa fa-trash-alt" style="padding-left:15px;"></span>
                      </a>
                    </button>


                  </div>
                </div>

                <div class="row" style="margin-top: 25px;">

                  <div class="col-sm">
                    <ul></ul>

                    <ul style="list-style-type: none; margin-right: auto;">


                      <li><strong> EMPRESA:&nbsp;&nbsp;&nbsp;</strong> {{$e->empresa}}
                      </li>
                      <hr>

                      <li><strong> CARGO&nbsp;&nbsp;&nbsp;</strong>{{$e->cargo}}</li>
                      <hr>


                      <li><strong> DATA DE INÍCIO:&nbsp;&nbsp;&nbsp;</strong> {{Helper::getData($e->dtinicio)}}
                      </li>
                      <hr>


                      @if ($e->dtfim != null)
                      <li><strong> DATA DE SAÍDA:&nbsp;&nbsp;&nbsp;</strong>{{Helper::getData($e->dtfim)}}</li>
                      @else
                      <li><strong> DATA DE SAÍDA:&nbsp;&nbsp;&nbsp;</strong> <span style="color:red;"> Trabalho nesta
                          empresa atualmente!</span></li>
                      @endif

                      <hr>


                      @if ($e->atividades != null)
                      <li style="word-break: break-word;"><strong>DESCRIÇÃO DAS
                          ATIVIDADES:&nbsp;&nbsp;&nbsp;</strong>{{$e->atividades}}
                      </li>
                      @else
                      <li style="word-break: break-word;"><strong>DESCRIÇÃO DAS
                          ATIVIDADES:&nbsp;&nbsp;&nbsp;</strong><span style="color: red;">Não Informado</span>
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
    <div class=" col-xs-1 col-md-1">
    </div>

  </div>
</div>





@endsection























{{-- 
  <div class="card border">
    <div class= "card-body"> 
      
      <div class="row">  
        <div class="col-10"><h5>Experiência Profissional</h5></div>
        <div class="col-2"><a href="{{route('experiencia.novo')}}" class="btn btn-sm btn-primary"> Novo </a>
</div>
</div>

@foreach($experiencias as $e)
<div class="container px-lg-5">
  <div class="row mx-lg-n5">
    <div class="col py-3 px-lg-5">
      <p>Nome da empresa: <b>{{$e->empresa}}</b></p>
      <p>Data de início: <b>{{Helper::getData($e->dtinicio)}}</b></p>
      <p>Data de término: <b>{{Helper::getData($e->dtfim)}}</b></p>
      <p>Cargo: <b>{{$e->cargo}}</b></p>
      <p>Atividades: <b>{{$e->atividades}}</b></p>
    </div>
    <div class="col py-3 px-lg-5">
      <a href="/experiencia/editar/{{$e->idexperiencia}}" class="btn btn-sm btn-primary"> Editar </a>
      <a href="/experiencia/excluir/{{$e->idexperiencia}}" class="btn btn-sm btn-danger"> Excluir </a>
    </div>
  </div>
</div>
@endforeach
</div>
</div>
@endsection --}}