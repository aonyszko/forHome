@extends('layouts.default')

@section('content')

    <h1>Gerenciamento de Nacionalidades</h1>
    <br>

    {{-- BUSCA DE NACIONALIDADES --}}
    {!! Form::open(['name'=>'form_name', 'route'=>'nacionalidades']) !!}
    <div class="sidebar-form">
        <div class="input-group">
            <input type="text" name="desc_filtro" class="form-control" style="width: 80% !important;" placeholder="Pesquise aqui alguma nacionalidade...">
            <span class="input-group-btn"> 
                <button type="submit" name="search" id="search-btn" class="btn btn-default"> <i class="fa fa-search"> </i></button> 
            </span>
        </div>
    </div>
    {!! Form::close()!!}

    <table class="table table-stripe table-bordered table-hover"> 
        <thead>
            <th>ID</th>
            <th>Nacionalidade</th>
            <th>Ações</th>
            
        </thead>

        <tbody>
            @foreach($descNacionalidade as $nacionalidade)
                <tr>
                    <td>{{ $nacionalidade->id }}</td>
                    <td>{{ $nacionalidade->descNacionalidade }}</td>

                    <td>
                        <a href="{{ route('nacionalidades.edit',  ['id'=>\Crypt::encrypt($nacionalidade->id)]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{$nacionalidade->id}})" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
                @endforeach
        </tbody>

    </table>

    {{ $descNacionalidade->links("pagination::bootstrap-4") }}
    
    <a href="{{ route('nacionalidades.create', []) }}" class="btn btn-primary">Nova Nacionalidade</a>

@stop

@section('table-delete')
    "nacionalidades"
@endsection