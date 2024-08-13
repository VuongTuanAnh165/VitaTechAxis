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
<div class="content">
    <h2 class="mt-10 text-lg font-medium intro-y">
        {{ __('messages.web.common.list') }} {{ __('messages.web.customer.title') }}
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="flex flex-wrap items-center col-span-12 mt-2 intro-y sm:flex-nowrap">
            <div class="hidden mx-auto md:block text-slate-500"></div>
            <div class="w-full mt-3 sm:w-auto sm:mt-0 sm:ml-auto md:ml-0">
                <div class="relative w-56 text-slate-500">
                    @include('components.form.search.type1', [
                        'placeholder' => __('messages.web.customer.placeholder.search'),
                        'action' => route('admin.user.index'),
                        'name' => 'keySearch',
                    ])
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        @include('components.list.type1', [
            'data' => $users,
        ])
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        {{ $users->links('components.pagination.type1') }}
        <!-- END: Pagination -->
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    @include('components.modal.delete')
    <!-- END: Delete Confirmation Modal -->
</div>
@stop
@section('addjs')
@stop
