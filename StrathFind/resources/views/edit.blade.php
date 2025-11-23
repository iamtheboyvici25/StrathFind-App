@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Claim</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('claims.update', $claim->id) }}" method="POST">
        @method('PUT')
        @include('claims._form')
    </form>
</div>
@endsection
