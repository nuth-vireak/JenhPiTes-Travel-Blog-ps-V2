@extends('layouts.master')

@section('title', 'Category')

@section('content')

    <div class="container-fluid px-4">

        <div class="mt-4">
            <div class="text-2xl font-semibold mt-4 mb-4">បង្កើតខេត្ត-ក្រុងថ្មី</div>
            <div class="card-body">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger font-semibold">{{ $error }}</div>
                    @endforeach
                @endif

                <form action="{{ url('admin/add-category') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="" class="form-label font-semibold">ឈ្មោះខេត្ត-ក្រុង |Name|</label>
                        <input type="text" name="name" class="form-control font-semibold">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label font-semibold">Slug</label>
                        <input type="text" name="slug" class="form-control font-semibold">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label font-semibold">ការពិពណ៌នា |Description|</label>
                        <textarea name="description" class="form-control font-semibold" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label font-semibold">រូបភាព |Image|</label>
                        <input type="file" name="image" class="form-control font-semibold">
                    </div>

                    <div class="font-semibold mt-5 mb-3">
                        <i class="fas fa-info-circle"></i>
                        សូមបញ្ចូលពាក្យគន្លឹះសម្រាប់ការស្វែងរកបន្ថែមទៀត |Please enter keywords for SEO|
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label font-semibold">ចំណងជើងសំខាន់ |Meta Title|</label>
                        <input type="text" name="meta_title" class="form-control font-semibold">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label font-semibold">ការពិពណ៌នា |Meta Description|</label>
                        <textarea name="meta_description" class="form-control font-semibold" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label font-semibold">ពាក្យគន្លឹះសម្រាប់ការស្វែងរកបន្ថែមទៀត |Meta
                            Keywords|</label>
                        <textarea name="meta_keywords" class="form-control font-semibold" rows="3"></textarea>
                    </div>

                    <div class="font-semibold mt-5 mb-3">
                        <i class="fas fa-info-circle"></i>
                        សូមជ្រើសរើសស្ថានភាពនៃការបង្កើតខេត្ត-ក្រុងនេះដែលអ្នកចង់បង្កើត |Please select the status of this
                        category you want to create|
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="font-semibold">Navbar Status </label>
                            <input class="form-check" type="checkbox" name="navbar_status">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="font-semibold">Status</label>
                            <input class="form-check" type="checkbox" name="status">
                        </div>
                        <div class="col-md-7 mb-4">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-plus mr-1"></i>
                                បង្កើតថ្មី
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>

@endsection
