@extends('layout')
@section('title', $place->title)
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{$place->title}}</h5>
            <p class="card-text">
            {{$place->typeName}}
            <ul>
                <li><a href="{{$place->link}}">{{$place->link}}</a></li>
            </ul>
            </p>
            <p class="card-text"><small class="text-muted">{{$place->created_at}}</small></p>
            <a href="/places/{{$place->id}}/photos/add" class="btn btn-warning"> Добавить фото </a>
        </div>
        @foreach($picture as $item)
        <img src="{{asset('/storage/' . $item->picture)}}" class="card-img-bottom" alt="...">
        @endforeach
    </div>
@endsection
