<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edição dados so poderar ocoorer até o dia 07/02/2022') }}
           
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Campos com <span style="color:red">*</span> sao obrigatório
         
      </h2>
    </x-slot>
  
    <div class="container">
   
      <form class="mt-5" method="POST" action="{{ route('put',['id'=>$inscricao->id]) }}">
        @method('PUT')
        @csrf
            
        <div class="row">
                      
              <div class="mb-3  col-6">
                  <label for="tags" class="form-label">Representatividade<span style="color:red">*</span></label>
                  <select class="form-select" name="modalidade" required id="modalidade" 
                          onChange="onchangeModalidade()" aria-label="tipo">
                    <option value="USUÁRIO">USUÁRIO</option>
                    <option value="REPRESENTANTES DE ENTIDADES">REPRESENTANTES DE ENTIDADES</option>
                    <option value="PROFISSIONAL DE SAÚDE">PROFISSIONAL DE SAÚDE</option>
                    <option value="PRESTADOR DE SAÚDE">PRESTADOR DE SAÚDE</option>
                  </select>
                  @if($errors->has('tipo'))
                  <div class="error">{{ $errors->first('tipo') }}</div>
                  @endif
                </div>

                <div class="mb-3  col-6" id="cnesdiv">
                  <label for="tags" class="form-label">CNES</label>
                  <input type="text" class="form-control"  name="cnes" id="cnes" />
                  @if($errors->has('cnes'))
                  <div class="cnes">{{ $errors->first('cnes') }}</div>
                  @endif
                </div>

              </div>

              <div class="row">

                  <div class="mb-3 col-6">
                    <label for="nome" class="form-label">CPF <span style="color:red">*</span></label>
                    <input type="text" class="form-control" onblur="isOnblurCpf()" required id="cpf" name="cpf" value={{$inscricao->cpf}}>
                    @if($errors->has('cpf'))
                      <div class="error">{{ $errors->first('cpf') }}</div>
                    @endif
                  </div>

                </div>

                    <div class="row">
                        <div class="mb-3 col-6">      
                            <label for="nome" class="form-label">Nome <span style="color:red">*</span> </label>
                            <input type="text" class="form-control"  id="name" name="name"  value={{$inscricao->name}}>
                            @if($errors->has('name'))
                              <div class="error">{{ $errors->first('name') }}</div>
                            @endif
                        </div>

                        <div class="mb-3 col-6">      
                            <label for="nome" class="form-label">Cep <span style="color:red">*</span> </label>
                            <input type="text" class="form-control" required maxlength="9"  id="cep" name="cep" value={{$inscricao->cep}}>
                            @if($errors->has('cep'))
                              <div class="error">{{ $errors->first('cep') }}</div>
                            @endif
                        </div>
                     
                       
        
                        </div>

                <div class="row">
                
                  <div class="mb-3  col-6">
                    <label for="tags" class="form-label">Logradouro</label>
                    <input type="text" class="form-control"  name="logradouro" id="logradouro" value={{$inscricao->logradouro}}>
                    @if($errors->has('logradouro'))
                    <div class="error">{{ $errors->first('logradouro') }}</div>
                    @endif
                  </div>

                  <div class="mb-3  col-6">
                    <label for="tags" class="form-label">Complemento</label>
                    <input type="text" class="form-control" name="complemento" id="complemento" value={{$inscricao->complemento}}>
                    @if($errors->has('complemento'))
                    <div class="error">{{ $errors->first('complemento') }}</div>
                    @endif
                  </div>
               
                 
                </div>
               
                <div class="row">
                 <div class="mb-3  col-6">
                    <label for="tags" class="form-label">Bairro</label>
                    <input type="text" class="form-control" required name="bairro" id="bairro" value={{$inscricao->bairro}}>
                    @if($errors->has('bairro'))
                    <div class="error">{{ $errors->first('bairro') }}</div>
                    @endif
                  </div>
                
                  <div class="mb-3  col-6">
                    <label for="tags" class="form-label">Localidade</label>
                    <input type="text" class="form-control"  name="localidade" id="localidade" value={{$inscricao->localidade}}>
                    @if($errors->has('localidade'))
                    <div class="error">{{ $errors->first('localidade') }}</div>
                    @endif
                  </div>
                </div>

                            
                <div class="row">
                    <div class="mb-3  col-6">
                       <label for="tags" class="form-label">UF</label>
                       <input type="text" class="form-control" required name="uf" id="uf" value={{$inscricao->uf}}>
                       @if($errors->has('uf'))
                       <div class="error">{{ $errors->first('uf') }}</div>
                       @endif
                     </div>
                   
                     <div class="mb-3  col-6">
                       <label for="tags" class="form-label">Telefone</label>
                       <input type="text" max="2" class="form-control"  name="telefone" id="telefone" value={{$inscricao->telefone}} />
                       @if($errors->has('telefone'))
                       <div class="error">{{ $errors->first('telefone') }}</div>
                       @endif
                     </div>
                </div>


                  <!--Titulo cnpj-->
                  <div class="row">
                    <div class="mb-3  col-6">
                       <label for="tags" class="form-label">Titulo de Eleiçao</label>
                       <input type="text" class="form-control" required name="tituloeleitor" id="tituloeleitor" value={{$inscricao->tituloeleitor}}>
                       @if($errors->has('tituloeleitor'))
                       <div class="error">{{ $errors->first('tituloeleitor') }}</div>
                       @endif
                     </div>
                   
                     <div class="mb-3  col-6"  id="cnpjdiv">
                       <label for="tags" class="form-label">CNPJ</label>
                       <input type="text" max="2" class="form-control"  name="cnpj" id="cnpj" />
                       @if($errors->has('cnpj'))
                       <div class="error">{{ $errors->first('cnpj') }}</div>
                       @endif
                     </div>
                </div>
                
                <div class="row">
                   
                    <div class="mb-3  col-6">
                        <label for="tags" class="form-label">Tipo<span style="color:red">*</span></label>
                        <select class="form-select" name="tipo" required id="tipo" aria-label="tipo">
                          <option value="">Selecione uma opcao</option>
                          <option value="ELEITOR">ELEITOR</option>
                          <option value="CANDIDATO">CANDIDATO</option>
                        </select>
                        @if($errors->has('tipo'))
                        <div class="error">{{ $errors->first('tipo') }}</div>
                        @endif
                      </div>
                  
                      <div class="mb-3  col-6" id="regiaodiv">
                        <label for="tags" class="form-label">Regiões<span style="color:red">*</span>
                        <a style="font-weight: bold" href="{{url('regioes')}}" target="_blank">Clique para ver as Descrição das regiões</a>
                        
                        </label>
                        <select class="form-select" name="regiao" required id="regiao" aria-label="regiao">
                          <option value="">Selecione uma opcao</option>
                          <option value="Região Vila Formosa">Região Vila Formosa</option>
                          <option value="Região Pinheirinho">Região Pinheirinho</option>
                          <option value="Região Primavera">Região Primavera</option>
                          <option value="Região Santa Rita">Região Santa Rita</option>
                          <option value="Região São Vicente">Região São Vicente</option>
                          <option value="Região Rural">Região Rural</option>
                        </select>
                        @if($errors->has('regiao'))
                        <div class="error">{{ $errors->first('regiao') }}</div>
                        @endif
                      </div>

                      <div class="row">
                   
                        <div class="mb-3  col-6"  id="divregistrocc">
                          <label for="tags" class="form-label">Registro de Consolho de Classe</label>
                          <input type="text" max="2" class="form-control"  name="registrocc" id="registrocc" />
                          @if($errors->has('registrocc'))
                          <div class="error">{{ $errors->first('registrocc') }}</div>
                          @endif
                        </div>
                        
      
                      </div>

                </div>

                  <button class="btn btn-danger mt-4 mb-2" style="display:inline"  type="submit">Atualizar</button>
                  
           
        </form>
    </div>


