@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('live.search') }}">
        <div class="form-group">
            @csrf
            <input class="form-control mx-auto" name="keyword" value="{{ Request::get('keyword') }}" type="search" placeholder="Search DJ lives..." aria-label="Search" style="width: 40%;">
        </div>
    </form>
@endsection