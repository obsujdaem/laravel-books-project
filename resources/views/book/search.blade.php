@extends('layouts.main')

@section('title')
    search book
@endsection

@section('header')
    search book
@endsection

@section('content')
    <div class="flex-center">
        <form action="{{route('books.search')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="filter">choose filter for search</label>
                <select name="filter" id="filter">
                    @foreach($tables as $table)
                        @if($table != 'books' && $table != 'migrations' && $table != 'assessments')
                            <option value="{{$table}}">
                                {{$table}}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
            @error('filter')
            <h3>{{$message}}</h3>
            @enderror
            <div class="form-group">
                <label for="search">search</label>
                <input type="text" name="search" id="search">
            </div>
            <input type="submit" value="search">
        </form>
        @if($result)
            @foreach($result as $name)
                <h2 style="margin-top: 33px;">matching request - {{$name->name}}, for more detail - <a href="{{route('books.list.detailed', $name->id)}}">
                        <i class="fas fa-book-open" style="font-size: 25px;"></i>
                    </a></h2>
            @endforeach
        @else
            <h2>no matches found</h2>
        @endif
    </div>

@endsection
