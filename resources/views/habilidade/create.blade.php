@extends('adminlte::page')

@section('content')

  <div class="card border">
    <div class= "card-body">  
      <h5>Cadastrar habilidades e ferramentas</h5>

      <form action="/habilidade" method="POST">
        @csrf
        <div class="form-group">
          <label for = "tipo">Categoria *</label>
          <select class="custom-select" id="tipo" name="tipo_idtipo">
            <option value="" selected>Selecione</option>
            @foreach(Helper::getTiposHab() as $tp)
              <option value="{{$tp->idtipo}}">{{$tp->nome}}</option>
            @endforeach
          </select>
        </div> 
        <div class="form-group">
          <label for = "nome">Descrição *</label>
          <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : ''}}" name="nome" placeholder="Ex.: Inglês">
          @if($errors->has('nome'))
            <div class="invalid-feedback">
              {{$errors->first('nome')}}
            </div>
          @endif         
        </div>
        <div class="form-group">
          <label for = "nivel">NÍVEL *</label>
          <select class="custom-select" id="nivel" name="nivel">
            <option value="" selected>Selecionar</option>             
            <option value="1">Básico</option>   
            <option value="2">Intermediário</option> 
            <option value="3">Avançado</option>        
          </select>
        </div>      
       
        <br><button type="submit" class="btn btn-primary btn-sm">Salvar</button>
        <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
      </form>
    </div>
  </div>
@endsection

