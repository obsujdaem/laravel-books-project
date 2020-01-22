@extends('layouts.form')

@section('title')
    books
@endsection

@section('header')
    books
@endsection

@section('content')
    <div class="books-block">
        <table class="table" style="text-align: center;">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#id</th>
                <th scope="col">book</th>
                <th scope="col">author</th>
                <th scope="col">year</th>
                <th scope="col">edition</th>
                <th scope="col">average rating</th>
                <th scope="col">more detailed</th>
                <th scope="col">edit</th>
                <th scope="col">delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <th scope="row">{{$book->id}}</th>
                    <td>{{$book->name}}</td>
                    <td>{{$book->author->patronymic}} {{$book->author->name}} {{$book->author->surname}}</td>
                    <td>{{$book->year}}</td>
                    <td>{{$book->edition->name}}</td>
                    <td>
                        @if(count($book->assessments) > 0)
                            @foreach($book->assessments as $value)
                                <span style="display: none">
                                    {!! $sum += $value->assessment !!}
                                </span>
                            @endforeach
                            {{round($sum / count($book->assessments), 2)}}
                            {!! $sum = null !!}
                        @else
                            don't have rate yet
                        @endif
                    </td>
                    <td>
                        <a href="{{route('books.list.detailed', $book->id)}}">
                            <i class="fas fa-book-open" style="font-size: 25px;"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{route('books.list.edit', $book->id)}}">
                            <i class="far fa-edit" style="font-size: 25px;"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{route('books.list.delete', $book->id)}}">
                            <i class="far fa-trash-alt" style="font-size: 25px;"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
