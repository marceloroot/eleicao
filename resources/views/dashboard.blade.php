<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edição dados so poderar ocoorer até o dia 20/01/2022') }}
         
      </h2>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Campos com <span style="color:red">*</span> sao obrigatório
       
    </h2>
  </x-slot>
 
    
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
                                @if($errors->has('arquivo'))
                                  <div class="error">{{ $errors->first('arquivo') }}</div>
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