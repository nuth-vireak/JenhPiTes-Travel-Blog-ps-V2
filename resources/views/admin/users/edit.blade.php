@extends('layouts.master')

@section('title', 'Edit User')

@section('content')

    <div class="container-fluid px-4">

        <div class="mt-4">

            <div class="text-2xl font-semibold mt-4 mb-4">កែប្រែអ្នកប្រើប្រាស់</div>

            <div class="card-body">

                <div class="mb-3">
                    <label for="" class="form-label font-semibold">ឈ្មោះអ្នកប្រើប្រាស់</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control font-semibold" disabled>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label font-semibold">អ៊ីម៉ែល</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control font-semibold" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label font-semibold">បង្កើតនៅថ្ងៃទី</label>
                    <input type="text" class="form-control font-semibold" value="{{ $user->created_at }}" disabled>
                </div>

                <form action="{{ url('admin/update-user/'.$user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="" class="form-label font-semibold">តួនាទី</label>
                        <select name="role_as" class="form-control font-semibold">
                            <option class="font-semibold" value="1" {{ $user->role_as == '1' ? 'selected' : '' }}>អ្នកគ្រប់គ្រង</option>
                            <option class="font-semibold" value="0" {{ $user->role_as == '0' ? 'selected' : '' }}>អ្នកប្រើប្រាស់</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success" >
                            <i class="fas fa-save"></i>
                            រក្សាទុក
                        </button>
                    </div>
                </form>

            </div>

        </div>

    </div>

@endsection
