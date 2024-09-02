@extends('templates.template')
@section('title', 'Dashboard')
@section('content')
    <h1>Workspaces</h1>
    @foreach ($workspaces as $workspace)
        <div class="workspace" style="border: 1px solid gray; margin-bottom: 20px">
            <h2>#{{$workspace['id']}} - {{$workspace['title']}}</h2>
            <h4>{{$workspace['description']}}</h4>
            <a href={{ route("view.workspace", ["id" => $workspace['id']]) }}>Go to</a>
        </div>

    @endforeach
@endsection