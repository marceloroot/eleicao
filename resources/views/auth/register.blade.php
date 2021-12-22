<x-guest-layout>
 
    
   <div class="container">

      <form class="mt-5" method="POST" action="{{ route('store') }}">
      @csrf
       

            <div class="row">
                    
                <div class="mb-3 col-6">      
                    <label for="email" class="form-label">Email <span style="color:red">*</span> </label>
                    <input type="email" class="form-control"  id="email" name="email">
                    @if($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                
                <div class="mb-3 col-6">
                    <label for="nome" class="form-label">Senha <span style="color:red">*</span></label>
                    <input type="password" class="form-control"  required id="password" name="password">
                    @if($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                    @endif
                </div>


                </div>
       
              
              <div class="row">
              
                <div class="mb-3 col-6">
                    <label for="nome" class="form-label">Confirmar Senha <span style="color:red">*</span></label>
                    <input type="password" class="form-control"  required id="password_confirmation" name="password_confirmation">
                    @if($errors->has('password_confirmation'))
                      <div class="error">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                  </div>
               

                  <div class="mb-3 col-6">
                    <label for="nome" class="form-label">CPF <span style="color:red">*</span></label>
                    <input type="text" class="form-control" onblur="isOnblurCpf()" required id="cpf" name="cpf">
                    @if($errors->has('cpf'))
                      <div class="error">{{ $errors->first('cpf') }}</div>
                    @endif
                  </div>


                </div>

               

                    <div class="row">
                        <div class="mb-3 col-6">      
                            <label for="nome" class="form-label">Nome <span style="color:red">*</span> </label>
                            <input type="text" class="form-control"  id="name" name="name">
                            @if($errors->has('name'))
                              <div class="error">{{ $errors->first('name') }}</div>
                            @endif
                        </div>

                        <div class="mb-3 col-6">      
                            <label for="nome" class="form-label">Cep <span style="color:red">*</span> </label>
                            <input type="text" class="form-control" maxlength="9"  id="cep" name="cep">
                            @if($errors->has('cep'))
                              <div class="error">{{ $errors->first('cep') }}</div>
                            @endif
                        </div>
                     
                       
        
                        </div>

                <div class="row">
                
                  <div class="mb-3  col-6">
                    <label for="tags" class="form-label">Logradouro</label>
                    <input type="text" class="form-control"  name="logradouro" id="logradouro" >
                    @if($errors->has('logradouro'))
                    <div class="error">{{ $errors->first('logradouro') }}</div>
                    @endif
                  </div>

                  <div class="mb-3  col-6">
                    <label for="tags" class="form-label">Complemento</label>
                    <input type="text" class="form-control" name="complemento" id="complemento">
                    @if($errors->has('complemento'))
                    <div class="error">{{ $errors->first('complemento') }}</div>
                    @endif
                  </div>
               
                 
                </div>
               
                <div class="row">
                 <div class="mb-3  col-6">
                    <label for="tags" class="form-label">Bairro</label>
                    <input type="text" class="form-control" required name="bairro" id="bairro">
                    @if($errors->has('bairro'))
                    <div class="error">{{ $errors->first('bairro') }}</div>
                    @endif
                  </div>
                
                  <div class="mb-3  col-6">
                    <label for="tags" class="form-label">Localidade</label>
                    <input type="text" class="form-control"  name="localidade" id="localidade" >
                    @if($errors->has('localidade'))
                    <div class="error">{{ $errors->first('localidade') }}</div>
                    @endif
                  </div>
                </div>

                            
                <div class="row">
                    <div class="mb-3  col-6">
                       <label for="tags" class="form-label">UF</label>
                       <input type="text" class="form-control" required name="uf" id="uf">
                       @if($errors->has('uf'))
                       <div class="error">{{ $errors->first('uf') }}</div>
                       @endif
                     </div>
                   
                     <div class="mb-3  col-6">
                       <label for="tags" class="form-label">Telefone</label>
                       <input type="text" max="2" class="form-control"  name="telefone" id="telefone" />
                       @if($errors->has('telefone'))
                       <div class="error">{{ $errors->first('telefone') }}</div>
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
                  
                      <div class="mb-3  col-6">
                        <label for="tags" class="form-label">regiao<span style="color:red">*</span></label>
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

                </div>
                    
            

                 
                

                  <button class="btn btn-danger mt-4 mb-2" style="display:inline"  type="submit">Inscrever-se</button>
                  
           
        </form>
    </div>


@section('scripts')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" crossorigin="anonymous"></script>

<script>



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