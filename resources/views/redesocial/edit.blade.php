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
                    Redes Sociais
                    <span class="fa-stack fa-sm">
                      <i class="fas fa-circle fa-stack-2x"></i>
                      <i class="fas fa-hashtag fa-stack-1x fa-inverse"></i>
                    </span>

                  </h2>

                </div>


                <div class="col-xs-4 col-md-4" style="margin-left: auto; text-align: end;">
                  <div class="btn-group " role="group" aria-label="">
                    {{-- <button class=" btn btn-link">
											<a href="/curriculo/editar/{{Auth::user()->id}}" >Editar</a>
                    <span class="fa fa-edit" style="font-size: 25px; text-align: center;"></span>

                    </button> --}}

                    <button class=" btn btn-secondary" type="button" style="margin-top: 10px;">
                      <a href="" style="color: white;">Voltar<span class="fas fa-undo"
                          style="padding-left: 15px;"></span></a>
                    </button>
                  </div>
                </div>
              </div>
            </div>


          </div>


          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body" style="box-sizing: border-box;">

              <ul style="list-style-type: none;">


                <form action="/redesocial/{{$id}}" method="POST">
                  @csrf
                  @foreach(Helper::getRedes() as $key => $rs)
                  <div class="form-group">
                    <li><strong> {{$rs->nome}}:&nbsp;&nbsp;&nbsp;</strong>
                      <input type="hidden" name="redesocial_idredesocial[]" value="{{$rs->idredesocial}}">
                      <input type="text" class="form-control {{ $errors->has('link') ? 'is-invalid' : ''}}"
                        name="link[]" placeholder="Link"
                        value="{{$redes[$key]->redesocial_idredesocial == $rs->idredesocial ? $redes[$key]->link : ''}}">
                      @if($errors->has('link'))
                      <div class="invalid-feedback">
                        {{$errors->first('link')}}
                      </div>
                      @endif
                    </li>
                  </div>
                  <hr>

                  @endforeach
                  <br>
                  <button type="submit" class="btn btn-primary">Salvar<span class="fas fa-save"
                      style="padding-left: 15px;"></button>
                  <button class=" btn btn-danger" style="color:red;" type="cancel">
                    <a href="cancel" style="color: white;">Cancelar<span class="fas fa-window-close"
                        style="padding-left: 15px;"></span></a>
                  </button>
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