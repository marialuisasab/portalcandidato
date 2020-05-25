@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">Dashboard do Usuário</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Você está logado como usuário!
                </div>
                <div class="card-body">
                    @if(Auth::user()->foto != null)
                        <img src="{{url('storage/fotos/'.Auth::user()->foto)}}" alt="{{Auth::user()->name}}" style="max-width: 200px;">
                    @endif
                </div>                     
                <div class="card-body">           
                    <a href="{{route('curriculo.dados')}}">Dados Pessoais</a><br>
                    <a href="{{route('home')}}">Endereço</a><br>
                    <a href="{{route('home')}}">Idiomas</a><br>
                    <a href="{{route('home')}}">Experiência Profissional</a><br>
                    <a href="{{route('home')}}">Formação e Cursos</a><br>
                    <a href="{{route('home')}}">Redes Sociais</a><br>
                    <a href="{{route('home')}}">Acompanhar Vagas</a><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
