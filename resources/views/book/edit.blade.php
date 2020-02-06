@extends('layouts.main')

@section('title')
    edit book: {{$book->name}}
@endsection

@section('header')
    edit book: {{$book->name}}
@endsection

@section('content')
    <div class="flex-center">
        <form action="{{route('book.list.update')}}" method="post">
            @csrf
            <input type="hidden" name="book_id" value="{{$book->id}}">
            <div class="form-group">
                <label for="name">change name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{$book->name}}">
                @error('name')
                <h3>{{$message}}</h3>
                @enderror
            </div>
            <div class="form-group">
                <label for="author">change author</label>
                <select name="author" id="author">
                    <option value="{{$book->author->id}}">
                        {{$book->author->patronymic}} {{$book->author->name}} {{$book->author->surname}}
                    </option>
{{--                    <option value="322">322</option>--}} {{-- проверка валидации exists:author,id --}}
                    @foreach($authors as $author)
                        @if($book->author->id != $author->id)
                            <option value="{{$author->id}}">
                                {{$author->patronymic}} {{$author->name}} {{$author->sername}}
                            </option>
                        @endif
                    @endforeach
                </select>
                @error('author')
                <h3>{{$message}}</h3>
                @enderror
            </div>
            <div class="form-group">
                <label for="year">change year</label>
                <input type="number" name="year" id="year" value="{{$book->year}}">
                @error('year')
                <h3>{{$message}}</h3>
                @enderror
            </div>
            <div class="form-group">
                <label for="edition">change edition</label>
                <select name="edition" id="edition">
                    <option value="{{$book->edition->id}}">
                        {{$book->edition->name}}
                    </option>
                    @foreach($editions as $edition)
                        @if($book->edition->id != $edition->id)
                            <option value="{{$edition->id}}">
                                {{$edition->name}}
                            </option>
                        @endif
                    @endforeach
                </select>
                @error('edition')
                <h3>{{$message}}</h3>
                @enderror
            </div>
            <input type="submit" value="update book">
        </form>
    </div>

@endsection
