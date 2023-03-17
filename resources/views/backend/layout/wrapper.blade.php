{{-- 
@php 

@endphp

@include('backend/layout/head')
@include('backend/layout/header')
@include('backend/layout/menu')
@include($content)
@include('backend/layout/footer') 
--}}

@extends('backend.layouts.app')

@section('title', __($title))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang($title)
        </x-slot>

        {{-- <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.dashboard')"
                :text="__('Create New')"
            />
        </x-slot> --}}

        <x-slot name="body">
            @include($content)
        </x-slot>
    </x-backend.card>
@endsection
