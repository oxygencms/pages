@extends('oxygencms::admin.layout')

@section('title', 'Create Page')

@section('content')

    <div class="row">
        <div class="col-12 d-flex align-items-center mb-3">
            <h1>Create Page</h1>
        </div>
    </div>

    <form action="{{ route('admin.page.store') }}" method="POST">
        {!! csrf_field() !!}

        @include('oxygencms::admin.pages._form-fields')

        <input type="hidden" name="temporary_id" value="{{ $temporary->id }}">

        <button class="btn btn-primary" type="submit">Save</button>
    </form>

    <media-uploads mediable_type="{{ get_class($temporary) }}"
                   mediable_id="{{ $temporary->id }}"
                   :media="{{ $temporary->media }}"
                   class="mt-3"
    ></media-uploads>

@endsection