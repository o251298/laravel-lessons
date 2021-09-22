@extends('layout')
@section('title', 'Places')
@section('content')

    <?php if(count($places)): ?>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
            </tr>
            </thead>
            <tbody>
            @foreach($places as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->title}}</td>
                <td>{{$item->typeName}}</td>
                <td><a href="/places/{{$item->id}}">ПРОСМОТР</a></td>
                <td>
                    <a href="/places/delete/{{$item->id}}">Удалить</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    <?php else: ?>
        <h2>Никаких мест нету</h2>
    <?php endif;?>
@endsection
