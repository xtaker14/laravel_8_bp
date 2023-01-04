@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
        </x-slot>

        <x-slot name="body">
            <h1>Hello World</h1>
            <p>
                This view is loaded from module: {!! config('pegawai.name') !!}
            </p>

            <h3>Pegawai List : </h3>
            <ul>
                @foreach($pegawai as $val)
                    <li>
                        <b>Name :</b> {{$val->name}}</br>
                        <b>Email :</b> {{$val->email}}</br>
                        <b>No. Phone :</b> {{$val->no_phone}}</br>
                        <b>Address :</b> {{$val->address}}</br>
                    </li>
                @endforeach
            </ul>
        </x-slot>
    </x-backend.card>
@endsection
