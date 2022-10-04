@extends('adminlte::page')

@section('content')
    <h3>Editando o Gênero: {{ $genero->genero }}</h3>

    @if($errors->any())
        <ul class='alert alert-danger'>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>            
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>["generos.update", 'id'=>$genero->id], 'method'=>'put']) !!}

    <div class="form-group">
        {!! Form::label('genero', 'Gênero:') !!}
        {!! Form::text('genero', $genero->genero, ['class'=>'form-control','placeholder' => 'Escreva o gênero que deseja cadastrar aqui!', 'maxlength' => '99', 'required' ]) !!}
    </div>

        <div class='form-group'>
            {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
            {!! FOrm::reset('Último Estado Salvo', ['class'=>'btn btn-info'])!!} 
            <a href="{{ route('generos', []) }}" class="btn btn-default">Voltar</a> 
        </div>
        

    {!! Form::close() !!}

@stop