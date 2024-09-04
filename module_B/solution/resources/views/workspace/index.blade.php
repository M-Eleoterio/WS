@extends('templates.template')
@section('title', 'Workspaces')
@section('content')
<h1>Workspaces</h1>
<a href={{ route('workspace.create') }} id="new-ws">Create new Workspace</a>
<div id="ws-container">
    @foreach ($workspaces as $workspace)
        <div class="workspace" style="border: 1px solid gray; margin-bottom: 20px">
            <h2>#{{$workspace['id']}} - {{$workspace['title']}}</h2>
            <h4>{{$workspace['description']}}</h4>
            <a href={{ route("workspace.show", ["id" => $workspace['id']]) }}>Go to ></a>
        </div>

    @endforeach
</div>
@endsection