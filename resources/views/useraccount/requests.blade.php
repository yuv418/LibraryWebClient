
@extends('layouts.base')
@section('title', "User Summary")


@section('content')
    <h1>My Requests</h1>

    @component('components.requests_table', ['requestsList' => $user->requests])

    @endcomponent

@endsection

