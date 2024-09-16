@extends('public.layouts.main')
@section('page', 'Topics Listing')
@section('content')
    @include('public.includes.popularTopics')
    @include('public.includes.trendingTopics')
@endsection
