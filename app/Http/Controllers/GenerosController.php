<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Generos;
use App\Http\Requests\GenerosRequest;

class GenerosController extends Controller
{
    // public function index(){
    //     $genero = Generos::orderBy('genero')->paginate(8);
    //     return view('generos.index',['generos'=>$genero]);
    // }

    public function index(Request $filtro){
        $filtragem = $filtro->get('desc_filtro');
        if($filtragem == null)
            $genero = Generos::orderBy('genero')->paginate(5);
        else
            $genero = Generos::where('genero', 'like', '%'.$filtragem.'%')
                            ->orderBy("genero")
                            ->paginate(5)
                            ->setpath('generos?desc_filtro='.$filtragem);
        return view('generos.index',['generos'=>$genero]);
    }

    public function create(){
        return view('generos.create');
    }

    public function store(GenerosRequest $request){
        $novo_genero = $request->all();
        Generos::create($novo_genero);

        return redirect()->route('generos');

    }

    public function destroy($id){
        try{
            Generos::find($id)->delete();
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
    //     $genero = Generos::find($id);
    //     return view('generos.edit',compact('genero'));
    // }

    public function edit(Request $request){
        $genero = Generos::find(\Crypt::decrypt($request->get('id')));
        return view('generos.edit',compact('genero'));
    }


    public function update(GenerosRequest $request, $id){
        Generos::find($id)->update($request->all());
        return redirect()->route('generos');

    }
}
