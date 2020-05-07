@extends('layouts.app')
<!-- yield -->
@section('hero')
<!-- Hero -->
@include('components.hero')
<!-- /Hero -->
@endsection

@section('content')
@include('components.sponsors')
@include('components.footer') 
@endsection