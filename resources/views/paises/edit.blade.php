@extends('adminlte::page')

@section('content')
    <h3>Editando o País:  {{ $pais->name }}</h3>
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

    {!! Form::open(['route'=>["paises.update", 'id'=>$pais->id], 'method'=>'put']) !!}

    <table class="table">
        <thead>
          <tr>
            <th scope="col">País</th>
            <th scope="col">Código</th>
            <th scope="col">Código 2</th>
            <th scope="col">Continente</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>
                {!! Form::text('name', $pais->name, ['class'=>'form-control', 'placeholder' => 'Escreva o nome do país aqui', 'maxlength' => '80', 'required' ]) !!}
            </td>

            <td>
                {!! Form::text('code', $pais->code, ['class'=>'form-control', 'placeholder' => 'Escreva o código aqui', 'maxlength' => '3', 'required' ]) !!}
            </td>

            <td>
                {!! Form::text('code2', $pais->code2, ['class'=>'form-control', 'placeholder' => 'Escreva o código 2 aqui', 'maxlength' => '2', 'required' ]) !!}
            </td> 

            <td>
                {!! Form::text('continent', $pais->continent, ['class'=>'form-control', 'placeholder' => 'Escreva o continente aqui', 'maxlength' => '30', 'required' ]) !!}
            </td> 

          </tr>
        </tbody>
      </table>

        <div class='form-group'>
            {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
            {!! FOrm::reset('Último Estado Salvo', ['class'=>'btn btn-info'])!!} 

            <a href="{{ route('paises', []) }}" class="btn btn-default">Voltar</a> 
        </div>
         

    {!! Form::close() !!}

@stop