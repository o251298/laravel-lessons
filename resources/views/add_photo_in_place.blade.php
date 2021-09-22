@extends('layout')
@section('content')
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <h3>{{$place->title}}</h3>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="formFile" class="form-label">Выберите фото</label>
            <input class="form-control" type="file" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Загрузить фото</button>
    </form>
@endsection
