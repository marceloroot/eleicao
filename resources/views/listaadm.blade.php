
   

<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Lista Registro') }}
      </h2>
  </x-slot>


  @push('styles')
  <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" rel="stylesheet">
  @endpush




<div class="row mt-4 mb-4 mr-4 ml-4">

<table class="table" id="minhaTabela">
    <thead>
      <tr>
    
        <th>Nome</th>
        <th>CPF</th>
        <th>Tipo</th>
        <th>Regiao</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach( $data as $item)
       
        <tr>
           
            <td>{{Str::upper($item->name)}}</td>
            <td>{{Str::upper($item->cpf)}}</td>
            <td>{{Str::upper($item->tipo)}}</td>
            <td>{{Str::upper($item->regiao)}}</td>
            <td><a href="{{ route('listaarquivoadm',['id'=>$item->id]) }}" >Ver Arquivos</a></td>
          </tr>
       
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
