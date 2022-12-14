@extends('index')
@section('content')
    <section class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger text-white text-center ">
                        <p>{{ $error }}</p>
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success text-white text-center ">
                        <p>{{ session()->get('success') }}</p>
                    </div>
                @endif
                <div class="card mb-4">
                    <div class="card-header pb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6>Danh sách sản phẩm</h6>
                            <div class="d-flex align-items-center">
                                <a class="btn btn-success m-0" href="{{ route('products.create') }}">Thêm</a>
                                &emsp;
                                <form>
                                    <input type="search" name="s" value="{{ $search }}" placeholder="Tìm kiếm ..." class="form-control">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-2">
                            <table class="table align-items-center " id="example">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên sản phẩm</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ảnh sản phẩm</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Đơn giá</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Danh mục</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $values)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $values->id }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $values->name_product }}</p>
                                        </td>
                                        <td>
                                            <img src="{{ asset('storage/'.$values->image_product) }}" width="50px" height="50px" alt="">
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $values->money_format }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $cate->find($values->id_category)->name_category }}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-{{ $values->status  == 0 ? 'success' : 'danger' }}">
                                            {{ $values->status == 0 ? 'Mở' : 'Đóng' }}
                                        </span>
                                        </td>
                                        <td class="align-middle text-center d-flex justify-content-center align-items-center">
                                            <span class="text-secondary text-xs font-weight-bold">
                                                <a class="btn btn-info m-0" href="{{ route('products.show', $values) }}">Chi tiết</a>
                                            </span>&emsp;
                                            <span class="text-secondary text-xs font-weight-bold">
                                                <a class="btn btn-secondary m-0" href="{{ route('products.edit', $values) }}">Sửa</a>
                                            </span>&emsp;
                                            <span class="text-secondary text-xs font-weight-bold">
                                            <form action="{{ route('products.destroy', $values) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Bạn muốn xóa sản phẩm {{ $values->name_product }} ?')" class="btn btn-danger m-0">Xóa</button>
                                            </form>
                                        </span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pagination pagination-rounded mb-0 text-light">
            {{ $data->links() }}
        </div>
    </section>
    <style>
        .page-item.active > span {
            color: #fff;
        }
    </style>
@endsection('content')
