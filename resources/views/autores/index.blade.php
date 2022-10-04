@extends('layouts.default')

@section('content')

    <h1>Gerenciamento de Autores</h1>
    <br>

    {{-- BUSCA DE AUTORES --}}
    {!! Form::open(['name'=>'form_name', 'route'=>'autores']) !!}
    <div class="sidebar-form">
        <div class="input-group">
            <input type="text" name="desc_filtro" class="form-control" style="width: 80% !important;" placeholder="Pesquise aqui o nome de algum(a) autor(a)...">
            <span class="input-group-btn"> 
                <button type="submit" name="search" id="search-btn" class="btn btn-default"> <i class="fa fa-search"> </i></button> 
            </span>
        </div>
    </div>
    {!! Form::close()!!}
    
    <table class="table table-stripe table-bordered table-hover"> 
        <thead>
            {{-- <th>ID</th> --}}
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>CPF</th>
            <th>Gênero</th>
            <th>Nacionalidade</th>
            <th>Ações</th>
        </thead>

        <tbody>
            @foreach($nome as $autor)
                <tr>
                    {{-- <td>{{ $autor->id }}</td> --}}
                    <td>{{ $autor->nome }}</td>
                    <td>{{ Carbon\Carbon::parse($autor->dataNascimento)->format('d/m/Y') }}</td>
                    <td>{{ $autor->cpf }}</td>
                    <td>{{ isset( $autor->genero->genero ) ? $autor->genero->genero  : "Gênero não informado!"}}</td>
                    <td>{{ isset( $autor->nacionalidade->descNacionalidade ) ? $autor->nacionalidade->descNacionalidade   : "Nacionalidade não informada!"}}</td>

                    <td>
                        <a href="{{ route('autores.edit', ['id'=>\Crypt::encrypt($autor->id)]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{$autor->id}})" class="btn-sm btn-danger">Remover</a>
                    </td>

                </tr>
                @endforeach
        </tbody>

    </table>

    {{ $nome->links("pagination::bootstrap-4") }}
    
    <a href="{{ route('autores.create', []) }}" class="btn btn-primary">Novo Autor(a)</a>

@stop

@section('table-delete')
    "autores"
@endsection