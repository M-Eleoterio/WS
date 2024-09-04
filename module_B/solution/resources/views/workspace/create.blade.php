@extends('templates.template')
@section('title', 'New workspace')
@section('content')

<div id="new-ws-container">
        <h1>New Workspace</h1>
        <form action={{ route('workspace.store') }} id="new-ws-form" method="post">
            @csrf
            <input type="text" name="title" id="new-ws-input-title" placeholder="title" required>
            <textarea name="description" id="new-ws-description">This is a nice workspace.</textarea>
            <button type="submit" id="new-ws-btn" class="btn">Create</button>
        </form>
    </div>

@endsection