@extends('adminlte::page')

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>

{{-- importação do arquivo JS --}}
<script src="/js/RedesSociais/RedesScociais.js"></script>
@section('content')


<div class="container">



  <div class="row">

    <div class="col-xs-1 col-md-1">


    </div>

    <div class="col-xs-10 col-md-10">

      <div id="accordion" style="margin-top: 40px;">
        <div class="card-border-light">
          <div class="card-header" id="headingOne" style="background-color: white;">
            <div class="container">
              <div class="row">
                <div class="col-sm">
                  <h2 class="mb-0" style="color:dodgerblue; font-size: 25px;">
                    Redes Sociais
                    <span class="fa-stack fa-sm">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fas fa-hashtag fa-stack-1x fa-inverse"></i>
                    </span>
                  </h2>
                </div>

                <div class="col-xs-8 col-2" style="margin-left: auto; text-align: end;">
                  <div class="btn-group btn-sm " role="group" aria-label="">
                    <button class=" btn btn-success btn-sm" style="height:30px; margin-top: 10px; width:70px;"
                      title="Vagas">
                      <a href="/vagas" style="color:white;">Vagas</a>
                      <span class="fas fa-bullhorn" style="padding-left: 5px; color:white; font-size:9px;"></span>
                    </button>

                    <button class=" btn btn-secondary btn-sm" type="button"
                      style="height:30px; margin-top: 10px; width:70px;">
                      <a href="/redessociais" style="color: white;">Voltar<span class="fas fa-undo"
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


                <form action="/redesocial/{{$id}}" method="POST" id="idsubmitredes">
                  @csrf
                  @foreach(Helper::getRedes() as $key => $rs)
                  <div class="form-group">
                    <li><strong> {{$rs->nome}}:&nbsp;&nbsp;&nbsp;</strong>
                      <input type="hidden" name="redesocial_idredesocial[]" value="{{$rs->idredesocial}}">
                      <input type="text" class="form-control {{ $errors->has('link') ? 'is-invalid' : ''}}"
                        name="link[]" placeholder="Link" title="Link do Perfil no {{$rs->nome}}"
                        value="{{$redes[$key]->redesocial_idredesocial == $rs->idredesocial ? $redes[$key]->link : ''}}">
                      @if($errors->has('link'))
                      <div class="invalid-feedback">
                        {{$errors->first('link')}}
                      </div>
                      @endif
                    </li>
                  </div>


                  @endforeach
                  <br>
                  <div class="form-group" style="text-align: end;">
                    <button type="submit" class="btn btn-primary" id="idsalvarredes">Salvar<span class="fas fa-save"
                        style="padding-left: 15px;"></button>
                    <button class=" btn btn-danger" style="color:red;" type="cancel">
                      <a href="/redessociais" style="color: white;">Cancelar<span class="fas fa-window-close"
                          style="padding-left: 15px;"></span></a>
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