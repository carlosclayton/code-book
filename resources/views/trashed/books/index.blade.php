@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Trash Books </h1>

                    <div class="panel-body">
                        <div class="row">
                            {!! Form::model(compact('search'), ['class' => 'form', 'method' => 'GET']) !!}
                            {!! Form::label('search', 'Search:') !!}
                            {!! Form::text('search', null , ['class' => 'form-control',  'placeholder'=> 'Input new Title here']) !!}
                            {!! Form::close() !!}
                        </div>


                        {!!
                    Table::withContents($books->items())->striped()
                    ->callback('Action', function($field, $book){
                        $edit = route('trashed.books.show', ['book' => $book->id]);
                        $dest = route('trashed.books.update', ['book' => $book->id]);
                        $index = "delete-form-{$book->id}";
                        $form = Form::open(['route' => ['trashed.books.update', 'book' => $book->id],  'method' => 'PUT', 'id' => $index, 'style' => 'display:none']).
                        Form::hidden('redirect_to', URL::previous()).
                        Form::close();

                        $anch = Button::link('Restore')
                        ->asLinkTo($dest)->addAttributes([
                        'onclick' => "event.preventDefault();document.getElementById(\"{$index}\").submit();"
                        ]);

                        return Button::link('Show')->asLinkTo($edit) . "|" . $anch . $form;

                    })

                    !!}
                    </div>
                </div>
                <div align="center"> {{ $books->links()  }}</div>
            </div>
        </div>
    </div>
@endsection
