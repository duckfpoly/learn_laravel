@extends('index')
@section('title', 'Khóa học')
@section('content')
<section class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="text-center">
                        <h3>Thêm khóa học</h3>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="p-3 ">
                        <form action="{{ route('courses.store') }}" method="post" id="form-1">
                            @csrf
                            <div class="form-group ">
                                <label for="" class="form-label">Tên khóa học</label>
                                <input type="text" name="name_course" id="name_course" class="form-control " value="{{ old('name_course') }}">
                                @if ($errors->has('name_course'))
                                    <div class="text-danger mt-3">
                                        {{ $errors->first('name_course') }}
                                    </div>
                                @endif
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="form-group ">
                                <label for="price_course" class="form-label">Đơn giá</label>
                                <input type="number" name="price_course" id="price_course" class="form-control" min="0" value="{{ old('price_course') }}">
                                @if ($errors->has('price_course'))
                                    <div class="text-danger mt-3">
                                        {{ $errors->first('price_course') }}
                                    </div>
                                @endif
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="form-group ">
                                <label for="description_course" class="form-label">Mô tả khóa học</label>
                                <input type="text" name="description_course" id="description_course" class="form-control" value="{{ old('description_course') }}">
                                @if ($errors->has('description_course'))
                                    <div class="text-danger mt-3">
                                        {{ $errors->first('description_course') }}
                                    </div>
                                @endif
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="form-group ">
                                <label for="quote" class="form-label">Trích dẫn</label>
                                <input type="text" name="quote" id="quote" class="form-control" value="{{ old('quote') }}">
                                @if ($errors->has('quote'))
                                    <div class="text-danger mt-3">
                                        {{ $errors->first('quote') }}
                                    </div>
                                @endif
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="mt-5">
                                <a href="{{ route('courses.index')}}" class="btn btn-secondary">Quay lại</a>
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
                    Validator.isRequired('#name_course', 'Vui lòng nhập tên khóa học'),
                    Validator.isRequired('#price_course', 'Vui lòng nhập giá khóa học'),
                    Validator.isRequired('#description_course', 'Vui lòng nhập mô tả khóa học'),
                    Validator.isRequired('#quote', 'Vui lòng nhập trích dẫn'),
                ]
            })
        });
    </script>
@endpush
