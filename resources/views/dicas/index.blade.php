@extends('layouts.default')

@section('content')

    <h1>Gerenciamento de Dicas</h1>
    <br>

    {{-- BUSCA DE DICAS --}}
    {!! Form::open(['name'=>'form_name', 'route'=>'dicas']) !!}
    <div class="sidebar-form">
        <div class="input-group">
            <input type="text" name="desc_filtro" class="form-control" style="width: 80% !important;" placeholder="Pesquise aqui o título de alguma dica...">
            <span class="input-group-btn"> 
                <button type="submit" name="search" id="search-btn" class="btn btn-default"> <i class="fa fa-search"> </i></button> 
            </span>
        </div>
    </div>
    {!! Form::close()!!}

    {{-- Grid de listagem --}}
    <table class="table table-stripe table-bordered table-hover"> 
        <thead>
            {{-- <th>ID</th> --}}
            <th>Titulo</th>
            <th>Autor</th>
            <th>Ações</th>
        </thead>

        <tbody>
            @foreach($dicas as $dica)
                <tr>
                    {{-- <td>{{ $dica->id }}</td> --}}
                    <td>{{ $dica->titulo }}</td>
                    <td>{{ isset( $dica->autores->nome ) ? $dica->autores->nome  : "Autor não informado!"}}</td>
                    <td>
                        <a href="{{ route('dicas.edit',  ['id'=>\Crypt::encrypt($dica->id)]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{$dica->id}})" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
                @endforeach
        </tbody>

    </table>

    {{ $dicas->links("pagination::bootstrap-4") }}
    
    <a href="{{ route('dicas.create', []) }}" class="btn btn-primary">Nova dica</a>

@stop

@section('table-delete')
    "dicas"
@endsection