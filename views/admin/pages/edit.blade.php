@extends('oxygencms::admin.layout')

@section('title', 'Page edit')

@section('content')

    <div class="row">
        <div class="col-12 o-top-column mb-3">
            <h1>Edit Page</h1>
        </div>
    </div>

    <form action="{{ route('admin.page.update', $page) }}" method="POST">
        @csrf
        @method('patch')
        @include('oxygencms::admin.pages._form-fields')

        <button class="btn btn-success" type="submit">Update</button>
    </form>

    @include('oxygencms::admin.partials.dropzone-uploads', ['uploadable' => $page])

@endsection