@extends('adminlte::page')


@section('content')

<div class="card border">
    <div class= "card-body">  
      <h5>Contato - Suporte Técnico</h5>


        <form action="{{route('enviaremail')}}" method="post">
            @csrf        
            <div class="form-group">
                <label>Nome</label>
                <input input type="text" name="nome" class="form-control" value="{{Auth::user()->name}}" readonly>
            </div>         
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" readonly >
            </div>   
            <div class="form-group">
                <label>Telefone de Contato</label>
                <input type="text" id="phone_contact" name="telefone" class="form-control">
            </div>           
            <div class="form-group">
                <label>Mensagem</label>
                <textarea rows="6" class="form-control" name="mensagem" style="height:100px;"></textarea>
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary">Enviar</button>
            </div>
        </form>    
    </div>
</div>

@endsection