<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Arquivo;
use PDF;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use Illuminate\Support\Facades\File;

class InscricaoController extends Controller
{


    public function mostrarregioes()
    {
        $data = [];
        $data[0] = ['titulo' => 'REGIÃO PINHEIRINHO', 'nome' => 'DISTRITO INDUSTRIAL, JARDIM ALTO DA BOA VISTA, JARDIM ALVORADA, JARDIM NOVA ALFENAS, JARDIM SÃO PAULO, PINHEIRINHO, PINHEIRINHO II, RECREIO VALE DO SOL, RESIDENCIAL CANDIDO ALVES, RESIDENCIAL CIDADE UNIVERSITARIA, RESIDENCIAL CRISTAL, RESIDENCIAL VALE VERDE, SANTA CLARA, VILA PORTO SEGURO '];
        $data[1] = ['titulo' => 'REGIÃO SANTA RITA', 'nome' => 'JARDIM BOA ESPERANÇA, JARDIM BOA ESPERANÇA I, JARDIM BOA ESPERANÇA II, JARDIM BOA ESPERANÇA III, JARDIM BOA ESPERANÇA IV, JARDIM DA COLINA, JARDIM ELITE, JARDIM ELITE II, JARDIM TROPICAL, RESIDENCIAL COLINAS PARK, RESIDENCIAL EUROVILLE, RESIDENCIAL MORADA DO SOL, RESIDENCIAL NOVO HORIZONTE '];
        $data[2] = ['titulo' => 'REGIÃO PRIMAVERA  ', 'nome' => 'CAMPOS ELISIOS, GASPAR LOPES, JARDIM EUNICE, JARDIM PRIMAVERA, JARDIM SÃO CARLOS, LOTEAMENTO JARDIM MONTES, RESIDENCIAL ITAPARICA, VILA ESPERANÇA, VILA PROMESSA, VILA SANTA EDWIRGES, VILA SANTA LUZIA, VISTA GRANDE '];
        $data[3] = ['titulo' => 'REGIÃO VILA FORMOSA', 'nome' => 'CAMPINHO, CIDADE JARDIM, CRUZ PRETA, JARDIM AEROPORTO, JARDIM AEROPORTO II, JARDIM AEROPORTO III, JARDIM SÃO LUCAS, JARDIM SÃO LUCAS II, JARDIM SÃO LUCAS III, LOTEAMENTO ATHENAS, LOTEAMENTO MONTSERRAT, RESIDENCIAL AEROPORTO, RESIDENCIAL ALTO DO AEROPORTO, RESIDENCIAL FLORESTA, RESIDENCIAL MONT BLANC ALFENAS, RESIDENCIAL SÃO LUCAS, SANTOS REIS, VILA FORMOSA '];
        $data[4] = ['titulo' => 'REGIÃO SÃO VICENTE  ', 'nome' => 'APARECIDA, CENTRO, CHAPADA, ESTAÇÃO, FAC II, JARDIM AMERICA, JARDIM AMERICA I, JARDIM AMERICA II, JARDIM AMERICA III, JARDIM DAS PALMEIRAS, JARDIM FURNAS, JARDIM NOVA AMERICA, JARDIM OLIMPIA, JARDIM PANORAMA, JARDIM PLANALTO, JARDIM SANTA INEZ, JARDIM SANTA MARIA, JARDIM SANTA MARIA II, LOTEAMENTO TREVO, PARQUE DAS NAÇOES, POR DO SOL, POR DO SOL II, RESIDENCIAL ALDA CAETANI, RESIDENCIAL BOSQUE DOS IPES, RESIDENCIAL JULIO ALVES, RESIDENCIAL JULIO ALVES - PARTE II, RESIDENCIAL OLIVEIRA, RESIDENCIAL TEIXEIRA, SÃO JOSE, SÃO VICENTE, VILA BETANIA, VILA GODOY, VILA TEIXEIRA, VISTA ALEGRE '];
        $data[5] = ['titulo' => 'REGIÃO RURAL', 'nome' => 'BARRANCO ALTO, CHACARAS BOM REPOUSO, CHACARAS DE RECREIO FAROL DO LAGO, CHACARAS DE RECREIO SONHO MEU, CHACARAS MONJOLINHO, CHACARAS RECANTO DA HARMONIA, CONDOMINIO ANGOLA, CONDOMINIO CAMPO REDONDO, CONDOMINIO CASCALHO, CONDOMINIO CHACARAS ESMERALDA, CONDOMINIO COQUEIROS, CONDOMINIO LOGFENAS, CONDOMINIO MANACA, CONDOMINIO PONTAL DA ESMERALDA, ESTIVA OU RODEIO, LAGOA PRATEADA, LOTEAMENTO BELA VISTA, LOTEAMENTO CHACARAS HARMONIA, LOTEAMENTO ESTEVES, LOTEAMENTO FLORESTA, LOTEAMENTO HARMONIA, LOTEAMENTO LAGOA PRATEADA, LOTEAMENTO SITIO BELA VISTA, RECANTO DA FAMA, RESIDENCIAL CHACARAS PONTAL DA ESMERALDA, RESIDENCIAL CHACARAS TANGARA, RESIDENCIAL NOVA FAMA, VALE DO LUAR '];

        return View('mostrarregioes',compact('data'));
    }

