@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Добавление поста') }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">{{ __('Главная') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">{{ __('Посты') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Добавление поста') }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group w-25">
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                                    placeholder="{{ __('Название поста') }}">
                                @error('title')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea name="content" id="summernote"">
                                    {{ old('content') }}
                                </textarea>
                                @error('content')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>{{ __('Добавить превью') }}</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="preview_image" class="custom-file-input">
                                        <label class="custom-file-label">{{ __('Выберите изображение') }}</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">{{ __('Загрузка') }}</span>
                                    </div>
                                </div>
                                @error('preview_image')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>{{ __('Добавить главное изображение') }}</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="main_image" class="custom-file-input">
                                        <label class="custom-file-label">{{ __('Выберите изображение') }}</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">{{ __('Загрузка') }}</span>
                                    </div>
                                </div>
                                @error('main_image')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>{{ __('Выберите категорию') }}</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == old('category_id') ? ' selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{ __('Теги') }}</label>
                                <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="{{ __('Выберите теги') }}"
                                    style="width: 100%;">
                                    @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? ' selected' : '' }}>
                                        {{ $tag->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="{{ __('Добавить') }}">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
