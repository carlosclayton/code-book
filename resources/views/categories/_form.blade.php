{!! Form::hidden('redirect_to', URL::previous()) !!}
{!! Html::openFormGroup('name', $errors) !!}
    {!! Form::label('name', 'Categoria:', ['class' =>'control-label']) !!}
    {!! Form::text('name', null , ['class' => 'form-control',  'placeholder'=> 'Input category here']) !!}
    {!! Form::error('name', $errors ) !!}
{!! Html::closeFormGroup() !!}

