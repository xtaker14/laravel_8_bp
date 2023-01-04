@extends('backend.layouts.app')

@section('title', __('Categories Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Categories Management')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.auth.categories.create')"
                :text="__('Create Categories')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.categories-table />
        </x-slot>
    </x-backend.card>
@endsection
