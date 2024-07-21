@extends('layouts.master')
@section('title', __('messages.web.customer.title'))
@section('content')
@section('addBreadcrumb')
    @include('components.breadcrumb.index', [
        'breadcrumb' => [
            ['title' => __('messages.web.home.title'), 'url' => '#'],
            ['title' => __('messages.web.customer.title'), 'url' => '#'],
        ],
    ])
@stop

@stop
@section('addjs')
@if (session('success') || session('error'))
    {{-- @include('components.partials.toastr') --}}
@endif
@stop
