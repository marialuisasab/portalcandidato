@extends('adminlte::page')

@section('content')

<div class="container">



  <div class="row">

    <div class="col-xs-1 col-md-1">


    </div>

    <div class="col-xs-10 col-md-10">

      <div id="accordion" style="margin-top: 40px;">
        <div class="card-border-light">
          <div class="card-header" id="headingOne" style="background-color: aliceblue;">
            <div class="container">
              <div class="row">
                <div class="col-xs-5 col-md-5">
                  <h2 class="mb-0" style="color:dodgerblue;">
                    Formação e Cursos
                    <span class="fa-stack fa-sm">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fas fa-user-graduate fa-stack-1x fa-inverse"></i>
                    </span>

                  </h2>

                </div>


                <div class="col-xs-8 col-md-6" style="margin-left: auto;">
                  <div class="btn-group " role="group" aria-label="">
                    {{-- <button class=" btn btn-link">
											<a href="/curriculo/editar/{{Auth::user()->id}}" >Editar</a>
                    <span class="fa fa-edit" style="font-size: 25px; text-align: center;"></span>

                    </button> --}}





                    <button class=" btn btn-link" style="color:red;" type="cancel">
                      <a href="#" style="color: red;">Cancelar</a>
                      <span class="fas fa-window-close" style="font-size: 25px; text-align: center;"></span>

                    </button>





                    <button class=" btn btn-link" style="color" type="cancel">
                      <a href="/endereco">Voltar</a>
                      <span class="fas fa-undo" style="font-size: 25px; text-align: center;"></span>

                    </button>
                  </div>
                </div>
              </div>
            </div>


          </div>


          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body" style="box-sizing: border-box;">

              <ul style="list-style-type: none;">


                <form action="/curso" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div class="form-group">
                    <li><strong> DESCRIÇÃO:*&nbsp;&nbsp;&nbsp;</strong>
                      <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : ''}}" name="nome"
                        placeholder="Nome da instituição">
                      @if($errors->has('nome'))
                      <div class="invalid-feedback">
                        {{$errors->first('nome')}}
                      </div>
                      @endif
                    </li>
                  </div>



                  <div class="form-group">
                    <li><strong> NIVEL:*&nbsp;&nbsp;&nbsp;</strong>
                      <select class="custom-select" id="nivel_idnivel" name="nivel_idnivel">
                        <option value="" selected>Selecionar</option>
                        @foreach(Helper::getNiveis() as $n)
                        <option value="{{$n->idnivel}}">{{ $n->nome }}</option>
                        @endforeach
                      </select>
                    </li>
                  </div>





                  <div class="form-group">
                    <li><strong> CATEGORIA:*&nbsp;&nbsp;&nbsp;</strong>
                      <select class="custom-select" id="categoria_idcategoria" name="categoria_idcategoria">
                        <option value="" selected>Selecionar</option>
                        @foreach(Helper::getCategorias() as $c)
                        <option value="{{$c->idcategoria}}">{{ $c->nome }}</option>
                        @endforeach
                      </select>
                    </li>
                  </div>




                  <div class="form-group">
                    <li><strong> AREA:*&nbsp;&nbsp;&nbsp;</strong>
                      <select class="custom-select" id="area_idarea" name="area_idarea">
                        <option value="" selected>Selecionar</option>
                        @foreach(Helper::getAreas() as $a)
                        <option value="{{$a->idarea}}">{{$a->nome }}</option>
                        @endforeach
                      </select>
                    </li>
                  </div>


                  {{-- complemento  definicao pendente --}}
                  <div class="form-group">
                    <li><strong>ESCOLARIDADE:*&nbsp;&nbsp;&nbsp;</strong>
                      <select class="custom-select" id="escolaridade" name="escolaridade">
                        <option value="" selected>Selecionar</option>
                        <option value="1">Sim</option>
                        <option value="2">Não</option>
                      </select>
                    </li>

                  </div>




                  <div class="form-group">
                    <li><strong>PERÍODO:*&nbsp;&nbsp;&nbsp;</strong><span style="color: red;"></span>
                      <input type="number" class="form-control" name="periodo" placeholder="Ex.: 1/10">
                    </li>
                  </div>






                  <div class="form-group">
                    <li><strong> DATA DE INÍCIO:*&nbsp;&nbsp;&nbsp;</strong>
                      <input type="date" class="form-control" name="dtinicio" placeholder=""></li>
                  </div>








                  <div class="form-group">
                    <li style=""><strong> DATA DE CONCLUSÃO:*&nbsp;&nbsp;&nbsp;</strong>
                      <input type="date" class="form-control" name="dtfim" placeholder=""> </li>
                  </div>



                  <div class="form-group">

                    <li><strong>INSTITUIÇÃO:*
                        &nbsp;&nbsp;&nbsp;</strong>
                      <select class="custom-select" id="instituicao_idinstituicao" name="instituicao_idinstituicao">
                        <option value="" selected>Selecionar</option>
                        @foreach(Helper::getInstituicoes() as $i)
                        <option value="{{$i->idinstituicao}}">{{ $i->nome }}</option>
                        @endforeach
                      </select>


                    </li>

                  </div>

                  @if($errors->any())
                  <div class="card-footer">
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                      {{$error}}
                    </div>
                    @endforeach
                  </div>
                  @endif

                  <br><button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                  <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
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
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>


