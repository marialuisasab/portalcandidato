@extends('adminlte::page')


{{-- importação do jquery --}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>

{{-- importação do arquivo JS --}}
<script src="/js/Experiencia/experiencia.js"></script>

@section('content')




<div class="row">

  <div class="col-xs-1 col-md-1">


  </div>

  <div class="col-xs-10 col-md-10">

    <div id="accordion" style="margin-top: 40px;">
      <div class="card-border-light">
        <div class="card-header" id="headingOne" style="background-color: aliceblue;">
          <div class="container">
            <div class="row">
              <div class="col-sm">
                <h2 class="mb-0" style="color:dodgerblue;">

                  Experiências Profissionais
                  <span class="fa-stack fa-sm">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fas fa-user-tie fa-stack-1x fa-inverse"></i>
                  </span>

                </h2>

              </div>


              <div class="col-xs-7 col-md-2" style="margin-left: auto; margin-top:7px;">
                <div class="btn-group " role="group" aria-label="">

                  <button class=" btn btn-link" style="color:GRAY; margin-left: auto;" type="cancel">
                    <a href="/home" style="color:gray;"><span class="fas fa-undo"
                        style="font-size: 25px; text-align: center;">Voltar</span></a>


                  </button>
                </div>
              </div>
            </div>
          </div>


        </div>


        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body" style="box-sizing: border-box;">

            <ul style="list-style-type: none;">


              <form action="/experiencia" method="POST">
                @csrf
                <div class="form-group">
                  <li><strong> NOME DA EMPRESA:*&nbsp;&nbsp;&nbsp;</strong>
                    <input type="text" class="form-control {{ $errors->has('empresa') ? 'is-invalid' : ''}}"
                      name="empresa">
                    @if($errors->has('empresa'))
                    <div class="invalid-feedback">
                      {{$errors->first('empresa')}}
                    </div>
                    @endif
                  </li>
                </div>

                <div class="form-group">
                  <li><strong> DATA DE INÍCIO:*&nbsp;&nbsp;&nbsp;</strong>
                    <input type="date" class="form-control {{ $errors->has('dtinicio') ? 'is-invalid' : ''}}"
                      name="dtinicio">
                    @if($errors->has('dtinicio'))
                    <div class="invalid-feedback">
                      {{$errors->first('dtinicio')}}
                    </div>
                    @endif
                  </li>
                </div>

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


                <div class="form-group" style="display: none;" id="datatermino">
                  <li><strong> DATA DE SAÍDA:*&nbsp;&nbsp;&nbsp;</strong>
                    <input type="date" class="form-control" name="dtfim">
                  </li>
                </div>

                <div class="form-group">
                  <li><strong>CARGO:*&nbsp;&nbsp;&nbsp;</strong>
                    <input type="text" class="form-control {{ $errors->has('cargo') ? 'is-invalid' : ''}}" name="cargo">
                    @if($errors->has('cargo'))
                    <div class="invalid-feedback">
                      {{$errors->first('cargo')}}
                    </div>
                    @endif
                  </li>
                </div>

                <div class="form-group">
                  <li><strong>DESCRIÇÃO DAS ATIVIDADES:*&nbsp;&nbsp;&nbsp;</strong>
                    <textarea class="form-control {{ $errors->has('atividades') ? 'is-invalid' : ''}}" name="atividades"
                      id="atividades" rows="3"></textarea>
                    @if($errors->has('atividades'))
                    <div class="invalid-feedback">
                      {{$errors->first('atividades')}}
                    </div>
                    @endif
                  </li>
                </div>

                <br>
                <div class="form-group" style="text-align: end;">
                  <button type="submit" class="btn btn-link" style="color: dodgerblue; font-size:25px;"><span
                      class="fas fa-save">Salvar</button>
                  <button class=" btn btn-link" style="color:red;" type="cancel">
                    <a href="cancel" style="color: red;"><span class="fas fa-window-close"
                        style="font-size: 25px; text-align: center;">Cancelar</span></a>
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




























































{{-- 

<div class="card border">
  <div class="card-body">
    <h5>Cadastrar experiência profissional</h5>

    <form action="/experiencia" method="POST">
      @csrf
      <div class="form-group">
        <label for="empresa">Nome da empresa *</label>
        <input type="text" class="form-control {{ $errors->has('empresa') ? 'is-invalid' : ''}}" name="empresa">
@if($errors->has('empresa'))
<div class="invalid-feedback">
  {{$errors->first('empresa')}}
</div>
@endif
</div>
<div class="form-group">
  <label for="dtinicio">Data de início*</label>
  <input type="text" class="form-control {{ $errors->has('dtinicio') ? 'is-invalid' : ''}}" name="dtinicio">
  @if($errors->has('dtinicio'))
  <div class="invalid-feedback">
    {{$errors->first('dtinicio')}}
  </div>
  @endif
</div>
<div class="form-group">
  <label for="dtfim">Data de término</label>
  <input type="text" class="form-control" name="dtfim">
</div>

<div class="form-group">
  <label for="cargo">Cargo *</label>
  <input type="text" class="form-control {{ $errors->has('cargo') ? 'is-invalid' : ''}}" name="cargo">
  @if($errors->has('cargo'))
  <div class="invalid-feedback">
    {{$errors->first('cargo')}}
  </div>
  @endif
</div>
<div class="form-group">
  <label for="atividades">Atividades</label>
  <textarea class="form-control {{ $errors->has('atividades') ? 'is-invalid' : ''}}" name="atividades" id="atividades"
    rows="3"></textarea>
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
</div> --}}
@endsection