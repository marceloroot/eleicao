<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comprovante</title>

    

   

</head>
<body>
   <div style="flex:1">
    <div sytle="flex-direction: row">
      <img src="https://www.novaconcursos.com.br/portal/wp-content/uploads/2015/07/Prefeitura-de-alfenas.jpg" style="max-width:80px;max-height:80px; margin-top:15px" />
      <span style="font-size:28px; font-weight: bold;"> Prefeitura Municipal de Alfenas</span>
    </div>
     <h2>COMPROVANTE DE NUMERO: {{$data->id}}</h2>
    <h3>NOME: {{  Str::upper($data->name) }}</h3>
    <h3>CPF: {{ Str::upper($data->cpf) }}</h3>
    <h3> REPRESENTATIVIDADE: {{Str::upper($data->modalidade)}}</h3>
    <h3> REGIÕES: {{Str::upper($data->regiao)}}</h3>
    <h3>TIPO: {{Str::upper($data->tipo)}}</h3>
 
</div>
</body>
</html>