@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Update Auth API'))

@php
    $val_name = empty(old('name')) ? $authApi->name : old('name'); 
    $val_token_non_hash = empty(old('token_non_hash')) ? $authApi->token_non_hash : old('token_non_hash'); 
    $val_tokenable_id = empty(old('user')) ? $authApi->tokenable_id : old('user'); 
    $val_abilities = empty(old('abilities')) ? $authApi->abilities[0] : old('abilities'); 
@endphp

@push('after-scripts') 
    {{-- <script src="{{ asset('js/backend/api/create.js')}}"></script> --}}
@endpush

@section('content')
    <x-forms.patch :action="route('admin.auth.api.update', $authApi)" id="form_submit">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Auth API')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.api.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div x-data="">
                    <div class="form-group row">
                        <label for="" class="col-md-2 col-form-label">@lang('User')</label>

                        <div class="col-md-4">
                            {{-- <livewire:components.backend.select2-user /> --}}
                            @livewire('components.backend.select2-user', ['is_required' => 'yes', 'current_value' => $val_tokenable_id, 'is_readonly' => 'yes',])
                        </div> 
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">Token Name</label>

                        <div class="col-md-4">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Token Name') }}" value="{{ $val_name }}" maxlength="200" required />
                        </div> 
                        
                        <label for="abilities" class="col-md-2 col-form-label">Abilities</label>

                        <div class="col-md-4">
                            <select name="abilities" class="form-control" required>
                                <option value="*" {{ $val_abilities == '*' ? 'selected' : '' }}>
                                    ALL
                                </option>
                                <option value="read" {{ $val_abilities == 'read' ? 'selected' : '' }}>
                                    Read
                                </option>
                                <option value="create" {{ $val_abilities == 'create' ? 'selected' : '' }}>
                                    Create
                                </option>
                                <option value="update" {{ $val_abilities == 'update' ? 'selected' : '' }}>
                                    Update
                                </option>
                                <option value="delete" {{ $val_abilities == 'delete' ? 'selected' : '' }}>
                                    Delete
                                </option>
                            </select>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="token_non_hash" class="col-md-2 col-form-label">Token</label>
                        <div class="col-md-10">
                            <input type="text" name="token_non_hash" class="form-control" placeholder="{{ __('Token') }}" value="{{ $val_token_non_hash }}" required readonly/>
                        </div>
                    </div> 

                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Auth API')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
