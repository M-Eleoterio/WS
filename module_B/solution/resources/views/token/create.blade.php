@extends('templates.template')

@section('title', 'New token')
@section('content')

<form action={{ route('token.create') }} method="post">
    @csrf
    <input type="text" name="name" placeholder="Token name">
    <select name="workspace_id">
        @foreach ($workspaces as $workspace)
            <option value={{$workspace['id']}}>{{$workspace['title']}}</option>
        @endforeach
    </select>
    <button type="submit">Create</button>
</form>

@if(session('message'))
    <p style="color:red;">{{session('message')}}</p>
@endif
@endsection