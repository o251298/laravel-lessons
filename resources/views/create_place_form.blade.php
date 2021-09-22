@extends('layout')
@section('title', 'Добавить место')
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
    <div class="row">
        <div class="col-6">
            <form action="/places" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Имя места</label>
                    <input type="text" value="{{old('title')}}" name="title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ссылка</label>
                    <input type="text" name="link" value="{{old('link')}}" class="form-control">
                </div>
                        <select class="form-select" name="type" aria-label="Default select example">
                            <option selected>Тип места</option>
                            <option value="1">Кафе</option>
                            <option value="2">Ресторан</option>
                            <option value="3">Парк</option>
                        </select>
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Выберите фото</label>
                    <input class="form-control form-control-sm" value="{{old('image')}}"  name="image" type="file">
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
@endsection



