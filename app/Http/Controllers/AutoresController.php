<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Autores;
use App\Http\Requests\AutoresRequest;

class AutoresController extends Controller
{
    // public function index(){
    //     $autor = Autores::orderBy('nome')->paginate(8);
    //     return view('autores.index',['nome'=>$autor]);
    // }

    public function index(Request $filtro){
        $filtragem = $filtro->get('desc_filtro');
        if($filtragem == null)
            $autor = Autores::orderBy('nome')->paginate(5);
        else
            $autor = Autores::where('nome', 'like', '%'.$filtragem.'%')
                            ->orderBy("nome")
                            ->paginate(5)
                            ->setpath('autores?desc_filtro='.$filtragem);
        return view('autores.index',['nome'=>$autor]);
    }

    public function create(){
        return view('autores.create');
    }

    public function store(AutoresRequest $request){
        $novo_autor = $request->all();
        Autores::create($novo_autor);

        return redirect()->route('autores');

    }

    public function destroy($id){
        try{
            Autores::find($id)->delete();
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
        $autor = Autores::find(\Crypt::decrypt($request->get('id')));
        return view('autores.edit',compact('autor'));
    }

    public function update(AutoresRequest $request, $id){
        Autores::find($id)->update($request->all());
        return redirect()->route('autores');

    }
}
