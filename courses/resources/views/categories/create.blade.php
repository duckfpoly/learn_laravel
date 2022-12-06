@extends('index')
@section('content')
    <section class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="text-center">
                            <h3>Thêm danh mục</h3>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="p-3 ">
                            <form action="{{ route('categories.store') }}" method="post" id="form-1">
                                @csrf
                                <div class="form-group ">
                                    <label for="" class="form-label">Tên danh mục</label>
                                    <input type="text" name="name_category" id="name_category" class="form-control " value="{{ old('name_category') }}">
                                    @if ($errors->has('name_category'))
                                        <div class="text-danger mt-3">
                                            {{ $errors->first('name_category') }}
                                        </div>
                                    @endif
                                    <div class="form-message text-danger mt-1"><br></div>
                                </div>
                                <div class="mt-5">
                                    <a href="{{ route('categories.index')}}" class="btn btn-secondary">Quay lại</a>
                                    <button class="btn btn-success" type="submit">Thêm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .form-group.invalid .form-control{
            border-color: #f33a58;
        }
    </style>

@endsection('content')
@push('validate')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Validator({
                form: '#form-1',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    Validator.isRequired('#name_category', 'Vui lòng nhập tên danh mục'),
                ]
            })
        });
    </script>
@endpush
