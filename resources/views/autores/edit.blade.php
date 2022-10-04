@extends('adminlte::page')

@section('content')
    <h3>Editando Autor(a):  {{ $autor->nome }}</h3>
    <br>

    @if($errors->any())
        <ul class='alert alert-danger'>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>            
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>["autores.update", 'id'=>$autor->id], 'method'=>'put']) !!}

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">CPF</th>
            <th scope="col">Gênero</th>
            <th scope="col">Nacionalidade</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>
                {!! Form::text('nome', $autor->nome, ['class'=>'form-control', 'placeholder' => 'Escreva o nome aqui', 'maxlength' => '99', 'required' ]) !!}
            </td>

            <td>
                {!! Form::date('dataNascimento', $autor->dataNascimento, ['class'=>'form-control', 'required' ]) !!}
            </td>

            <td>
                {{-- Como forçar uma máscara de CPF com o Blade? --}}
                {!! Form::text('cpf', $autor->cpf, ['class'=>'form-control', 'placeholder' => 'Ex: 123.123.123-12', 'maxlength' => '14', 'required' ]) !!}
            </td> 

            <td>
                {!! Form::select('genero_id',
                                \App\Models\Generos::orderBy('genero')->pluck('genero','id')->toArray(),
                $autor->genero_id, ['class'=>'form-control', 'required']) !!}
            </td> 

            <td>
                {!! Form::select('nacionalidade_id',
                                \App\Models\Nacionalidades::orderBy('descNacionalidade')->pluck('descNacionalidade','id')->toArray(),
                $autor->nacionalidade_id, ['class'=>'form-control', 'required']) !!}
            </td> 
          </tr>
        </tbody>
      </table>

        <div class='form-group'>
            {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
            {!! FOrm::reset('Último Estado Salvo', ['class'=>'btn btn-info'])!!} 
            <a href="{{ route('autores', []) }}" class="btn btn-default">Voltar</a> 
        </div>
         

    {!! Form::close() !!}

@stop