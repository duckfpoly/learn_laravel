@extends('index')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="text-center">
                            <h3>Sửa sản phẩm</h3>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="p-3 ">
                            <form action="{{ route('products.update', $category) }}" method="post" id="form-1">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="" class="form-label">Trạng thái</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status1" value="0" {{ $category->status == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status1">
                                            Mở
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status2" value="1" {{ $category->status == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status2">
                                            Đóng
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name_product" class="form-label">Tên sản phẩm</label>
                                    <input type="text" name="name_product" id="name_product" class="form-control " value="{{ $category->name_product }}">
                                    <div class="form-message text-danger mt-1"></div>
                                </div>
                                <div class="form-group">
                                    <label for="image_product" class="form-label">Ảnh sản phẩm</label>
                                    <input type="file" name="image_product" id="image_product" class="form-control">
                                    <div class="form-message text-danger mt-1"></div>
                                </div>
                                <div class="form-group">
                                    <label for="price_product" class="form-label">Đơn giá</label>
                                    <input type="number" name="price_product" id="price_product" class="form-control" min="0" value="{{ $category->price_product }}">
                                    <div class="form-message text-danger mt-1"></div>
                                </div>
                                <div class="form-group">
                                    <label for="desc_sort_product" class="form-label">Mô tả ngắn</label>
                                    <input type="text" name="desc_sort_product" id="desc_sort_product" class="form-control" value="{{  $category->desc_sort_product }}">
                                    <div class="form-message text-danger mt-1"></div>
                                </div>
                                <div class="form-group">
                                    <label for="desc_product" class="form-label">Mô tả</label>
                                    <input type="text" name="desc_product" id="desc_product" class="form-control" value="{{ $category->desc_product }}">
                                    <div class="form-message text-danger mt-1"></div>
                                </div>
                                <div class="form-group">
                                    <label for="id_category" class="form-label">Danh mục</label>
                                    <select name="id_category" id="id_category" class="form-control">
                                        @foreach ($categories as $value => $items)
                                            <option {{ $items->id == $category->id_category ? 'selected' : '' }}  value="{{$items->id}}">{{$items->name_category}}</option>
                                        @endforeach
                                    </select>
                                    <div class="form-message text-danger mt-1"></div>
                                </div>
                                <div class="mt-5">
                                    <a href="{{ route('products.index')}}" class="btn btn-secondary">Quay lại</a>
                                    <button class="btn btn-success" type="submit">Sửa</button>
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
                    Validator.isRequired('#name_product', 'Vui lòng nhập tên khóa học'),
                    // Validator.isRequired('#image_product', 'Vui lòng chọn ảnh sản phẩm'),
                    Validator.isRequired('#price_product', 'Vui lòng nhập giá sản phẩm'),
                    Validator.isRequired('#desc_sort_product', 'Vui lòng nhập mô tả ngắn sản phẩm'),
                    Validator.isRequired('#desc_product', 'Vui lòng nhập mô tả sản phẩm'),
                    Validator.isRequired('#id_category ', 'Vui lòng chọn danh mục sản phẩm'),
                ]
            })
        });
    </script>
@endpush
