@extends('layouts.default')

@section('content')

    <h1>Gerenciamento de Gêneros</h1>
    <br>

    {{-- BUSCA DE GÊNEROS --}}
    {!! Form::open(['name'=>'form_name', 'route'=>'generos']) !!}
    <div class="sidebar-form">
        <div class="input-group">
            <input type="text" name="desc_filtro" class="form-control" style="width: 80% !important;" placeholder="Pesquise aqui algum gênero...">
            <span class="input-group-btn"> 
                <button type="submit" name="search" id="search-btn" class="btn btn-default"> <i class="fa fa-search"> </i></button> 
            </span>
        </div>
    </div>
    {!! Form::close()!!}
    
    <table class="table table-stripe table-bordered table-hover"> 
        <thead>
            <th>ID</th>
            <th>Gênero</th>
            <th>Ações</th>
            
        </thead>

        <tbody>
            @foreach($generos as $genero)
                <tr>
                    <td>{{ $genero->id }}</td>
                    <td>{{ $genero->genero }}</td>

                    <td>
                        <a href="{{ route('generos.edit', ['id'=>\Crypt::encrypt($genero->id)]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{$genero->id}})" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
                @endforeach
        </tbody>

    </table>

    {{ $generos->links("pagination::bootstrap-4") }}
    
    <a href="{{ route('generos.create', []) }}" class="btn btn-primary">Novo Gênero</a>

@stop

@section('table-delete')
    "generos"
@endsection