@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>
                            Categories {!! Button::primary('New')->asLinkTo(route('categories.create')) !!} </h1>

                    </div>

                    <div class="panel-body">
                        <div class="row" style="padding: 12px">
                            {!! Form::model([], ['class' => 'form', 'method' => 'GET']) !!}
                            {!! Form::label('search', 'Search:') !!}
                            {!! Form::text('search', null , ['class' => 'form-control',  'placeholder'=> 'Input new Title here']) !!}
                            {!! Form::close() !!}
                        </div>

                        {!!
                        Table::withContents($categories->items())->striped()
                        ->callback('Action', function($field, $category){
                            $edit = route('categories.edit', ['category' => $category->id]);
                            $dest = route('categories.destroy', ['category' => $category->id]);
                            $index = "delete-form-{$category->id}";
                            $form = Form::open(['route' => ['categories.destroy', 'category' => $category->id],  'method' => 'DELETE', 'id' => $index, 'style' => 'display:none']).
                            Form::close();

                            $anch = Button::link('Delete')
                            ->asLinkTo($dest)->addAttributes([
                            'onclick' => "event.preventDefault();document.getElementById(\"{$index}\").submit();"
                            ]);

                            return Button::link('Edit')->asLinkTo($edit) . "|" . $anch . $form;

                        })

                        !!}
                    </div>
                </div>
                <div align="center"> {{ $categories->links()  }}</div>
            </div>
        </div>
    </div>
@endsection
