@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{ $date->translatedFormat('F') }}
                {{ $date->day }}, {{ $date->year }} • {{ $date->format('H:i') }} • {{ $post->comments->count() }}
                {{ __('комментария') }}</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ Storage::url($post->main_image) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">{{ __('Схожие посты') }}</h2>
                        <div class="row">
                            @foreach ($relatedPosts as $relatedPost)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <img src="{{ Storage::url($relatedPost->preview_image) }}" alt="related post"
                                        class="post-thumbnail">
                                    <p class="post-category">{{ $relatedPost->category->title }}</p>
                                    <a href="{{ route('post.show', $relatedPost->id) }}">
                                        <h5 class="post-title">{{ $relatedPost->title }}</h5>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    <section class="comment-list">
                        @foreach ($post->comments as $comment)
                            <div class="comment-text">
                                <span class="username">
                                    <div>{{ $comment->user->name }}</div>
                                    <span class="text-muted float-right">{{ $comment->DateAsCarbon->diffForHumans() }}</span>
                                </span><!-- /.username -->
                                It is a long established fact that a reader will be distracted
                                by the readable content of a page when looking at its layout.
                            </div>
                        @endforeach
                    </section>
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">{{ __('Оставить комментарий') }}</h2>
                        <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label class="sr-only">{{ __('Комментарий') }}</label>
                                    <textarea name="message" class="form-control" placeholder="{{ __('Напишите комментарий') }}" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="{{ __('Отправить комментарий') }}"
                                        class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
