<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paises;
use App\Http\Requests\PaisesRequest;

class PaisesController extends Controller
{
    public function index(Request $filtro){
        $filtragem = $filtro->get('desc_filtro');
        if($filtragem == null)
            $pais = Paises::orderBy('name')->paginate(11);
        else
            $pais = Paises::where('name', 'like', '%'.$filtragem.'%')
                            ->orderBy("name")
                            ->paginate(5)
                            ->setpath('paises?desc_filtro='.$filtragem);
        return view('paises.index',['name'=>$pais]);
    }

    public function create(){
        return view('paises.create');
    }

     public function store(PaisesRequest $request){
         $novo_pais = $request->all();
         Paises::create($novo_pais);
         return redirect()->route('paises');
     }

     public function destroy($id){
        try{
            Paises::find($id)->delete();
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
        $pais = Paises::find(\Crypt::decrypt($request->get('id')));
        return view('paises.edit',compact('pais'));
    }

    public function update(PaisesRequest $request, $id){
        Paises::find($id)->update($request->all());
        return redirect()->route('paises');
    }
}
