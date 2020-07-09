@extends('adminlte::page')

{{-- importação do jquery --}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>

{{-- importação do arquivo JS --}}
<script src="/js/Experiencia/experiencia.js"></script>

@section('content')

@section('content')





<div class="container">



  <div class="row">

    <div class="col-xs-1 col-md-1">


    </div>

    <div class="col-xs-10 col-md-10">

      <div id="accordion" style="margin-top: 40px;">

        <div class="card-border-light">
          <div class="card-border-light">
            <div class="card-header" id="headingOne" style="background-color: aliceblue;">
              <div class="container">

                <div class="row">
                  <div class="col-xs-6 col-md-6">
                    <h2 class="mb-0" style="color:dodgerblue; text-align: center;">
                      Experiências Profissionais
                      <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-user-tie fa-stack-1x fa-inverse"></i>
                      </span>
                    </h2>
                  </div>


                  <div class="col-xs-6 col-md-2" style="margin-left: auto; margin-top: 25px;">
                    <button class=" btn btn-secondary" type="cancel" title="Voltar">
                      <a href="/experiencias" style="color: white;">Voltar<span class="fas fa-undo"
                          style="padding-left: 15px;"></span></a>
                    </button>
                  </div>

                </div>
              </div>
            </div>


            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body">

                <ul style="list-style-type: none;">
                  <form action="/experiencia/{{$exp->idexperiencia}}" method="POST">
                    @csrf

                    <div class="form-group">
                      <li><strong> NOME DA EMPRESA:*&nbsp;&nbsp;&nbsp;</strong>
                        <input type="text" class="form-control {{ $errors->has('empresa') ? 'is-invalid' : ''}}"
                          name="empresa" value="{{$exp->empresa}}" title="Nome da Empresa">
                        @if($errors->has('empresa'))
                        <div class="invalid-feedback">
                          {{$errors->first('empresa')}}
                        </div>
                        @endif
                      </li>
                    </div>

                    <div class="form-group">
                      <li><strong> DATA DE INICIO:*&nbsp;&nbsp;&nbsp;</strong>
                        <input type="date" class="form-control {{ $errors->has('dtinicio') ? 'is-invalid' : ''}}"
                          name="dtinicio" value="{{$exp->dtinicio}}" title="Data de Inicio">
                        @if($errors->has('dtinicio'))
                        <div class="invalid-feedback">
                          {{$errors->first('dtinicio')}}
                        </div>
                        @endif
                      </li>
                    </div>



                    @if ($exp->dtfim == null)
                    <div class="form-group">
                      <li><strong>TRABALHA NESTA EMPRESA ATUALMENTE!?&nbsp;&nbsp;&nbsp;</strong><span> </span>
                        <div class="form-check form-check-inline" id="idtrabalhoatual" name="idtrabalhoatual">
                          <input class="form-check-input" type="radio" name="trabalho" id="trabalho" value="1">
                          Sim&nbsp;&nbsp;&nbsp;

                          {{-- <label class="form-check-label">Sim&nbsp;&nbsp;&nbsp;</label> --}}
                          <input class="form-check-input" type="radio" name="trabalho" id="trabalho" value="2"> Não
                          {{-- <label class="form-check-label">Não</label> --}}
                        </div>
                      </li>
                    </div>
                    @else
                    @endif


                    @if ($exp->dtfim == null)
                    <div class="form-group" style="display: none;" id="datatermino">
                      <li><strong> DATA DE SAÍDA:*&nbsp;&nbsp;&nbsp;</strong>
                        <input type="date" class="form-control" name="dtfim" value="{{Helper::getData($exp->dtfim)}}"
                          title="Data de Saída">
                      </li>
                    </div>
                    @else
                    <div class="form-group" id="datatermino">
                      <li><strong> DATA DE SAÍDA:*&nbsp;&nbsp;&nbsp;</strong>
                        <input type="date" class="form-control" name="dtfim" value="{{$exp->dtfim}}"
                          title="Data de Saída">
                      </li>
                    </div>
                    @endif


                    <div class="form-group">
                      <li><strong> CARGO:*&nbsp;&nbsp;&nbsp;</strong>
                        <input type="text" class="form-control {{ $errors->has('cargo') ? 'is-invalid' : ''}}"
                          name="cargo" value="{{$exp->cargo}}" title="Cargo Exercido">
                        @if($errors->has('cargo'))
                        <div class="invalid-feedback">
                          {{$errors->first('cargo')}}
                        </div>
                        @endif
                      </li>
                    </div>

                    <div class="form-group">
                      <li><strong> DESCRIÇÃO DAS ATIVIDADES:&nbsp;&nbsp;&nbsp;</strong>
                        <textarea class="form-control {{ $errors->has('atividades') ? 'is-invalid' : ''}}"
                          name="atividades" id="atividades" rows="3"
                          title="Descrição das Atividades">{{$exp->atividades}}</textarea>
                        @if($errors->has('atividades'))
                        <div class="invalid-feedback">
                          {{$errors->first('atividades')}}
                        </div>
                        @endif
                      </li>
                    </div>

                    <br>
                    <div class="form-group" style="text-align: end;">
                      <button type="submit" class="btn btn-primary" id="botaosalvarend"
                        title="Concluir Alterações">Salvar<span class="fas fa-save"
                          style="padding-left: 15px;"></button>
                      <button class=" btn btn-danger" style="color:red;" type="cancel">
                        <a href="/experiencias" style="color: white;" title="Cancelar Alterações">Cancelar<span
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
      <div class=" col-xs-1 col-md-1">
      </div>

    </div>
  </div>

  @endsection























  {{-- 
  <div class="card border">
    <div class="card-body">
      <h5>Editar experiência profissional</h5>

      <form action="/experiencia/{{$exp->idexperiencia}}" method="POST">
  @csrf

  <div class="form-group">
    <label for="empresa">Nome da empresa *</label>
    <input type="text" class="form-control {{ $errors->has('empresa') ? 'is-invalid' : ''}}" name="empresa"
      value="{{$exp->empresa}}">
    @if($errors->has('empresa'))
    <div class="invalid-feedback">
      {{$errors->first('empresa')}}
    </div>
    @endif
  </div>
  <div class="form-group">
    <label for="dtinicio">Data de início*</label>
    <input type="text" class="form-control {{ $errors->has('dtinicio') ? 'is-invalid' : ''}}" name="dtinicio"
      value="{{Helper::getData($exp->dtinicio)}}">
    @if($errors->has('dtinicio'))
    <div class="invalid-feedback">
      {{$errors->first('dtinicio')}}
    </div>
    @endif
  </div>
  <div class="form-group">
    <label for="dtfim">Data de término</label>
    <input type="text" class="form-control" name="dtfim" value="{{Helper::getData($exp->dtfim)}}">
  </div>
  <div class="form-group">
    <label for="cargo">Cargo *</label>
    <input type="text" class="form-control {{ $errors->has('cargo') ? 'is-invalid' : ''}}" name="cargo"
      value="{{$exp->cargo}}">
    @if($errors->has('cargo'))
    <div class="invalid-feedback">
      {{$errors->first('cargo')}}
    </div>
    @endif
  </div>
  <div class="form-group">
    <label for="atividades">Atividades</label>
    <textarea class="form-control {{ $errors->has('atividades') ? 'is-invalid' : ''}}" name="atividades" id="atividades"
      rows="3">{{$exp->atividades}}</textarea>
    @if($errors->has('atividades'))
    <div class="invalid-feedback">
      {{$errors->first('atividades')}}
    </div>
    @endif
  </div>

  <br><button type="submit" class="btn btn-primary btn-sm">Salvar</button>
  <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
  </form>
</div>
</div>
@endsection --}}