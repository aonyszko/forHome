<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receitas;
use App\Models\ReceitasPaises;
use App\Http\Requests\ReceitasRequest;

class ReceitasController extends Controller
{
    public function index(Request $filtro){
        $filtragem = $filtro->get('desc_filtro');
        if($filtragem == null)
            $receita = Receitas::orderBy('titulo')->paginate(11);
        else
            $receita = Receitas::where('titulo', 'like', '%'.$filtragem.'%')
                            ->orderBy("titulo")
                            ->paginate(5)
                            ->setpath('receitas?desc_filtro='.$filtragem);
        return view('receitas.index',['titulo'=>$receita]);
    }

    public function create(){
        return view('receitas.create');
    }

    public function store(Request $request){
        $nova_receita = Receitas::create([
                                        'titulo'     => $request->get('titulo'),
                                        'descricao'  => $request->get('descricao'),
                                        'autores_id' => $request->get('autores_id'),
                                    ]);
        $novo_pais = $request->paises;
        foreach($novo_pais as $a => $value){
            ReceitasPaises::create([
                                    'receitas_id' => $nova_receita->id,
                                    'paises_id'   => $novo_pais[$a] 
                                  ]);
        }

        return redirect()->route('receitas');
    }

    //  public function destroy($id){

    //     try{
    //         Receitas::find($id)->onDelete('cascade');
    //         $ret = array('status'=>200, 'msg'=>"null");
    //     }catch(\Illuminate\Database\QueryException $e){
    //         $ret = array('status'=>500, 'msg'=>$e->getMessage());
    //     }
    //     catch(PDOExcepion $e){
    //         $ret = array('status'=>500, 'msg'=>$e->getMessage());
    //     }

    //     return $ret;
    // }

    public function destroy($id){

        try{
            ReceitasPaises::where('receitas_id',$id)->delete();
            $ret = array('status'=>200, 'msg'=>"null");
        }catch(\Illuminate\Database\QueryException $e){
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        catch(PDOExcepion $e){
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }

        try{
            Receitas::find($id)->delete();
            $ret = array('status'=>200, 'msg'=>"null");
        }catch(\Illuminate\Database\QueryException $e){
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        catch(PDOExcepion $e){
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return $ret;
    }



    public function edit(Request $request){
        $receita = Receitas::find(\Crypt::decrypt($request->get('id')));
        return view('receitas.edit',compact('receita'));
    }

    // public function update(Receitas $request, $id){
    //     Receitas::find($id)->update($request->all());
    //     return redirect()->route('receitas');
    // }
}
