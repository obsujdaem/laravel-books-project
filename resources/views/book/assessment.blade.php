@extends('layouts.main')

@section('title')
    assessment
@endsection

@section('header')
    assessment
@endsection

@section('content')
    <div class="flex-center">
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="reader">who are you?</label>
                <select name="reader_id" id="reader" class="form-control">
                    @foreach($readers as $reader)
                        <option
                            value="{{$reader->id}}">{{$reader->patronymic}} {{$reader->surname}} {{$reader->name}}</option>
                    @endforeach
                </select>
                @error('reader')
                <h3>{{$message}}</h3>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">choose book</label>
                <select name="book_id" id="reader" class="form-control">
                    @foreach($books as $book)
                        <option value="{{$book->id}}">{{$book->patronymic}} {{$book->surname}} {{$book->name}}</option>
                    @endforeach
                </select>
                @error('book')
                <h3>{{$message}}</h3>
                @enderror
            </div>
            <div class="form-group">
                <label for="assessment">rate book</label>
                <input type="range" class="form-control-range" id="assessment" name="rate">
            </div>
            @error('assessment')
            <h3>{{$message}}</h3>
            @enderror
            <input type="submit" class="btn btn-primary" value="rate" style="margin-top: 20px;">
        </form>
    </div>
@endsection
