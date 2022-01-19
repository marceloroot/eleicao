<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edição dados so poderar ocoorer até o dia 07/02/2022') }}
       
         
      </h2>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Campos com <span style="color:red">*</span> sao obrigatório
        @error('mairo2mb')
         <p>{{ $message }}</p>
        @enderror
    </h2>

  
  </x-slot>
 
  <div class="row mt-4 mb-4 mr-4 ml-4">
  <div class="row ">
    <h1 class="mb-2" style="font-size:22px; font-weight: bold;">Lista de Arquivos Necessaria (Tamanho maximo 2mb)</h1>
    <div class="col-3">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Prestadores de Serviço
        </a>
        <a href="#" class="list-group-item list-group-item-action">Comprovante de residência</a>
        <a href="#" class="list-group-item list-group-item-action">Contrato de Prestação de Serviço SUS</a>
        <a href="#" class="list-group-item list-group-item-action">CNES</a>
        <a href="#" class="list-group-item list-group-item-action">Ofício de indicação da instituição com o nome do representante</a>
      </div>
    </div>

    <div class="col-3">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Entidades da Sociedade Civil 
        </a>
        <a href="#" class="list-group-item list-group-item-action">Comprovante de endereço</a>
        <a href="#" class="list-group-item list-group-item-action">Estatuto</a>
        <a href="#" class="list-group-item list-group-item-action">Ata de eleição da diretoria atual</a>
        <a href="#" class="list-group-item list-group-item-action"> Ofício de indicação do eleitor e respectivo  suplente que representarão a entidade</a>
      </div>
    </div>

    <div class="col-3">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Usuários
        </a>
        <a href="#" class="list-group-item list-group-item-action">CPF/RG</a>
        <a href="#" class="list-group-item list-group-item-action"> Comprovante de endereço </a>
        <a href="#" class="list-group-item list-group-item-action">Cartão do SUS  </a>
      </div>
    </div>



    
    <div class="col-3">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Trabalhadores da Saúde
        </a>
        <a href="#" class="list-group-item list-group-item-action">CPF/RG</a>
        <a href="#" class="list-group-item list-group-item-action">Comprovante de residência</a>
        <a href="#" class="list-group-item list-group-item-action">Registro no Conselho de Classe </a>
      </div>
    </div>

 
  
</div>
</div>
      <div class="container">
   
         <form class="mt-5" method="POST" action="{{ route('storearquivo') }}" enctype="multipart/form-data">
         @csrf

                       <div class="row">
                              <div class="mb-3 col-6">      
                                  <label for="nome" class="form-label">Nome <span style="color:red">*</span> </label>
                                  <input type="text" class="form-control" required  id="nome" name="nome">
                                  @if($errors->has('nome'))
                                    <div class="error">{{ $errors->first('nome') }}</div>
                                  @endif
                              </div>
      
                              <div class="mb-3 col-6">      
                                  <label for="Descricao" class="form-label">Descricao <span style="color:red">*</span> </label>
                                  <input type="text" class="form-control"  id="descricao" name="descricao">
                                  @if($errors->has('descricao'))
                                    <div class="error">{{ $errors->first('descricao') }}</div>
                                  @endif
                              </div>

                              <div class="mb-3 col-6">      
                              
                                <input type="file" name="arquivo" id="arquivo">
                                @if($errors->has('mairo2mb'))
                                  <div class="error">{{ $errors->first('mairo2mb') }}</div>
                                @endif
                            </div>
                         </div>
                        

                     <button class="btn btn-danger mt-4 mb-2" style="display:inline"  type="submit">Salvar Documentos</button>
                     
              
           </form>
       </div>
   
   
   @section('scripts')
   
   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" crossorigin="anonymous"></script>
   
   <script>
   
   
  

   
 
   </script>
   
   @stop
   </x-guest-layout>