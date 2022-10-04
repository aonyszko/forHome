@extends('adminlte::page')

@section('content')
    <h3>Novo Gênero</h3>

    @if($errors->any())
        <ul class='alert alert-danger'>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>            
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'generos.store']) !!}

        <div class="form-group">
            {!! Form::label('genero', 'Gênero:') !!}
            {!! Form::text('genero', null, ['class'=>'form-control', 'placeholder' => 'Escreva o gênero que deseja cadastrar aqui!', 'maxlength' => '99', 'required' ]) !!}
        </div>

        <div class='form-group'>
            {!! Form::submit('Criar', ['class'=>'btn btn-primary']) !!}
            {!! FOrm::reset('Limpar', ['class'=>'btn btn-info'])!!}  
            <a href="{{ route('generos', []) }}" class="btn btn-default">Voltar</a>
        </div>
        
    {!! Form::close() !!} 

@stop