@section('scripts')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" crossorigin="anonymous"></script>

<script>
document.getElementById('regiao').required = true;
document.getElementById('cnesdiv').style.visibility = 'hidden' ;
document.getElementById('cnpjdiv').style.visibility = 'hidden' ;
document.getElementById('cnes').value = {!! json_encode($inscricao->cnes) !!};
document.getElementById('cnpj').value = {!! json_encode($inscricao->cnpj) !!};
document.getElementById('registrocc').value = {!! json_encode($inscricao->registrocc) !!};


const onchangeModalidade =() =>{
 const mod =  document.getElementById('modalidade').value;
 document.getElementById('cnes').value ="";
  if(mod.trim() != 'USUÁRIO')
  {
      document.getElementById('regiao').required = false;
      document.getElementById('regiao').value = "";
      document.getElementById('regiaodiv').style.visibility = 'hidden' ;
  }
  else{
    document.getElementById('regiao').required = true;
    document.getElementById('regiaodiv').style.visibility = 'visible' ;
  }

  if(mod.trim() == 'PRESTADOR DE SAÚDE')
  {
    
    document.getElementById('cnesdiv').style.visibility = 'visible';
  }
  else{
    
    document.getElementById('cnesdiv').style.visibility = 'hidden' ;
  }

      if(mod.trim() == 'REPRESENTANTES DE ENTIDADES')
    {
      document.getElementById('cnpj').required = true;
      document.getElementById('cnpjdiv').style.visibility = 'visible';
    }
    else{
      document.getElementById('cnpj').value = '';
      document.getElementById('cnpj').required = false;
      document.getElementById('cnpjdiv').style.visibility = 'hidden' ;
    }
     
        
    if(mod.trim() == 'PROFISSIONAL DE SAÚDE')
    {
      document.getElementById('registrocc').required = true;
      document.getElementById('divregistrocc').style.visibility = 'visible';
    }
    else{
      document.getElementById('registrocc').value = '';
      document.getElementById('registrocc').required = false;
      document.getElementById('divregistrocc').style.visibility = 'hidden' ;
    }
  }



  // ---------------------Comeco Representatividade----------------------------
      //Variavel para escolapublica
      modalidade =   {!! json_encode($inscricao->modalidade) !!}
      //pega o escolapublica
      var selectModalidade = document.getElementById('modalidade');
      for(i=0;i<=selectModalidade.options.length  -1;i++){ 
                    if(selectModalidade.options[i].value == modalidade){
                      selectModalidade.options[i].selected = true;
          }
        }
        onchangeModalidade();
     
    //--------------------Fim Representatividade -----------------------------------


