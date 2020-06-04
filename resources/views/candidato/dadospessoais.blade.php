@extends('adminlte::page')


@section('content')


 {{-- <form  method="post" action="{{ route('users.store') }}"> @csrf --}}
 <form  method="post" action=""> @csrf
    {{-- <form>
      <div class="form">

      <div class="form-group">
        <label for="inputNome">Nome:</label>
        <input type="text" class="form-control" id="inputName" placeholder="Nome do procedimento">
      </div>
      <div class="form-group">
        <label for="inputPrecço">Preço</label>
        <input type="text" class="form-control" id="inpuPreço" placeholder="Preço do procedimento">
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputDataCria">Data de criação</label>
          <input type="text" class="form-control" id="inputData Cria">
        </div>
        <div class="form-group col-md-4">
          <label for="inputDadaAtua">Data de atualização</label>
            <input type="text" class="form-control" id="inputDadaAtua ">

            <option>...</option>
          </select>
        </div>
    </form> --}}

    <div class="container">

    <div class="row">
        <div class="col-md-3 col-md-3"></div>
        <div class="col-md-6 col-md-6">
         <div class="form-group">
   <h5 >Bem vindo {{auth::user()->name}}, Insira os seus dados pessoais!!!</h5>
  </div>
</div>
  <div class="col-md-1 col-md-1">
             
        </div>
        <div class="col-md-2 col-md-2">
              <a  class="btn btn-secondary" href="{{ route('home') }}">Voltar</a>
      <input class ="btn btn-primary"type="submit" name="btnSalvar" value="Salvar">
        </div>
    </div>
 


    <div class="row">
        <div class="col-md-1 col-md-1"></div>
        <div class="col-md-4 col-md-4" style="border-style: ridge;">

<div class="form"  style="font-family: Palatino Linotype, Book Antiqua, Palatino, serif">

   
  <div class="form-group">
    <label for="nome" style="font-family: Palatino Linotype, Book Antiqua, Palatino, serif">Nome:</label>
    <input type="text" name="nome"class="form-control" id="inpuIDProc" placeholder="Insira seu nome completo">
  </div>
  <div class="form-group">
    <label for="cpf">CPF:</label>
    <input type="number" name="cpf"class="form-control" id="cpf" placeholder="Insira o seu CPF">
  </div>
    <div class="form-group">
    <label for="RG">RG:</label>
    <input type="text" name="RG"class="form-control" id="RG" placeholder="Insira o codigo de sua identidade">
  </div>
   <div class="form-group">
    <label for="datanascimento">Data de Nascimento:</label>
    <input type="date" name="datanascimento"class="form-control" id="datanascimento" placeholder="Insira a data do seu nascimento">
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" name="email"class="form-control" id="RG" placeholder="exemplo@exemplo.com">
  </div>
   <div class="form-group">
    <label for="nomepai">Nome do Pai:</label>
    <input type="text" name="nomepai"class="form-control" id="nomepai" placeholder="Insira o nome do seu pai">
  </div>
  <div class="form-group">
    <label for="nomemae">Nome da Mãe:</label>
    <input type="text" name="nomemae"class="form-control" id="nomemae" placeholder="Insira o nome da sua mãe">
  </div>
  
 
{{--   

  <div class="form-group">
  <select name="type" id="type" class="form-control">
   <option value="1">Auth 1</option>
   <option value="2">Auth 2</option>
   <option value="3">Auth 3</option>
   </select>
 </div> --}}

  </div>
        </div>

<div class="col-md-1 col-md-1"></div>

     <div class="col-md-4 col-md-4" style="border-style: ridge;">
         <div class="form"  style="font-family: Palatino Linotype, Book Antiqua, Palatino, serif">
     
    <div class="form-group">
    <label for="ctpsnum">Numero da CTPS:</label>
    <input type="number" name="ctps"class="form-control" id="ctpsnum" placeholder="Insira o numero da sua CTPS">
  </div>
  <div class="form-group">
    <label for="ctpsserie">Serie da CTPS:</label>
    <input type="text" name="ctps"class="form-control" id="ctpsserie" placeholder="Insira a serie da sua CTPS">
  </div>
   
    <div class="form-group">
    <label for="catcnh">Cateira de motorista:</label>
    <input type="text" name="catcnh"class="form-control" id="catcnh" placeholder="Insira o...da sua cnh">
  </div>
   <div class="form-group">
    <label for="ufcnh">Cateira de motorista:</label>
    <input type="text" name="ufcnh"class="form-control" id="ufcnh" placeholder="Insira o estado da sua cnh">
  </div>
  <div class="form-group">
    <label for="cnh">Cateira de motorista:</label>
    <input type="text" name="cnh"class="form-control" id="cnh" placeholder="Insira a sua cnh">
  </div>
</div>
</div>

<div class="col-md-1 col-md-1"></div>
    </div>


    <div class="row">


        <div class="colxs-4 col-md-4"></div>
        <div class="col-xs-2 col-md-2">
            <a class="fas fa-arrow-circle-right"href="#"><em><strong>Proximo</strong></em></a>
        </div>

        <div class="col-md-2 col-md-2">
            <a class="fas fa-arrow-circle-left"href="#"><em><strong>Anterior</strong></em></a>
        </div>

          <div class="colxs-4 col-md-4"></div>
    </div>
    </div>


  </form>



 
 


    
@endsection