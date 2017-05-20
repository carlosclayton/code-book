@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Chapters of  {{ $book->title }}</h1>
                        {!! Button::primary('New')->asLinkTo(route('chapters.create', ['book'=> $book->id])) !!}

                    <div class="panel-body">
                        <div class="row">
                            {!! Form::model(compact('search'), ['class' => 'form', 'method' => 'GET']) !!}
                            {!! Form::label('search', 'Search:') !!}
                            {!! Form::text('search', null , ['class' => 'form-control',  'placeholder'=> 'Input new Title here']) !!}
                            {!! Form::close() !!}
                        </div>


                        {!!
                    Table::withContents($chapters->items())->striped()
                    ->callback('Action', function($field, $chapter) use ($book){
                        $edit = route('chapters.edit', ['book'=> $book->id, 'chapter' => $chapter->id]);
                        $dest = route('chapters.destroy', ['book'=> $book->id, 'chapter' => $chapter->id]);
                        $index = "delete-form-{$chapter->id}";
                        $form = Form::open(['route' => ['chapters.destroy','book'=> $book->id,  'chapter' => $chapter->id],  'method' => 'DELETE', 'id' => $index, 'style' => 'display:none']).
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
                <div align="center"> {{ $chapters->links()  }}</div>
            </div>
        </div>
    </div>
@endsection
