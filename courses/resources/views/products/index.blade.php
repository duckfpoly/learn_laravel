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
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Đơn giá</th>
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
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $values->money_format }}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">

                                        <span class="badge badge-sm bg-gradient-{{ $values->status  == 0 ? 'success' : 'danger' }}">
                                            {{ $values->status == 0 ? 'Mở' : 'Đóng' }}
                                        </span>
                                        </td>
                                        <td class="align-middle text-center d-flex justify-content-center align-items-center">
{{--                                            <span class="text-secondary text-xs font-weight-bold"><a class="btn btn-primary m-0" href="{{ route('products.show', $values) }}">Chi tiết</a></span>&emsp;--}}
                                            <span class="text-secondary text-xs font-weight-bold"><a class="btn btn-secondary m-0" href="{{ route('products.edit', $values) }}">Sửa</a></span>&emsp;
                                            <span class="text-secondary text-xs font-weight-bold">
                                            <form action="{{ route('products.destroy', $values) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Bạn muốn xóa khóa học {{ $values->name_course }} ?')" class="btn btn-danger m-0">Xóa</button>
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
