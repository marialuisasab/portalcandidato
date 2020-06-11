@extends('adminlte::page')

@section('content')

  <div class="card border">
    <div class= "card-body">  
      <h5>Editar experiência profissional</h5>

      <form action="/experiencia/{{$exp->idexperiencia}}" method="POST">
        @csrf
      
        <div class="form-group">
          <label for = "empresa">Nome da empresa *</label>
          <input type="text" class="form-control {{ $errors->has('empresa') ? 'is-invalid' : ''}}" name="empresa" value="{{$exp->empresa}}">
          @if($errors->has('empresa'))
            <div class="invalid-feedback">
              {{$errors->first('empresa')}}
            </div>
          @endif         
        </div>      
        <div class="form-group">
          <label for="dtinicio">Data de início*</label>
           <input type="text" class="form-control {{ $errors->has('dtinicio') ? 'is-invalid' : ''}}" name="dtinicio" value="{{Helper::getData($exp->dtinicio)}}">
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
           <input type="text" class="form-control {{ $errors->has('cargo') ? 'is-invalid' : ''}}" name="cargo" value="{{$exp->cargo}}">
            @if($errors->has('cargo'))
              <div class="invalid-feedback">
                {{$errors->first('cargo')}}
              </div>
          @endif            
        </div> 
        <div class="form-group">
          <label for="atividades">Atividades</label>          
          <textarea class="form-control {{ $errors->has('atividades') ? 'is-invalid' : ''}}" name="atividades"  id = "atividades" rows="3">{{$exp->atividades}}</textarea>
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
@endsection

