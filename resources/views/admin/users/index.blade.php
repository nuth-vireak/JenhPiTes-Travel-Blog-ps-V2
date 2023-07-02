@extends('layouts.master')

@section('title', 'View Users')

@section('content')

    <div class="container-fluid px-4">

        <div class="mt-4">

            <div class="text-2xl font-semibold mt-4 mb-4">មើលអ្នកប្រើប្រាស់ទាំងអស់</div>
            <div class="card-body">

                @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <table id="dataTable" class="table table-bordered">
                    <thead>
                    <tr class="align-baseline">
                        <th>
                            <i class="fas fa-list-ol mr-1"></i>
                            លេខរៀង
                        </th>
                        <th>
                            <i class="fas fa-user mr-1"></i>
                            ឈ្មោះអ្នកប្រើប្រាស់
                        </th>
                        <th>
                            <i class="fas fa-envelope mr-1"></i>
                            អ៊ីម៉ែល
                        </th>
                        <th>
                            <i class="fas fa-user-tag mr-1"></i>
                            តួនាទី
                        </th>
                        <th>
                            <i class="fas fa-edit mr-1"></i>
                            កែប្រែ
                        </th>
                    </tr>
                    </thead>
                    <tbody class="align-baseline">
                    @foreach($users as $user)
                        <tr>
                            <td class="font-semibold">{{ $user->id }}</td>
                            <td class="font-semibold">{{ $user->name }}</td>
                            <td class="font-semibold">{{ $user->email }}</td>
                            <td>
                                @if($user->role_as == 1)
                                    <i class="fas fa-user-shield text-danger"></i>
                                    <span class="text-danger font-semibold">អ្នកគ្រប់គ្រង</span>
                                @else
                                    <i class="fas fa-user text-primary"></i>
                                    <span class="text-primary font-semibold">អ្នកប្រើប្រាស់</span>
                                @endif
                            </td>
                            <td class="">
                                <a href="{{ url('admin/user/'. $user->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                    កែប្រែ
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>

@endsection
