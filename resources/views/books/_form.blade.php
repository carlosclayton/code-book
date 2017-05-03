{!! Form::hidden('redirect_to', URL::previous()) !!}

{!! Html::openFormGroup('author') !!}
{!! Form::label('Author', 'Author:') !!}
{!! Form::text('author', $author , ['class' => 'form-control',  'placeholder'=> 'Input new Title here', 'disabled']) !!}
{!! Html::closeFormGroup() !!}


{!! Html::openFormGroup('title', $errors) !!}
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null , ['class' => 'form-control',  'placeholder'=> 'Input new Title here']) !!}
{!! Form::error('title', $errors ) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('subtitle', $errors) !!}
    {!! Form::label('subtitle', 'SubTitle:') !!}
    {!! Form::text('subtitle', null , ['class' => 'form-control',  'placeholder'=> 'Input new SubTitle here']) !!}
{!! Form::error('subtitle', $errors ) !!}
{!! Html::closeFormGroup() !!}


{!! Html::openFormGroup('price', $errors) !!}
    {!! Form::label('Price', 'Price:') !!}
    {!! Form::text('price', null , ['class' => 'form-control',  'placeholder'=> 'Input new price here']) !!}
{!! Form::error('price', $errors ) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup(['categories', 'categories.*'], $errors) !!}
    {!! Form::label('categories[]', 'Categories:') !!}
    {!! Form::select('categories[]', $categories , null, ['class' => 'form-control', 'multiple'=> true]) !!}
    {!! Form::error('categories', $errors ) !!}
    {!! Form::error('categories.*', $errors ) !!}
{!! Html::closeFormGroup() !!}



