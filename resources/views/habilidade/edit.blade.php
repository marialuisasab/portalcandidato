@extends('adminlte::page')

@section('content')

  <div class="card border">
    <div class= "card-body">  
      <h5>Cadastrar habilidades e ferramentas</h5>

      <form action="/habilidade/{{$hab->idhabilidade}}" method="POST">
        @csrf
        <div class="form-group">
          <label for = "tipo">Categoria *</label>
          <select class="custom-select" id="tipo" name="tipo_idtipo">
            <option value="">Selecione</option>
            @foreach(Helper::getTiposHab() as $tp)
              <option value="{{$tp->idtipo}}" {{$hab->tipo_idtipo == $tp->idtipo ? 'selected' : '' }}>{{$tp->nome}}</option>
            @endforeach
          </select>
        </div> 
        <div class="form-group">
          <label for = "nome">Descrição *</label>
          <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : ''}}" name="nome" value="{{$hab->nome}}">
          @if($errors->has('nome'))
            <div class="invalid-feedback">
              {{$errors->first('nome')}}
            </div>
          @endif         
        </div>
        <div class="form-group">
          <label for = "nivel">Nível de Conhecimento *</label>
          <select class="custom-select" id="nivel" name="nivel">
            <option value="">Selecionar</option>             
            <option value="1"{{$hab->nivel == 1 ? 'selected' : '' }}>Básico</option>   
            <option value="2"{{$hab->nivel == 2 ? 'selected' : '' }}>Intermediário</option> 
            <option value="3"{{$hab->nivel == 3 ? 'selected' : '' }}>Avançado</option>       
          </select>
        </div>      
       
        <br>
        <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
        <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
      </form>
    </div>
  </div>
@endsection

