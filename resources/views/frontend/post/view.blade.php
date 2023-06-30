<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

@extends('layouts.app')

@section('title', "$post->meta_title")
@section('meta_description', "$post->meta_description")
@section('meta_keywords', "$post->meta_keywords")

@section('content')

    <main class="container relative mx-auto">
        <div class="relative h-[400px] w-full">
            <div class="absolute top-0 z-10 h-[400px] w-full items-center justify-center text-center">
            <span
                style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px none; margin: 0px; padding: 0px; position: absolute; inset: 0px;">
                <img src="{{ asset('uploads/category/'.$category->image) }}"
                     alt="" class="z-10 h-[400px] w-full rounded-bl-[60px] object-cover"
                     style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: medium none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">0
            </span>
                <div
                    class="absolute bottom-[0px] right-0 z-10 h-[400px] w-full rounded-bl-[60px] bg-gradient-to-t from-[#101827]"></div>
                <div class="absolute bottom-[-60px] right-0 z-10 h-[60px] w-full bg-[#101827]"></div>
                <div class="absolute bottom-[-60px] right-0 z-10 h-[60px] w-full rounded-tr-[60px] bg-white"></div>
            </div>
            <div class="absolute bottom-[50px] z-20 mx-5 text-white">
                <div class="relative flex flex-col items-start">
                    <h1 class="w-full text-[24px] font-semibold line-clamp-3 mb-1"
                        style="margin: 0;">{{ $post->name }}
                    </h1>
                </div>
            </div>
        </div>

        <div class="relative h-[60px] w-full bg-white"></div>
        <span class="text-xl font-semibold mb-3" style="margin-left: 5px;">អត្តបទ</span>
        <div class="max-w-screen-lg mt-[20px]">
            <div class="text-gray-500" style="margin-left: 5px; font-size: 17px;">
                {!! $post->description !!}
            </div>
        </div>

        <div class="comment-area mt-4">

            @if (session('message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('message') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            @endif

            <div class="card card-body">
                <h6 class="card-title">បញ្ចេញមតិរបស់អ្នក</h6>
                <form action="{{ url('comments') }}" method="POST">
                    @csrf
                    <input type="text" value="{{ $post->slug }}" name="post_slug" hidden>
                    <textarea name="comment_body" class="form-control" rows="3" required></textarea>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>

            @forelse($post->comments as $comment)
                <div class="comment-container card card-body shadow-sm mt-3">
                    <div class="detail-area">
                        <h6 class="user-name mb-1">
                            @if ($comment->user)
                                {{ $comment->user->name }}
                            @endif
                            <small
                                class="ms-3 text-primary">{!! $comment->created_at->diffForHumans() !!}</small>
                        </h6>
                        <p class="user-comment mb-1">
                            {!!  $comment->comment_body !!}
                        </p>
                    </div>

                    @if(auth()->check() && auth()->user()->id == $comment->user_id)
                        <div>
                            <button type="button" value="{{ $comment->id }}" class="deleteComment btn btn-sm btn-danger">លុបចេញ</button>
                        </div>
                    @endif

                </div>
        </div>

        @empty
            <h6>មិនមានការបញ្ចេញមតិ</h6>
        @endforelse

    </main>

@endsection

@section('scripts')

    <script>

        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            $(document).on('click', '.deleteComment', function () {

                if (confirm('Are you sure you want to delete this comment?')) {

                    var thisClicked = $(this);
                    var commentId = thisClicked.val();

                    $.ajax({
                        type: 'POST',
                        url: "/delete-comment",
                        data: {
                            'comment_id': commentId,
                        },
                        success: function (res) {
                            if (res.status === 200) {
                                thisClicked.closest('.comment-container').remove();
                            } else {
                                alert(res.message);
                            }
                        }
                    });
                }

            });
        });

    </script>

@endsection
