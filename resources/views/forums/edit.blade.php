@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $title }}</div>

                <div class="card-body">
                    <x-alert />
                    <form action="{{ route('forums.update', $forum) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        @include('forums._form')

                        <button type="submit" class="btn btn-primary font-weight-bold btn-block">Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Pilih tag",
            allowClear: true,
            maximumSelectionLength: 2
        });

        CKEDITOR.replace('description');
    });
</script>
@endpush
