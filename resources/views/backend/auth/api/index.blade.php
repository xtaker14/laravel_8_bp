@extends('backend.layouts.app')

@section('title', __('Auth API Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Auth API Management')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.auth.api.create')"
                :text="__('Create Auth API')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.auth-api-table />
        </x-slot>
    </x-backend.card>
@endsection