  //ADM---------------------------------------------------------------
  public function listaadm()
  {
    if(auth()->user()->can('user')){
        return redirect()->route('lista');
      }
      $data =  User::all();
      
      return View('listaadm',compact('data'));
   
   
  }
  
  public function listaadmcomprovante()
  {
    if(auth()->user()->can('user')){
        return redirect()->route('lista');
      }
      $data =  User::all();
      
      return View('listaadmcompravante',compact('data'));
   
   
  } 
  
  public function listaarquivoadm($id)
  {
    if(auth()->user()->can('user')){
        return redirect()->route('lista');
      }
    $data  = Arquivo::Where('user_id', $id)->get();
    $usuario  = User::Where('id', $id)->get();
    
      return View('listaarquivoadm',compact('data', 'usuario'));
   
   
  } 



  public function ziparquivo()
  {
    ini_set('memory_limit', -1);
    if(auth()->user()->can('user')){
        return redirect()->route('lista');
      }
      $resultado  = Arquivo::with('user')->get();
      





      $zip = new ZipArchive();

      $tmp_file = tempnam('.', '');
      $res = $zip->open($tmp_file, ZipArchive::CREATE);
      

      foreach ($resultado as $r) {
        
          if ($res === TRUE) {
              $pathdownload =  storage_path('app/'.$r->caminho);
              $pathdownload = preg_replace( "/\r|\n/", "", $pathdownload );
          
              if(!empty($pathdownload)){
                  
                    
                  
                      $download_file = file_get_contents($pathdownload);
              
                      $zip->addFromString($r->user->id."-".$r->user->name."-".$r->user->cpf."/".basename($pathdownload), $download_file);
                  
                  
              }
              
          } 
          
          
      }
  
      $zip->close();

      header('Content-disposition: attachment; filename="my file.zip"');
      header('Content-type: application/zip');
      readfile($tmp_file);
      unlink($tmp_file);









    //   $zip = new ZipArchive;
    //   $zipfile = $data->user'.zip'; 
     
   
    //   $zip->open($zipfile, ZipArchive::CREATE | ZipArchive::OVERWRITE);
     
    //   //$path = Storage::get($data->caminho);

    //  $path =  storage_path('app/'.$data->caminho);
    // //dd($path);
    //   $invoice_file = $data->caminho;
    //   $zip->addFile($path, $invoice_file);
    //       $zip->close();
        
        
        return response()->download($tmp_file);
  }
      

 
   // Criar instancia de ZipArchive

  


   
  



//FIM ADM -----------------------------------------------------------


    public function dashboard()
    {
        if(auth()->user()->can('admin')){
            return redirect()->route('listaadm');
          }
        return View('dashboard');
    }


