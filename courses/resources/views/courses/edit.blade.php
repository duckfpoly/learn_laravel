@extends('index')
@section('title', 'Khóa học')

@section('content')
    <section class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-3">
                        <div class="text-center">
                            <h3>Sửa khóa học</h3>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="p-3">
                            <form action="{{ route('courses.update', $name_course)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="statuscourse" class="form-label">
                                        Trạng thái
                                    </label>
                                    <div class="d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status_course" id="statusCourse1" value="0" {{ $name_course->status_course == 0 ? "checked" : "" }} >
                                            <label class="form-check-label" for="statusCourse1">
                                                Mở
                                            </label>
                                        </div>
                                        &emsp;&emsp;
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status_course" id="statusCourse2" value="1" {{ $name_course->status_course == 1 ? "checked" : "" }}>
                                            <label class="form-check-label" for="statusCourse2">
                                                Khóa
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <input type="hidden" name="image_course" value="{{ $name_course->image_course }}">
                                <input type="hidden" name="star_course" value="{{ $name_course->star_course }}">
                                <input type="hidden" name="rate_course" value="{{ $name_course->rate_course }}">
{{--                                <input type="hidden" name="review_course" value="{{ $name_course->review_course }}">--}}
                                <div class="form-group mb-3">
                                    <label for="name_course" class="form-label">Tên khóa học</label>
                                    <input type="text" name="name_course" class="form-control" value="{{ $name_course->name_course }}">
                                    @if ($errors->has('name_course'))
                                        <div class="text-danger mt-3">" {{ $name_course->name_course }} " {{ $errors->first('name_course') }}</div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="price_course" class="form-label">Giá khóa học</label>
                                    <input type="text" name="price_course" class="form-control" value="{{ $name_course->price_course }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description_course" class="form-label">Mô tả khóa học</label>
                                    <textarea name="description_course" id="" cols="30" rows="10" class="form-control">
                                        {{ $name_course->description_course }}
                                    </textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="quote" class="form-label">Trích dẫn khóa học</label>
                                    <textarea name="quote" id="" cols="30" rows="10" class="form-control">
                                        {{ $name_course->quote }}
                                    </textarea>
                                </div>
                                <div class="mt-3">
                                    <a href="{{ route('courses.index')}}" class="btn btn-secondary">Quay lại</a>
                                    <button class="btn btn-success" type="submit">Sửa</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection('content')