@endsection





{{-- 
  <div class="card border">
    <div class= "card-body">  
      <h5>Cadastrar formação acadêmica e cursos</h5>

      <form action="/curso" method="POST">
        @csrf
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for = "logradouro">Nome do curso *</label>
              <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : ''}}" name="nome">
@if($errors->has('nome'))
<div class="invalid-feedback">
  {{$errors->first('nome')}}
</div>
@endif
</div>
</div>
<div class="col">
  <div class="form-group">
    <label for="nivel_idnivel">Nível *</label>
    <select class="custom-select" id="nivel_idnivel" name="nivel_idnivel">
      <option value="" selected>Selecionar</option>
      @foreach(Helper::getNiveis() as $n)
      <option value="{{$n->idnivel}}">{{ $n->nome }}</option>
      @endforeach
    </select>
  </div>
</div>
<div class="col">
  <div class="form-group">
    <label for="categoria_idcategoria">Categoria *</label>
    <select class="custom-select" id="categoria_idcategoria" name="categoria_idcategoria">
      <option value="" selected>Selecionar</option>
      @foreach(Helper::getCategorias() as $c)
      <option value="{{$c->idcategoria}}">{{ $c->nome }}</option>
      @endforeach
    </select>
  </div>
</div>
</div>
<div class="row">
  <div class="col">
    <div class="form-group">
      <label for="area_idarea">Área *</label>
      <select class="custom-select" id="area_idarea" name="area_idarea">
        <option value="" selected>Selecionar</option>
        @foreach(Helper::getAreas() as $a)
        <option value="{{$a->idarea}}">{{$a->nome }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="col">
    <div class="form-group">
      <label for="escolaridade">Escolaridade *</label>
      <select class="custom-select" id="escolaridade" name="escolaridade">
        <option value="" selected>Selecionar</option>
        <option value="1">Sim</option>
        <option value="2">Não</option>
      </select>
    </div>
  </div>
  <div class="col">
    <div class="form-group">
      <label for="periodo">Período</label>
      <input type="number" class="form-control" name="periodo" placeholder="Ex.: 1/10">
    </div>
  </div>
</div>
<div class="row">
  <div class="col">
    <div class="form-group">
      <label for="dtinicio">Data de início *</label>
      <input type="text" class="form-control" name="dtinicio" placeholder="">
    </div>
  </div>
  <div class="col">
    <div class="form-group">
      <label for="dtfim">Data de conclusão</label>
      <input type="text" class="form-control" name="dtfim" placeholder="">
    </div>
  </div>
  <div class="col">
    <div class="form-group">
      <label for="instituicao_idinstituicao">Instituição</label>
      <select class="custom-select" id="instituicao_idinstituicao" name="instituicao_idinstituicao">
        <option value="" selected>Selecionar</option>
        @foreach(Helper::getInstituicoes() as $i)
        <option value="{{$i->idinstituicao}}">{{ $i->nome }}</option>
        @endforeach
      </select>
    </div>
  </div>
</div>
@if($errors->any())
<div class="card-footer">
  @foreach($errors->all() as $error)
  <div class="alert alert-danger" role="alert">
    {{$error}}
  </div>
  @endforeach
</div>
@endif
<br><button type="submit" class="btn btn-primary btn-sm">Salvar</button>
<button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
</form>
</div>
</div>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
@endsection --}}