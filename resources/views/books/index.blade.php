@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Books {!! Button::primary('New')->asLinkTo(route('books.create')) !!} </h1>

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
                        $edit = route('books.edit', ['book' => $book->id]);
                        $dest = route('books.destroy', ['book' => $book->id]);
                        $index = "delete-form-{$book->id}";
                        $form = Form::open(['route' => ['books.destroy', 'book' => $book->id],  'method' => 'DELETE', 'id' => $index, 'style' => 'display:none']).
                        Form::close();

                        $anch = Button::link('Send to Trash')
                        ->asLinkTo($dest)->addAttributes([
                        'onclick' => "event.preventDefault();document.getElementById(\"{$index}\").submit();"
                        ]);

                        return Button::link('Edit')->asLinkTo($edit) . "|" . $anch . $form;

                    })

                    !!}
                    </div>
                </div>
                <div align="center"> {{ $books->links()  }}</div>
            </div>
        </div>
    </div>
@endsection
