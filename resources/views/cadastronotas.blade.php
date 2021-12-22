<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastro de Notas') }}
           
        </h2>
      
    </x-slot>
    
   <div class="container">
    <form class="mt-5" action="{{route('storenotas',['id'=>$inscricao->id])}}" method="post">
   
      @csrf
       
       
              
              <div class="row">
                 <div class="mb-3 col-6">
                   
                    <label for="Nota Fase 1" class="form-label">Nota Fase 1 </label>
                    <input type="number" class="form-control" min="0" max="100" id="nota1" name="nota1" value="{{ $inscricao->nota1}}" >
                    @if($errors->has('nota1'))
                      <div class="error">{{ $errors->first('nota1') }}</div>
                    @endif
                  </div>

                  <div class="mb-3 col-6">
                   
                    <label for="Nota Fase 2" class="form-label">Nota Fase 2 </label>
                    <input type="number" class="form-control" min="0" max="100"    id="nota2" name="nota2" value="{{ $inscricao->nota2}}">
                    @if($errors->has('nota2'))
                      <div class="error">{{ $errors->first('nota2') }}</div>
                    @endif
                  </div>
                  <div class="mb-3 col-6">
                   
                    <label for="Nota Fase Final" class="form-label">Nota Fase Final </label>
                    <input type="number" class="form-control"  min="0" max="100"  id="notafinal" name="notafinal" value="{{ $inscricao->notafinal}}">
                    @if($errors->has('notafinal'))
                      <div class="error">{{ $errors->first('notafinal') }}</div>
                    @endif
                  </div>

                </div>

                 


                

                  <button class="btn btn-danger mt-10" style="display:inline"  type="submit">Atualizar Nota</button>
                  
           
        </form>
    </div>



</x-app-layout>