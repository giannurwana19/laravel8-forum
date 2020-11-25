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

                    <form action="{{ route('forums.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @include('forums._form')

                        <button type="submit" class="btn btn-primary font-weight-bold btn-block">Submit</button>

                    </form>

                    <hr>
                    <div class="last-forums mt-3">
                        <b>Pertanyaan Terakhir Anda:</b><br>
                        @if($lastForum)
                        <a href="" class="text-dark">
                            <p>{{ $lastForum->title }}</p>
                        </a>
                        @else
                        <strong> Pertanyaan baru akan muncul disini.</strong><br>
                        @endif
                    </div>


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
