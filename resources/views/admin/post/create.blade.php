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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
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
                        <form action="{{ route('admin.post.store') }}" method="post">
                            @csrf
                            <div class="form-group w-25">
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="{{ __('Название поста') }}">
                                @error('title')
                                    <div class="text-danger">
                                        {{ __('Это поле необходимо для заполнения') }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea name="content" id="summernote"">
                                    {{ old('content') }}
                                </textarea>
                                @error('content')
                                    <div class="text-danger">
                                        {{ __('Это поле необходимо для заполнения') }}
                                    </div>
                                @enderror
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
