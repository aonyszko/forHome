@extends('layouts.default')

@section('content')

    <h1>Gerenciamento de Países</h1>
    <br>

    {{-- BUSCA DE NACIONALIDADES --}}
    {!! Form::open(['name'=>'form_name', 'route'=>'paises']) !!}
    <div class="sidebar-form">
        <div class="input-group">
            <input type="text" name="desc_filtro" class="form-control" style="width: 80% !important;" placeholder="Pesquise aqui algum país...">
            <span class="input-group-btn"> 
                <button type="submit" name="search" id="search-btn" class="btn btn-default"> <i class="fa fa-search"> </i></button> 
            </span>
        </div>
    </div>
    {!! Form::close()!!}

    <table class="table table-stripe table-bordered table-hover"> 
        <thead>
            <th>País</th>
            <th>Código</th>
            <th>Código 2</th>
            <th>Continente</th>
            <th>Ações</th>
            
        </thead>

        <tbody>
            @foreach($name as $pais)
                <tr>
                    <td>{{ $pais->name }}</td>
                    <td>{{ $pais->code }}</td>
                    <td>{{ $pais->code2 }}</td>
                    <td>{{ $pais->continent }}</td>

                    <td>
                        <a href="{{ route('paises.edit',  ['id'=>\Crypt::encrypt($pais->id)]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{$pais->id}})" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
                @endforeach
        </tbody>

    </table>

    {{ $name->links("pagination::bootstrap-4") }}
    
    <a href="{{ route('paises.create', []) }}" class="btn btn-primary">Novo País</a>

@stop

@section('table-delete')
    "paises"
@endsection