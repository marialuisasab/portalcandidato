@extends('adminlte::page')

@section('content')

  <div class="card border">
    <div class= "card-body">  
      <h5>Editar Redes Sociais</h5>
    
      <form action="/redesocial/{{$id}}" method="POST">
        @csrf
        @foreach(Helper::getRedes() as $key => $rs)        
        <div class="form-group">
          <label for = "redesocial_idredesocial">{{$rs->nome}}</label>
          <input type="hidden" name="redesocial_idredesocial[]" value="{{$rs->idredesocial}}">  
          <input type="text" class="form-control {{ $errors->has('link') ? 'is-invalid' : ''}}" name="link[]" placeholder="Link" value="{{$redes[$key]->redesocial_idredesocial == $rs->idredesocial ? $redes[$key]->link : ''}}">      
          @if($errors->has('link'))
            <div class="invalid-feedback">
              {{$errors->first('link')}}
            </div>
          @endif         
        </div> 
        <hr>    
        
        @endforeach            
        <br>
        <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
        <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
      </form>
    </div>
  </div>
@endsection

