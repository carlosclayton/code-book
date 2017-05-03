@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Show Book ({{ $book->title }}) </h1>
                    <h3>Book</h3>
                    <ul class="list-group">
                        <li class="list-group-item"> {{ $book->title }} </li>
                        <li class="list-group-item"> {{ $book->subtitle }} </li>
                        <li class="list-group-item"> R$ {{ number_format($book->price, 2, ',', '')  }} </li>
                    </ul>

                    <h3>Categories</h3>
                    <ul class="list-group">
                        @foreach($book->categories as $category)
                        <li class="list-group-item"> {{ $category->name_trashed }} </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection
