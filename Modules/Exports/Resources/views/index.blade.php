@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
        </x-slot>

        <x-slot name="body">
            <form action="{{ route('admin.exports.dlexcel') }}" method="POST" target="__BLANK">
                @csrf
                <input type="submit" name="inp_submit" value="Export">
            </form>

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $val)
                        <tr>
                            <td>{{ $val->name }}</td>
                            <td>{{ $val->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-backend.card>
@endsection 
