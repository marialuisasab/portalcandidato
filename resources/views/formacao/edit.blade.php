@extends('adminlte::page')

@section('content')

<div class="card border">
  <div class= "card-body">  
    <h5>Editar formação acadêmica e cursos</h5>

    <form action="/curso/{{$curso->idcurso}}" method="POST">
    @csrf
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for = "logradouro">Nome do curso *</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome do Curso" value="{{$curso->nome}}">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="nivel_idnivel">Nível *</label>
            <select class="custom-select" id="nivel_idnivel" name="nivel_idnivel">        
               <option value = "" >Selecionar</option>
                @foreach(Helper::getNiveis() as $n)
                  <option value = "{{$n->idnivel}}" {{ $curso->nivel_idnivel == $n->idnivel ? 'selected' : '' }}>{{ $n->nome }}</option>
                @endforeach                            
            </select>             
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="categoria_idcategoria">Categoria *</label>
            <select class="custom-select" id="categoria_idcategoria" name="categoria_idcategoria">  
               <option value = "">Selecionar</option>
                @foreach(Helper::getCategorias() as $c)
                  <option value = "{{$c->idcategoria}}" {{ $curso->categoria_idcategoria == $c->idcategoria ? 'selected' : '' }}>{{ $c->nome }}</option>
                @endforeach                            
            </select>             
          </div>
      </div>
    </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="area_idarea">Área *</label>
            <select class="custom-select" id="area_idarea" name="area_idarea">        
               <option value = "" >Selecionar</option>
                @foreach(Helper::getAreas() as $a)
                  <option value = "{{$a->idarea}}" {{ $curso->area_idarea == $a->idarea ? 'selected' : '' }}>{{$a->nome }}</option>
                @endforeach                            
            </select>             
          </div>
        </div>  
        <div class="col">
          <div class="form-group">
            <label for="escolaridade">Escolaridade *</label>
            <select class="custom-select" id="escolaridade" name="escolaridade">        
                <option value = "">Selecionar</option>
                <option value = "1" {{ $curso->escolaridade == '1' ? 'selected' : ''}}>Sim</option>
                <option value = "2" {{ $curso->escolaridade == '2' ? 'selected' : ''}}>Não</option>                      
            </select>             
          </div>
        </div>  
        <div class="col">
          <div class="form-group">
            <label for = "periodo">Período</label>
            <input type="number" class="form-control" name="periodo" value="{{$curso->periodo}}">
          </div>
        </div>                    
      </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for = "dtinicio">Data de início *</label>
            <input type="text" class="form-control" name="dtinicio" placeholder="Ex.: 01/01/2010" value="{{Helper::getData($curso->dtinicio)}}">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for = "dtfim">Data de conclusão</label>
            <input type="text" class="form-control" name="dtfim" placeholder="Ex.: 01/01/2010" value="{{Helper::getData($curso->dtfim)}}">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for = "instituicao_idinstituicao">Instituição</label>
            <select class="custom-select" id="instituicao_idinstituicao" name="instituicao_idinstituicao"> 
               <option value = "" >Selecionar</option>
                @foreach(Helper::getInstituicoes() as $i)
                  <option value = "{{$i->idinstituicao}}" {{ $curso->instituicao_idinstituicao == $i->idinstituicao ? 'selected' : '' }}>{{ $i->nome }}</option>
                @endforeach                            
            </select>                 
         </div>
        </div>
      </div>
     @if($errors->any())
        <div class="card-footer">
          @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
              {{$error}}
            </div>
          @endforeach
        </div>
      @endif
      <br><button type="submit" class="btn btn-primary btn-sm">Salvar</button>
      <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
    </form>
  </div>
</div>

@endsection