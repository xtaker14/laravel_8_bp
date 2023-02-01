@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Create Auth API'))

@push('after-scripts') 
    {{-- <script src="{{ asset('js/backend/api/create.js')}}"></script> --}}
@endpush

@section('content')
    <x-forms.post :action="route('admin.auth.api.store')" id="form_submit">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Auth API')
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
                            @livewire('components.backend.select2-user', ['is_required' => 'yes', 'current_value' => old('user')])
                        </div> 
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">Token Name</label>

                        <div class="col-md-4">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Token Name') }}" value="{{ old('name') }}" maxlength="200" required />
                        </div> 
                        
                        <label for="abilities" class="col-md-2 col-form-label">Abilities</label>

                        <div class="col-md-4">
                            <select name="abilities" class="form-control" required>
                                <option value="*" {{ old('abilities') == '*' ? 'selected' : '' }}>
                                    ALL
                                </option>
                                <option value="read" {{ old('abilities') == 'read' ? 'selected' : '' }}>
                                    Read
                                </option>
                                <option value="create" {{ old('abilities') == 'create' ? 'selected' : '' }}>
                                    Create
                                </option>
                                <option value="update" {{ old('abilities') == 'update' ? 'selected' : '' }}>
                                    Update
                                </option>
                                <option value="delete" {{ old('abilities') == 'delete' ? 'selected' : '' }}>
                                    Delete
                                </option>
                            </select>
                        </div>
                    </div> 

                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Auth API')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
