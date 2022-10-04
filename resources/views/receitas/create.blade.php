@extends('adminlte::page')

@section('content')
    <h3>Nova Receita</h3>

    @if($errors->any())
        <ul class='alert alert-danger'>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>            
            @endforeach
        </ul>
    @endif

    
    {!! Form::open(['route'=>'receitas.store']) !!}

        <div class="form-group">
            {!! Form::label('titulo', 'Titulo:') !!}
            {!! Form::text('titulo', null, ['class'=>'form-control', 'placeholder' => 'Escreva aqui o título da sua receita!', 'maxlength' => '80', 'required' ]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('descricao', 'Receita:') !!}
            {!! Form::textarea('descricao', null, ['class'=>'form-control', 'placeholder' => 'Escreva sua receita aqui!', 'maxlength' => '9999', 'required' ]) !!}
        </div>

        <div class="alert alert-secondary" role="alert">
            Lembre-se que o limite do texto são de 10.000 caracteres.
        </div>

        <div class="form-group">
            {!! Form::label('autor', 'Autor:') !!}
            {!! Form::select('autores_id',
                            \App\Models\Autores::orderBy('nome')->pluck('nome','id')->toArray(),
            null, ['class'=>'form-control', 'required']) !!}
        </div>

        {{-- Início do MasterDetaill aqui --}}

        <h5>Países de culinária típica:</h5>
        <hr/>
        <div class="input_fields_wrap"></div>

        <br>
        <button style="float:left" class="add_field_button btn btn-secondary">Adicionar País</button>

        <br> <br>
        <div class="form-group">
            {!! Form::submit('Criar Receita', ['class'=>'btn btn-primary', 'style'=>'float:left']) !!}
        </div>

    {!! Form::close() !!}  

@stop

@section('js')
        <script>
            $(document).ready(function(){
                var wrapper = $(".input_fields_wrap");
                var add_button = $(".add_field_button");
                var x=0;
                $(add_button).click(function(e){
                    x++;
                    var newField = '<div><div style="width:94%; float:left" id="pais">{!! Form::select("paises[]", \App\Models\Paises::orderBy("name")->pluck("name","id")->toArray(),null,["class"=>"form-control", "required", "placeholder"=>"Selecione um país!"]) !!} </div> <button type="button" class="remove_field btn btn-danger btn-circle"> <i class="fa fa-times"></button></div>';
                    $(wrapper).append(newField);
                });
                $(wrapper).on("click",".remove_field", function(e){
                    e.preventDefault();
                    $(this).parent('div').remove();
                    x--;
                });
            })
        </script>

        @stop
{{-- @endsection('js') --}}