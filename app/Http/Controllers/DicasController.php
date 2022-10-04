<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dicas;
use App\Http\Requests\DicasRequest;

class DicasController extends Controller
{
    // public function index(){
    //     $dicas = Dicas::orderBy('descricao')->paginate(5);
    //     return view('dicas.index',['dicas'=>$dicas]);
    // }

    public function index(Request $filtro){
        $filtragem = $filtro->get('desc_filtro');
        if($filtragem == null)
            $dicas = Dicas::orderBy('titulo')->paginate(5);
        else
            $dicas = Dicas::where('titulo', 'like', '%'.$filtragem.'%')
                            ->orderBy("titulo")
                            ->paginate(5)
                            ->setpath('dicas?desc_filtro='.$filtragem);
        return view('dicas.index',['dicas'=>$dicas]);
    }

    public function create(){
        return view('dicas.create');
    }

    public function store(DicasRequest $request){
        $nova_dica = $request->all();
        Dicas::create($nova_dica);

        return redirect()->route('dicas');

    }

    public function destroy($id){
        try{
            Dicas::find($id)->delete();
            $ret = array('status'=>200, 'msg'=>"null");
        }catch(\Illuminate\Database\QueryException $e){
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        catch(PDOExcepion $e){
            $ret = array('status'=>500, 'msg'=>$e->getMessage());
        }
        return $ret;
    }

    // public function edit($id){
    //     $dica = Dicas::find($id);
    //     return view('dicas.edit',compact('dica'));
    // }

    public function edit(Request $request){
        $dica = Dicas::find(\Crypt::decrypt($request->get('id')));
        return view('dicas.edit',compact('dica'));
    }

    public function update(DicasRequest $request, $id){
        Dicas::find($id)->update($request->all());
        return redirect()->route('dicas');

    }
}
