<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Lista Arquivos') }}
      </h2>
  </x-slot>


  @push('styles')
  <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" rel="stylesheet">
  @endpush




<div class="row mt-4 mb-4 mr-4 ml-4">
  <div class="col-6">
    <a href="{{ route('dashboard') }}" class="btn btn-primary mb-3">Cadastrar Novo Arquivo</a>
    <h1 class="mb-2" style="font-size:22px; font-weight: bold;">Lista de Arquivos Necessaria (Tamanho maximo 2mb)</h1>
  </div>
  
  <div class="row mb-4">
  
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
<table class="table" id="minhaTabela">
    <thead>
      <tr>
        <th></th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Caminho</th>
        <th>Ver Arquivo</th>
      </tr>
    </thead>
    <tbody>
        @foreach( $data as $item)
       
        <tr>
            <td><a href="{{ route('excluirarquivo',['id'=>$item->id])}}" class="btn btn-primary btn-sm">Excluir</a></td>
           
            <td>{{Str::upper($item->nome)}}</td>
            <td>{{Str::upper($item->descricao)}}</td>
            <td>{{Str::upper($item->caminho)}}</td>
            <td><a href="{{ Storage::url("{$item->caminho}") }}" target="_blank">Ver Arquivo</a></td>
          </tr>
        url
        @endforeach
     
     
    </tbody>
  </table>
            
</div>


  @section('scripts')

 
  <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="//code.jquery.com/jquery-3.5.1.js"></script>
  <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="//cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="//cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
  <script src="//cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
  <script src="//cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script>
  <script>
    $(document).ready(function(){
        $('#minhaTabela').DataTable({
              "language": {
                  "lengthMenu": "Mostrando _MENU_ registros por página",
                  "zeroRecords": "Nada encontrado",
                  "info": "Mostrando página _PAGE_ de _PAGES_",
                  "infoEmpty": "Nenhum registro disponível",
                  "infoFiltered": "(filtrado de _MAX_ registros no total)"
              },
              dom: 'Bfrtip',
             buttons: [
              {
                extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                },
                
            },
            'colvis'
             ],
            
          });
    });
    </script>

@stop

</x-app-layout>
