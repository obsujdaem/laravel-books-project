<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>addBook</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
<div class="flex-center">
    <h1>Add Book</h1>
    <form action="" method="post">
        <label for="reader">who are your?</label>
        <select name="reader" id="reader">
            @foreach($readers as $reader)
                <option value="{{$reader->id}}">{{$reader->patronymic}} {{$reader->name}} {{$reader->surname}}</option>
            @endforeach
        </select>
        <label for="name">input name</label>
        <input type="text" name="name" id="name" placeholder="book name..">
        <label for="author">select author</label>
        <select name="author" id="author">
            @foreach($authors as $author)
                <option value="{{$author->id}}">{{$author->patronymic}} {{$author->name}} {{$author->surname}}</option>
            @endforeach
        </select>
        <label for="year">input date</label>
        <input type="number" name="year" id="year">
        <label for="edition">select edition</label>
        <select name="edition" id="edition">
            @foreach($editions as $edition)
                <option value="{{$edition->id}}">{{$edition->name}}</option>
            @endforeach
        </select>
        <label for="assessment">input your mark</label>
        <input type="number" name="assessment" id="assessment" placeholder="your mark..">
        <input type="submit" value="addReview" style="margin-top: 20px;">
    </form>
</div>
</body>
</html>
