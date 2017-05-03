@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>New Category</h1></div>

                <div class="panel-body">
                    {!! Form::open(['route' => 'categories.store', 'class' => 'form']) !!}

                    @include('codeedubook::categories._form')

                    {!! Html::openFormGroup() !!}
                    {!! Button::info('New')->submit() !!}
                    {!! Html::closeFormGroup() !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
@endsection