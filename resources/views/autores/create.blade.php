@extends('layouts.default')


@section('content')
    <h3>Novo Autor(a)</h3>

    @if($errors->any())
        <ul class='alert alert-danger'>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>            
            @endforeach
        </ul>
    @endif


    {!! Form::open(['route'=>'autores.store']) !!}  

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
                    {!! Form::text('nome', null, ['class'=>'form-control', 'placeholder' => 'Escreva o nome aqui', 'maxlength' => '99', 'required' ]) !!}
                </td>

                <td>
                    {!! Form::date('dataNascimento', null, ['class'=>'form-control', 'required' ]) !!}
                </td>

                <td>
                    {{-- Como forçar uma máscara de CPF com o Blade? --}}
                   {!! Form::text('cpf', null, ['class'=>'form-control', 'placeholder' => 'Ex: 123.123.123-12', 'maxlength' => '14', 'required' ]) !!}
                </td> 

                <td>
                    {!! Form::select('genero_id',
                                    \App\Models\Generos::orderBy('genero')->pluck('genero','id')->toArray(),
                    null, ['class'=>'form-control', 'required']) !!}
                </td> 

                <td>
                    {!! Form::select('nacionalidade_id',
                                    \App\Models\Nacionalidades::orderBy('descNacionalidade')->pluck('descNacionalidade','id')->toArray(),
                    null, ['class'=>'form-control', 'required']) !!}
                </td> 
              </tr>
            </tbody>
          </table>


        <div class='form-group'>
            {!! Form::submit('Criar', ['class'=>'btn btn-primary']) !!}
            {!! FOrm::reset('Limpar', ['class'=>'btn btn-info'])!!}  
            <a href="{{ route('autores', []) }}" class="btn btn-default">Voltar</a>
        </div> 

    </div>

    {!! Form::close() !!} 

@stop