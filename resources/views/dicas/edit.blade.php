@extends('adminlte::page')

@section('content')
    <h3>Editando a Dica: {{ $dica->titulo }}</h3>

    @if($errors->any())
        <ul class='alert alert-danger'>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>            
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>["dicas.update", 'id'=>$dica->id], 'method'=>'put']) !!}

    <div class="form-group">
        {!! Form::label('titulo', 'Titulo:') !!}
        {!! Form::text('titulo', $dica->titulo, ['class'=>'form-control','placeholder' => 'Escreva aqui o título da sua dica!', 'maxlength' => '99', 'required' ]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('descricao', 'Descrição:') !!}
        {!! Form::textarea('descricao',  $dica->descricao, ['class'=>'form-control', 'placeholder' => 'Explore aqui sua criatividade com as palavras!', 'maxlength' => '9999', 'required' ]) !!}
    </div>

    <div class="alert alert-secondary" role="alert">
        Lembre-se que o limite do texto são de 10.000 caracteres.
    </div>

    <div class="form-group">
        {!! Form::label('autor', 'Autor:') !!}
        {!! Form::select('autores_id',
                         \App\Models\Autores::orderBy('nome')->pluck('nome','id')->toArray(),
        $dica->autores_id, ['class'=>'form-control', 'required']) !!}
    </div>

        <div class='form-group'>
            {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
            {!! FOrm::reset('Último Estado Salvo', ['class'=>'btn btn-info'])!!} 
            <a href="{{ route('dicas', []) }}" class="btn btn-default">Voltar</a> 
        </div>
        

    {!! Form::close() !!}

@stop