    public function storearquivo(Request $request)
    {
        // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;
    
        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
             $tamanho = (filesize($request->arquivo)/1024)/1024;
            //dd($tamanho);
            // Define um aleatório para o arquivo baseado no timestamps atual
            if($tamanho > 1.99){
              // dd("erro","dfsfsd");
              return redirect()->back()->withErrors(['mairo2mb' => 'Arquivo não pode ser maior que 2 MB']);
            }
            $name = uniqid(date('HisYmd'));
    
            // Recupera a extensão do arquivo
            $extension = $request->arquivo->extension();
              
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";
        
            // Faz o upload:
            $upload = $request->arquivo->storeAs(strval('public/'.strval(auth()->user()->id)), $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
            $request['caminho'] = $upload;
        
            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();
            $request['user_id'] = auth()->user()->id;


            $resultado = Arquivo::Create($request->all());
            return redirect()->route('lista');
        }
        return redirect()->route('lista');
    }

    public function lista(){
        if(auth()->user()->can('admin')){
            return redirect()->route('dashboard');
        }
     
        $data  = Arquivo::Where('user_id', auth()->user()->id)->get();
        return View('lista',compact('data'));
    }
    
    public function excluirarquivo($id){

        $data  = Arquivo::find($id);
        $arquivo = explode('/',$data->caminho);
       // dd($arquivo);
        if($data){
            $data->delete();
            Storage::delete($data->caminho);
        }
      
        return redirect()->route('lista');
    }
    public function store(Request $request)
    {

        $curso = Inscricao::Where('user_id', auth()->user()->id)->first();
        if ($curso) {
            return redirect()->route('dashboard');
        }

        $validator = Validator::make($request->all(), Inscricao::$rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        //Verifica se ja tem um inscricao feita por esse usuario se sim ele manda para pagina pdf

        $request['user_id'] = auth()->user()->id;
        $resultado = Inscricao::Create($request->all());
        if ($resultado) {
            return redirect()->route('pdf');
        }

        return redirect()->route('dashboard');
    }

    public function atualiza()
    {
        return redirect()->route('dashboard');
        if(auth()->user()->can('admin')){
            return redirect()->route('listaadm');
          }
        $inscricao  = User::Where('id', auth()->user()->id)->first();
        if($inscricao){
        return View('atualiza', ['inscricao' => $inscricao]);
        }
        return redirect()->route('dashboard');

    }



    public function put(Request $request)
    {


        $inscricao = User::Where('id', auth()->user()->id)->first();
        $cpfExiste = User::where('cpf', $request->cpf);

        if ($cpfExiste) {
            if ($request->cpf != $inscricao->cpf) {
                $validator = Validator::make($request->all(), User::$rules);
                return redirect()->back()->withErrors($validator);
            }
        }



        $validatorUpdate = Validator::make($request->all(), User::$rulesUpdade);

        if ($validatorUpdate->fails()) {
            return redirect()->back()->withErrors($validatorUpdate);
        }
        //Verifica se ja tem um inscricao feita por esse usuario se sim ele manda para pagina pdf

    

        if ($inscricao) {
            $inscricao->fill($request->all());
            if ($inscricao->save()) {
                
                return redirect()->route('dashboard');
            }
        }
        
        return redirect()->route('dashboard');
    }


    public function guia()
    {


        $data  = User::Where('id', auth()->user()->id)->first();

        return view('guia', compact('data'));
    }

    public function pdf()
    {
        $data  = User::Where('id', auth()->user()->id)->first();
        if($data){
        // share data to view
        view()->share('guia', $data);
        $pdf = PDF::loadView('guia', ['data' => $data]);

        // download PDF file with download method
        return $pdf->stream();
      }
      return redirect()->route('dashboard');

    }

  

    public function cadastronotas($id){
        if(auth()->user()->can('user')){
            return redirect()->route('dashboard');
          }
         
        if($id){
            $inscricao = Inscricao::find($id);
            
           return View('cadastronotas',['inscricao'=> $inscricao]);
        }

        return redirect()->route('lista');
    }

    public function storenotas($id,Request $request){

        if(auth()->user()->can('user')){
            return redirect()->route('dashboard');
          }
         
        if($id){
            $resultado =Inscricao::where('id',$id)->first();

            $resultado->fill($request->all());
            if($resultado->save()){
              return redirect()->route('lista');
            }
         }

        return View('cadastronotas');
    }
}
