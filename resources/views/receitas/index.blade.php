@extends('layouts.default')

@section('content')

    <h1>Gerenciamento de Receitas</h1>
    <br>

    {{-- BUSCA DE DICAS --}}
    {!! Form::open(['name'=>'form_name', 'route'=>'receitas']) !!}
    <div class="sidebar-form">
        <div class="input-group">
            <input type="text" name="desc_filtro" class="form-control" style="width: 80% !important;" placeholder="Pesquise aqui o título de alguma receita...">
            <span class="input-group-btn"> 
                <button type="submit" name="search" id="search-btn" class="btn btn-default"> <i class="fa fa-search"> </i></button> 
            </span>
        </div>
    </div>
    {!! Form::close()!!}

    {{-- Grid de listagem --}}
    <table class="table table-stripe table-bordered table-hover"> 
        <thead>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Países Típicos</th>
            <th>Ações</th>
        </thead>

        <tbody>
            @foreach($titulo as $receita)
                <tr>
                    <td>{{ $receita->titulo }}</td>
                    <td>{{ isset( $receita->autores->nome ) ? $receita->autores->nome  : "Autor não informado!"}}</td>
                    <td>
                        @foreach($receita->receitasPaises as $a)
                            <li>{{ $a->paises->name}}</li>
                        @endforeach
                    </td>

                    <td>
                        <a href="{{ route('receitas.edit',  ['id'=>\Crypt::encrypt($receita->id)]) }}" class="btn-sm btn-success">Consultar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{$receita->id}})" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
                @endforeach
        </tbody>

    </table>

    {{ $titulo->links("pagination::bootstrap-4") }}
    
    <a href="{{ route('receitas.create', []) }}" class="btn btn-primary">Nova receita</a>

@stop

@section('table-delete')
    "receitas"
@endsection