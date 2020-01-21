@extends('layouts.form')

@section('title')
    book: {{$book->name}}
@endsection

@section('header')
    book: {{$book->name}}
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
                <th scope="col">city</th>
                <th scope="col">country</th>
                <th scope="col">readers</th>
                <th scope="col">assessment</th>
                <th scope="col">average rate</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">{{$book->id}}</th>
                <td>{{$book->name}}</td>
                <td>{{$book->author->patronymic}} {{$book->author->name}} {{$book->author->surname}}</td>
                <td>{{$book->year}}</td>
                <td>{{$book->edition->name}}</td>
                <td>{{$book->city->name}}</td>
                <td>{{$book->city->country->name}}</td>
                <td>
                    @if(count($book->assessments) > 0)
                        @foreach($book->assessments as $reader_id)
                            @foreach($reader_id->readers as $reader)
                                {{$reader->patronymic}} {{$reader->name}} {{$reader->surname}}
                                <br>
                            @endforeach
                        @endforeach
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if(count($book->assessments) > 0)
                        @foreach($book->assessments as $assessment )
                            {{$assessment->assessment}}<br>
                        @endforeach
                    @else
                        -
                    @endif
                </td>
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
                        -
                    @endif
                </td>
            </tbody>
        </table>
    </div>

@endsection

@section('book.list')
    <li>
        <a href="{{route('books.list')}}">books list</a>
    </li>
@endsection
