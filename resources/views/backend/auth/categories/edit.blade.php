@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Update Categories'))

@php
    $val_type = empty(old('type')) ? $category->type : old('type');
    $val_is_active = empty(old('is_active')) ? $category->is_active : old('is_active');
    $val_is_module = empty(old('is_module')) ? $category->is_module : old('is_module');
    $val_is_menu = empty(old('is_menu')) ? $category->is_menu : old('is_menu');
    $val_is_parent_menu = empty(old('is_parent_menu')) ? $category->is_parent_menu : old('is_parent_menu');
    $val_description = empty(old('description')) ? $category->description : old('description');
    $val_menu_route = empty(old('menu_route')) ? $category->menu_route : old('menu_route');
    $val_menu_url = empty(old('menu_url')) ? $category->menu_url : old('menu_url');
    $val_name = empty(old('name')) ? $category->name : old('name');
    $val_parent_id = empty(old('parent_id')) ? $category->parent_id : old('parent_id');
    $val_module_name = empty(old('module_name')) ? $category->module_name : old('module_name');

    $val_controller_name = '';
    if($val_is_module == 'yes'){
        $val_controller_name = empty(old('m_controller_name')) ? $category->controller_name.'@'.$category->method_name : old('m_controller_name');
    }else{
        $val_controller_name = empty(old('non_m_controller_name')) ? $category->controller_name.'@'.$category->method_name : old('non_m_controller_name');
    }
    
@endphp

@push('after-scripts')
    <script>
        var v_modules = <?= json_encode($modules); ?>;
    </script>
    <script src="{{ asset('js/backend/categories/update.js')}}"></script>
@endpush

