<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Arquivo;
use PDF;
use Illuminate\Support\Facades\Storage;

class InscricaoController extends Controller
{



  //ADM---------------------------------------------------------------
  public function listaadm()
  {
    if(auth()->user()->can('user')){
        return redirect()->route('lista');
      }
      $data =  User::all();
      
      return View('listaadm',compact('data'));
   
   
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
            
            // Define um aleatório para o arquivo baseado no timestamps atual
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
                
                return redirect()->route('pdf');
            }
        }
        return redirect()->route('dashboard');
    }


    public function guia()
    {


        $data  = Inscricao::Where('user_id', auth()->user()->id)->first();

        return view('guia', compact('data'));
    }

    public function pdf()
    {
        $data  = Inscricao::Where('user_id', auth()->user()->id)->first();
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
