
   

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
        <th>CODITO</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>CPF</th>
        <th>TELEFONE</th>
        <th>CEP</th>
        <th>CNPJ</th>
        <th>TITULO DE ELEITOR</th>
        <th>LOGRADOURO</th>
        <th>COMPLEMENTO</th>
        <th>BAIRRO</th>
        <th>LOCALIDADE</th>
        <th>ESTADO</th>
        <th>TIPO</th>
        <th>REGIAO</th>
        <th>CNES</th>
        <th>REGISTRO CONSELHO</th>
        <th>REPRENSENTATIVIDADE</th>


      </tr>
    </thead>
    <tbody>
        @foreach( $data as $item)
       
        <tr>
          <td>{{Str::upper($item->id)}}</td>
            <td>{{Str::upper($item->name)}}</td>
            <td>{{Str::upper($item->email)}}</td>
            <td>{{Str::upper($item->cpf)}}</td>
            <td>{{Str::upper($item->telefone)}}</td>
            <td>{{Str::upper($item->cep)}}</td>
            <td>{{Str::upper($item->cnpj)}}</td>
            <td>{{Str::upper($item->tituloeleitor)}}</td>
            <td>{{Str::upper($item->logradouro)}}</td>
            <td>{{Str::upper($item->complemento)}}</td>
            <td>{{Str::upper($item->bairro)}}</td>
            <td>{{Str::upper($item->localidade)}}</td>
            <td>{{Str::upper($item->uf)}}</td>
            <td>{{Str::upper($item->tipo)}}</td>
            <td>{{Str::upper($item->regiao)}}</td>
            <td>{{Str::upper($item->cnes)}}</td>
            <td>{{Str::upper($item->registrocc)}}</td>
            <td>{{Str::upper($item->modalidade)}}</td>
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
