@extends('adminlte::page')

@section('content')
    <h3>Editando a Nacionalidade: {{ $nacionalidades->descNacionalidade }}</h3>

    @if($errors->any())
        <ul class='alert alert-danger'>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>            
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>["nacionalidades.update", 'id'=>$nacionalidades->id], 'method'=>'put']) !!}

    <div class="form-group">
        {!! Form::label('descNacionalidade', 'Nacionalidade:') !!}
        {!! Form::text('descNacionalidade', $nacionalidades->descNacionalidade, ['class'=>'form-control','placeholder' => 'Escreva a nacionalidade que deseja cadastrar aqui!', 'maxlength' => '99', 'required' ]) !!}
    </div>

        <div class='form-group'>
            {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
            {!! FOrm::reset('Último Estado Salvo', ['class'=>'btn btn-info'])!!} 
            <a href="{{ route('nacionalidades', []) }}" class="btn btn-default">Voltar</a> 
        </div>
        

    {!! Form::close() !!}

@stop