@section('content')
    <x-forms.patch :action="route('admin.auth.categories.update', $category)" id="form_submit">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Categories')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.categories.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                
                <div x-data="{userType : '{{ $val_type }}'}">
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Type')</label>

                        <div class="col-md-6">
                            <select name="type" class="form-control" required x-on:change="userType = $event.target.value">
                                <option value="{{ $model::TYPE_USER }}" {{ $val_type == $model::TYPE_USER ? 'selected' : '' }}>
                                    @lang('User')
                                </option>
                                <option value="{{ $model::TYPE_ADMIN }}" {{ $val_type == $model::TYPE_ADMIN ? 'selected' : '' }}>
                                    @lang('Administrator')
                                </option>
                            </select>
                        </div>

                        <div class="col-md-4" id="parent_is_active">
                            <div class="row">
                                <label for="" class="col-md-4 col-form-label">Is Active?</label>

                                <div class="col-md-8">
                                    <select id="inp_is_active" name="is_active" class="form-control" required>
                                        <option value="yes" {{ $val_is_active == 'yes' ? 'selected' : '' }}>
                                            YES
                                        </option>
                                        <option value="no" {{ $val_is_active == 'no' ? 'selected' : '' }}>
                                            NO
                                        </option>
                                    </select> 
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-2 col-form-label">Category Name</label>

                        <div class="col-md-10">
                            <input type="text" name="description" class="form-control" placeholder="{{ __('Category Name') }}" value="{{ $val_description }}" maxlength="200" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-2 col-form-label">Is Menu?</label>

                        <div class="col-md-2">
                            <select id="inp_is_menu" name="is_menu" class="form-control" required>
                                <option value="no" {{ $val_is_menu == 'no' ? 'selected' : '' }}>
                                    NO
                                </option>
                                <option value="yes" {{ $val_is_menu == 'yes' ? 'selected' : '' }}>
                                    YES
                                </option>
                            </select> 
                        </div>

                        <div class="col-md-4" id="parent_is_parent_menu" style="{{ $val_is_menu == 'no' ? 'display: none;' : '' }}">
                            <div class="row">
                                <label for="" class="col-md-4 col-form-label">Is Parent Menu?</label>

                                <div class="col-md-8">
                                    <select id="inp_is_parent_menu" name="is_parent_menu" class="form-control" required>
                                        <option value="no" {{ $val_is_parent_menu == 'no' ? 'selected' : '' }}>
                                            NO
                                        </option>
                                        <option value="yes" {{ $val_is_parent_menu == 'yes' ? 'selected' : '' }}>
                                            YES
                                        </option>
                                    </select> 
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4" id="parent_is_module" style="{{ $val_is_parent_menu == 'yes' ? 'display: none;' : '' }}">
                            <div class="row">
                                <label for="" class="col-md-4 col-form-label">Is Module?</label>

                                <div class="col-md-8">
                                    <select id="inp_is_module" name="is_module" class="form-control" required>
                                        <option value="" style="display: none;">
                                            --Choose One--
                                        </option>
                                        <option value="no" {{ $val_is_module == 'no' ? 'selected' : '' }}>
                                            NO
                                        </option>
                                        <option value="yes" {{ $val_is_module == 'yes' ? 'selected' : '' }}>
                                            YES
                                        </option>
                                    </select> 
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div>
                        <div class="form-group row" id="parent_module_name" style="{{ ($val_is_parent_menu == 'yes' || $val_is_module == 'no') ? 'display: none;' : '' }}">
                            <label for="" class="col-md-2 col-form-label">Module Name</label>

                            <div class="col-md-10">
                                <select name="module_name" class="form-control">
                                    <option value="">
                                        --Choose One--
                                    </option>
                                    @foreach ($modules as $key => $mv)
                                        <option class="" value="{{ strtolower($key) }}" {{ $val_module_name == strtolower($key) ? 'selected' : '' }}> 
                                            {{ $key }} 
                                        </option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>

                        {{-- controller with module --}}  
                        <div class="form-group row" id="parent_m_controller_name" style="{{ ($val_is_parent_menu == 'yes' || $val_is_module == 'no') ? 'display: none;' : '' }}">
                            <label for="" class="col-md-2 col-form-label">Controller Name</label>

                            <div class="col-md-10">
                                <select name="m_controller_name" class="form-control">
                                    <option value="">
                                        --Choose One--
                                    </option>
                                    @foreach ($modules as $key => $mv)
                                        @foreach ($mv as $idx => $module_val)
                                            <option 
                                                style="display:none;" 
                                                class="opt_check" 
                                                data-method="{{ $module_val['methods'][0] }}" 
                                                data-uri="{{ $module_val['uri'] }}" 
                                                data-route="{{ $module_val['as'] }}" 
                                                data-access="{{ str_replace('/','.',$module_val['uri']) }}" 
                                                value="{{ $module_val['controller_name'].'@'.$module_val['method_name'] }}" 
                                                {{ $val_controller_name == $module_val['controller_name'].'@'.$module_val['method_name'] ? 'selected' : '' }}
                                            > 
                                                {{ 
                                                    '['.$module_val['methods'][0].'] '.
                                                    $module_val['controller_name'].
                                                    ' ('.$module_val['method_name'].')' 
                                                }} 
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- controller non module --}}  
                    <div class="form-group row" id="parent_non_m_controller_name" style="{{ ($val_is_parent_menu == 'yes' || $val_is_module == 'yes') ? 'display: none;' : '' }}">
                        <label for="" class="col-md-2 col-form-label">Controller Name</label>

                        <div class="col-md-10">
                            <select name="non_m_controller_name" class="form-control">
                                <option value="">
                                    --Choose One--
                                </option>
                                @foreach ($non_modules as $key => $nmv)
                                    @foreach ($nmv as $idx => $non_module_val)
                                        <option 
                                            style="display:none;" 
                                            class="opt_check" 
                                            data-method="{{ $non_module_val['methods'][0] }}" 
                                            data-uri="{{ $non_module_val['uri'] }}" 
                                            data-route="{{ $non_module_val['as'] }}" 
                                            data-access="{{ str_replace('/','.',$non_module_val['uri']) }}" 
                                            value="{{ $non_module_val['controller_name'].'@'.$non_module_val['method_name'] }}" 
                                            {{ $val_controller_name == $non_module_val['controller_name'].'@'.$non_module_val['method_name'] ? 'selected' : '' }}
                                        > 
                                            {{ 
                                                '['.$non_module_val['methods'][0].'] '.
                                                $non_module_val['controller_name'].
                                                ' ('.$non_module_val['method_name'].')' 
                                            }} 
                                        </option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">Route</label>

                        <div class="col-md-10">
                            <input type="text" name="menu_route" id="inp_menu_route" class="form-control" placeholder="{{ __('Route') }}" value="{{ $val_menu_route }}" maxlength="100" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">URL</label>

                        <div class="col-md-10">
                            <input type="text" name="menu_url" id="inp_menu_url" class="form-control" placeholder="{{ __('URL') }}" value="{{ $val_menu_url }}" maxlength="100" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">Access Name</label>

                        <div class="col-md-10">
                            <input type="text" name="name" id="inp_access_name" class="form-control" placeholder="{{ __('Access Name') }}" value="{{ $val_name }}" maxlength="100" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="parent_id" class="col-md-2 col-form-label">Parent</label>

                        <div class="col-md-10">
                            <select name="parent_id" class="form-control">
                                <option value="" {{ empty($val_parent_id) ? 'selected' : '' }}>
                                    --Choose One--
                                </option>
                                @foreach ($parent_categories as $idx => $val)
                                    <option value="{{ $val->id }}" {{ ( $val_parent_id == $val->id ) ? 'selected' : '' }}> 
                                        {{ $val->description }} 
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sort" class="col-md-2 col-form-label">Order</label>

                        <div class="col-md-10">
                            <input type="text" name="sort" class="form-control" placeholder="{{ __('Order') }}" value="{{ empty(old('sort')) ? '1' : old('sort') }}" maxlength="100" required />
                        </div>
                    </div>

                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Categories')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
