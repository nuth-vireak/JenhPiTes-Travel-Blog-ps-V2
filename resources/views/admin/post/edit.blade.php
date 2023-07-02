@extends('layouts.master')

@section('title', 'Edit Post')

@section('content')

    <div class="container-fluid px-4">

        <div class="mt-4">
            <div class="text-2xl font-semibold mt-4 mb-4">កែប្រែអត្ថបទ</div>
            <div class="card-body">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif

                <form action="{{ url('admin/update-post/'.$post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="" class="form-label font-semibold">ខេត្ត-ក្រុង |Province-City|</label>
                        <select name="category_id" required class="form-control font-semibold">
                            <option class="font-semibold" value="">-- ជ្រើសរើសខេត្ត-ក្រុង --</option>
                            @foreach($category as $categoryItem)
                                <option class="font-semibold"
                                    value="{{ $categoryItem->id }}" {{ $post->category_id == $categoryItem->id ? 'selected' : '' }} >
                                    {{ $categoryItem->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label font-semibold">ចំណងជើងអត្ថបទ |Article Title|</label>
                        <input type="text" name="name" value="{{ $post->name }}" class="form-control font-semibold">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label font-semibold">Slug</label>
                        <input type="text" name="slug" value="{{ $post->slug }}" class="form-control font-semibold">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label font-semibold">សរសេរអត្ថបទ |Article Description|</label>
                        <textarea name="description" id="summernote" class="form-control font-semibold"
                                  rows="3">{{ $post->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label font-semibold">រូបភាព |Image|</label>
                        <input type="file" name="image" value="{{ $post->image }}" class="form-control font-semibold">
                    </div>

                    <div class="font-semibold mt-5 mb-3">
                        <i class="fas fa-info-circle"></i>
                        សូមបញ្ចូលពាក្យគន្លឹះសម្រាប់ការស្វែងរកបន្ថែមទៀត |Please enter keywords for SEO|
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label font-semibold">ចំណងជើងសំខាន់ |Meta Title|</label>
                        <input type="text" name="meta_title" value="{{ $post->meta_title }}" class="form-control font-semibold">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label font-semibold">ការពិពណ៌នា |Meta Description|</label>
                        <textarea name="meta_description" class="form-control font-semibold"
                                  rows="3"> {{ $post->meta_description }} </textarea>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label font-semibold">ពាក្យគន្លឹះ |Meta Keywords|</label>
                        <textarea name="meta_keywords" class="form-control font-semibold"
                                  rows="3"> {{ $post->meta_keywords }} </textarea>
                    </div>

                    <div class="font-semibold mt-5 mb-3">
                        <i class="fas fa-info-circle"></i>
                        សូមជ្រើសរើសស្ថានភាពនៃការបង្កើតអត្ថបទនេះ |Please select the status of this article|
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="font-semibold" for="">ស្ថានភាព |Status|</label>
                            <input class="form-check" type="checkbox" name="status" {{ $post->status == 1 ? 'checked' : '' }} >
                        </div>
                        <div class="col-12 mb-4">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i>
                                រក្សាទុក
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>

@endsection
