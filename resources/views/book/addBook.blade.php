@extends('layouts.main')

@section('title')
    addBook
@endsection

@section('header')
    addBook
@endsection

@section('content')
    <div class="flex-center">
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="name">input name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="book name..">
                @error('name')
                <h3>{{$message}}</h3>
                @enderror
            </div>
            <div class="form-group">
                <label for="author">select author</label>
                <select name="author" id="author" class="form-control">
                    @foreach($authors as $author)
                        <option
                            value="{{$author->id}}">{{$author->patronymic}} {{$author->name}} {{$author->surname}}</option>
                    @endforeach
                </select>
            </div>
            @error('author')
            <h3>{{$message}}</h3>
            @enderror
            <div class="form-group">
                <label for="year">input date</label>
                <input type="number" name="year" id="year" class="form-control" placeholder="0-2020 year">
                @error('year')
                <h3>{{$message}}</h3>
                @enderror
            </div>
            <div class="form-group">
                <label for="edition">select edition</label>
                <select name="edition" id="edition" class="form-control">
                    @foreach($editions as $edition)
                        <option value="{{$edition->id}}">{{$edition->name}}</option>
                    @endforeach
                </select>
                @error('edition')
                <h3>{{$message}}</h3>
                @enderror
            </div>
            <input type="submit" value="addReview" class="btn btn-primary" style="margin-top: 20px;">
        </form>
    </div>
@endsection
