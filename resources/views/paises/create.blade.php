@extends('layouts.default')


@section('content')
    <h3>Novo País</h3>

    @if($errors->any())
        <ul class='alert alert-danger'>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>            
            @endforeach
        </ul>
    @endif


    {!! Form::open(['route'=>'paises.store']) !!}  

        <table class="table">
            <thead>
              <tr>
                <th scope="col">País</th>
                <th scope="col">Código</th>
                <th scope="col">Código 2</th>
                <th scope="col">Continente</th>
              </tr>
            </thead>

            <div class="alert alert-secondary" role="alert">
                Use notação internacional (língua inglesa)!
            </div>
    

            <tbody>
              <tr>
                <td>
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder' => 'Escreva o nome do país aqui', 'maxlength' => '80', 'required' ]) !!}
                </td>

                <td>
                    {!! Form::text('code', null, ['class'=>'form-control', 'placeholder' => 'Escreva o código aqui', 'maxlength' => '3', 'required' ]) !!}
                </td>

                <td>
                    {!! Form::text('code2', null, ['class'=>'form-control', 'placeholder' => 'Escreva o código 2 aqui', 'maxlength' => '2', 'required' ]) !!}
                </td> 

                <td>
                    {!! Form::text('continent', null, ['class'=>'form-control', 'placeholder' => 'Escreva o continente aqui', 'maxlength' => '30', 'required' ]) !!}
                </td> 

              </tr>
            </tbody>
          </table>


        <div class='form-group'>
            {!! Form::submit('Criar', ['class'=>'btn btn-primary']) !!}
            {!! FOrm::reset('Limpar', ['class'=>'btn btn-info'])!!}  

            <a href="{{ route('paises', []) }}" class="btn btn-default">Voltar</a>
        </div> 

    </div>

    {!! Form::close() !!} 

@stop