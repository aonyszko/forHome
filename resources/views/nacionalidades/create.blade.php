@extends('adminlte::page')

@section('content')
    <h3>Nova Nacionalidade</h3>

    @if($errors->any())
        <ul class='alert alert-danger'>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>            
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'nacionalidades.store']) !!}

        <div class="form-group">
            {!! Form::label('descNacionalidade', 'Nacionalidade:') !!}
            {!! Form::text('descNacionalidade', null, ['class'=>'form-control', 'placeholder' => 'Escreva a nacionalidade que deseja cadastrar aqui!', 'maxlength' => '99', 'required' ]) !!}
        </div>

        <div class='form-group'>
            {!! Form::submit('Criar Nacionalidade', ['class'=>'btn btn-primary']) !!}
            {!! FOrm::reset('Limpar', ['class'=>'btn btn-info'])!!}  
            <a href="{{ route('nacionalidades', []) }}" class="btn btn-default">Voltar</a>
        </div>
        
    {!! Form::close() !!} 

@stop