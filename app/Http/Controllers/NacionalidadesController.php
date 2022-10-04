<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nacionalidades;
use App\Http\Requests\NacionalidadesRequest;

class NacionalidadesController extends Controller
{
    // public function index(){
    //     $nacionalidades = Nacionalidades::orderBy('descNacionalidade')->paginate(8);
    //     return view('nacionalidades.index',['descNacionalidade'=>$nacionalidades]);
    // }

    public function index(Request $filtro){
        $filtragem = $filtro->get('desc_filtro');
        if($filtragem == null)
            $nacionalidades = Nacionalidades::orderBy('descNacionalidade')->paginate(10);
        else
            $nacionalidades = Nacionalidades::where('descNacionalidade', 'like', '%'.$filtragem.'%')
                            ->orderBy("descNacionalidade")
                            ->paginate(5)
                            ->setpath('nacionalidades?desc_filtro='.$filtragem);
        return view('nacionalidades.index',['descNacionalidade'=>$nacionalidades]);
    }

    public function create(){
        return view('nacionalidades.create');
    }

    public function store(NacionalidadesRequest $request){
        $nova_nacionalidade = $request->all();
        Nacionalidades::create($nova_nacionalidade);

        return redirect()->route('nacionalidades');

    }

    // public function destroy($id){
    //     Nacionalidades::find($id)->delete();
    //     return redirect()->route('nacionalidades');
    // }
    public function destroy($id){
        try{
            Nacionalidades::find($id)->delete();
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
    //     $nacionalidades = Nacionalidades::find($id);
    //     return view('nacionalidades.edit',compact('nacionalidades'));
    // }

    public function edit(Request $request){
        $nacionalidades = Nacionalidades::find(\Crypt::decrypt($request->get('id')));
        return view('nacionalidades.edit',compact('nacionalidades'));
    }

    public function update(NacionalidadesRequest $request, $id){
        Nacionalidades::find($id)->update($request->all());
        return redirect()->route('nacionalidades');

    }
}
