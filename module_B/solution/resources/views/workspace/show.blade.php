@extends('templates.template')
@section('title', $workspace['title'])
@section('content')
<h1>Workspace - {{$workspace['title']}}</h1>
@foreach ($tokens as $token)
    <div class="token">
        <h2>{{ $token['name'] }} |
            @if ($token['revoked'])
                Revoked
            @else
                Active
            @endif
        </h2>
        <p>Created at {{ $token['created_at'] }}</p>
        @if ($token['revoked'])
            <p>Revoked at {{ $token['revocation_date'] }}</p>
        @endif
        @if (!$token['revoked'])
            <a href={{ route('token.revoke', ['id' => $token['id']]) }}>Revoke it</a>
        @endif
    </div>
@endforeach
<a href={{ route('token.create') }}>New Token</a>
@endsection