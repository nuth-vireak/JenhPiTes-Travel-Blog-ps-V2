@extends('layouts.master')

@section('title', 'Add Post')

@section('content')

    <div class="container-fluid px-4">

        <div class="mt-4">
            <div class="text-2xl font-semibold mt-4 mb-4">បង្កើតអត្ថបទថ្មី</div>
            <div class="card-body">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif

                <form action="{{ url('admin/add-post') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="" class="form-label font-semibold">ខេត្ត-ក្រុង |Province-City|</label>
                        <select name="category_id" required class="form-control font-semibold">
                            <option value="">-- ជ្រើសរើសខេត្ត-ក្រុង --</option>
                            @foreach($category as $categoryItem)
                                <option class="font-semibold"
                                        value="{{ $categoryItem->id }}">{{ $categoryItem->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label font-semibold">ចំណងជើងអត្ថបទ |Article Title|</label>
                        <input type="text" name="name" class="form-control font-semibold">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label font-semibold">Slug</label>
                        <input type="text" name="slug" class="form-control font-semibold">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label font-semibold">សរសេរអត្ថបទ |Article Description|</label>
                        <textarea name="description" id="summernote" class="form-control font-semibold"
                                  rows="3"></textarea>
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
                        <label for="" class="form-label font-semibold">ពាក្យគន្លឹះ |Meta Keywords|</label>
                        <textarea name="meta_keywords" class="form-control font-semibold" rows="3"></textarea>
                    </div>

                    <div class="font-semibold mt-5 mb-3">
                        <i class="fas fa-info-circle"></i>
                        សូមជ្រើសរើសស្ថានភាពនៃការបង្កើតអត្ថបទនេះ |Please select the status of this article|
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="font-semibold" for="">ស្ថានភាព |Status|</label>
                            <input type="checkbox" name="status" class="form-check">
                        </div>
                        <div class="col-12 mb-4">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-plus"></i>
                                បង្កើតអត្ថបទថ្មី
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>

@endsection
