@extends('templates.template')
@section('title', 'New workspace')
@section('content')
    <h1>New Workspace</h1>

    <div id="new-ws">
        <form action={{ route('workspace.store') }} id="new-ws-form" method="post">
            @csrf
            <input type="text" name="title" id="new-ws-input-title" placeholder="title" required>
            <textarea name="description" id="new-ws-description">This is a nice workspace.</textarea>
            <button type="submit" id="new-ws-btn" class="btn">Create</button>
        </form>
    </div>

@endsection