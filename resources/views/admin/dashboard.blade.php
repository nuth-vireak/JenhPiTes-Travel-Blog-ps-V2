@extends('layouts.master')

@section('title', 'Blog Dashboard')

@section('content')

    <div class="container-fluid px-4">
        <div class="text-2xl font-semibold mt-4 mb-4">
            ផ្ទាំងគ្រប់គ្រងរបស់អ្នក
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        ចំនួនខេត្ត-ក្រុងសរុប
                        <h2 class="mt-4"> {{ $categories }} </h2>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href=" {{ url('admin/category') }} ">ចូលមើលព័ត៌មានលម្អិត</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        ចំនួនអត្ថបទសរុប
                        <h2 class="mt-4"> {{ $posts }} </h2>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href=" {{ url('admin/posts') }} ">ចូលមើលព័ត៌មានលម្អិត</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        ចំនួនអ្នកប្រើប្រាស់សរុប
                        <h2 class="mt-4"> {{ $users }} </h2>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href=" {{ url('admin/users') }} ">ចូលមើលព័ត៌មានលម្អិត</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        អ្នកគ្រប់គ្រងសរុប
                        <h2 class="mt-4"> {{ $admins }} </h2>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href=" {{ url('admin/users') }} ">ចូលមើលព័ត៌មានលម្អិត</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
