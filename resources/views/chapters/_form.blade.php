{!! Form::hidden('redirect_to', URL::previous()) !!}


{!! Html::openFormGroup('chapter', $errors) !!}
    {!! Form::label('chapter', 'Chapter:') !!}
    {!! Form::text('chapter', null , ['class' => 'form-control',  'placeholder'=> 'Input new Title here']) !!}
{!! Form::error('chapter', $errors ) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('order', $errors) !!}
    {!! Form::label('order', 'Order:') !!}
    {!! Form::text('order', 1 , ['class' => 'form-control',  'placeholder'=> 'Input new SubTitle here']) !!}
{!! Form::error('order', $errors ) !!}
{!! Html::closeFormGroup() !!}


{!! Html::openFormGroup('content', $errors) !!}
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null , ['class' => 'form-control',  'placeholder'=> 'Input new Content here']) !!}
{!! Form::error('content', $errors ) !!}
{!! Html::closeFormGroup() !!}