// ---------------------Comeco tipo----------------------------
      //Variavel para escolapublica
      tipo =   {!! json_encode($inscricao->tipo) !!}
      //pega o escolapublica
      var selectTipo = document.getElementById('tipo');
      for(i=0;i<=selectTipo.options.length  -1;i++){ 
                    if(selectTipo.options[i].value == tipo){
                      selectTipo.options[i].selected = true;
          }
        }
     
    //--------------------Fim tipo -----------------------------------


    // ---------------------Comeco regiao----------------------------
      //Variavel para escolapublica
      regiao =   {!! json_encode($inscricao->regiao) !!}
      //pega o escolapublica
      var selectRegiao = document.getElementById('regiao');
      for(i=0;i<=selectRegiao.options.length  -1;i++){ 
                    if(selectRegiao.options[i].value == regiao){
                      selectRegiao.options[i].selected = true;
          }
        }
     
    //--------------------Fim regiao -----------------------------------

preencherFormulario =(endereco)=>{
  document.getElementById('logradouro').value =endereco.logradouro;
  document.getElementById('complemento').value =endereco.complemento;
  document.getElementById('bairro').value =endereco.bairro;
  document.getElementById('localidade').value =endereco.localidade;
  document.getElementById('uf').value =endereco.uf;
}
limparFormulario =()=>{
  document.getElementById('cep').value ='';
  document.getElementById('logradouro').value ='';
  document.getElementById('complemento').value ='';
  document.getElementById('bairro').value ='';
  document.getElementById('localidade').value ='';
  document.getElementById('uf').value ='';
}

const cepValido =(cep)=>cep.length === 8;

pesquisarCep = async ()=>{
    const cep = document.getElementById('cep').value;
    const cepFinal = cep.replace(/\D/g, '');
    const url =`http://viacep.com.br/ws/${cepFinal}/json/`;
    console.log(cepFinal.length)
    if(cepValido(cepFinal)){
      const dados = await fetch(url);
      const endereco = await dados.json();
      if(endereco.hasOwnProperty('erro')){
        console.log(endereco);
        limparFormulario();
      }else{
        preencherFormulario(endereco); 
      }
  }
  else{
    limparFormulario();
  }
}

document.getElementById("cep")
        .addEventListener("focusout", pesquisarCep);



function onBlurDataNasc(){
  document.getElementById("instrumento").value = "";
  document.getElementById("turno").value = "";


  var dataNasc = document.getElementById('datanasc').value;

  var dataNascimento = new Date(dataNasc);

  var dataMinima = new Date();
  //Data Minima
  dataMinima.setFullYear(dataMinima.getFullYear() -10);
 
  if(dataNascimento >= dataMinima){
    document.getElementById("datanasc").value =" ";
  }
}


function isValidCPF(cpf) {
    if (typeof cpf !== 'string') return false
    cpf = cpf.replace(/[^\d]+/g, '')
    if (cpf.length !== 11 || !!cpf.match(/(\d)\1{10}/)) return false
    cpf = cpf.split('')
    const validator = cpf
        .filter((digit, index, array) => index >= array.length - 2 && digit)
        .map( el => +el )
    const toValidate = pop => cpf
        .filter((digit, index, array) => index < array.length - pop && digit)
        .map(el => +el)
    const rest = (count, pop) => (toValidate(pop)
        .reduce((soma, el, i) => soma + el * (count - i), 0) * 10) % 11 % 10
    return !(rest(10,2) !== validator[0] || rest(11,1) !== validator[1])
}

function isOnblurCpf(){
  var cpf = document.getElementById('cpf').value;
  if(!isValidCPF(cpf)){
    document.getElementById("cpf").value =' ';
  }
  
}
$('#cpf').mask('000.000.000-00', {
  onKeyPress : function(cpfcnpj, e, field, options) {
    const masks = ['000.000.000-000', '00.000.000/0000-00'];
    const mask = (cpfcnpj.length > 14) ? masks[1] : masks[0];
    $('#cpfcnpj').mask(mask, options);
  }
});


  
 
 

</script>

@stop
</x-guest-layout>