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
                            <h6>Danh sách danh mục</h6>
                            <div class="d-flex align-items-center">
                                <a class="btn btn-success m-0" href="{{ route('categories.create') }}">Thêm</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-5">
                            <input hidden value="{{ route('categories.api') }}" id="categoriesData">
                            <table class="table align-items-center justify-content-center" id="example">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên danh mục</th>
                                        @if(CheckAdminLoginMiddleware())
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sửa</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Xóa</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection('content')
@push('datatable')
    <script>
        var buttonCommon = {
            exportOptions: {
                columns: ':visible :not(.not-export)'
            }
        };
        $(function () {
            var urlData = $('#categoriesData').val();
            let myTable = $('#example').DataTable({
                "lengthMenu": [2, 5, 15, 25, 50, 100],
                language: {
                    paginate: {
                        previous: '<span class="prev-icon"><</span>',
                        next: '<span class="next-icon">></span>',
                    },
                    lengthMenu: "_MENU_",
                },
                dom: "Blfrtip",
                buttons: [
                    $.extend( true, {}, buttonCommon, {
                        extend: 'print'
                    } ),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'csvHtml5'
                    } ),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'pdfHtml5'
                    } )
                ],
                processing: true,
                serverSide: true,
                ajax: urlData,
                columnDefs: [{
                    className   : "not-export",
                    targets     : [ 2 , 3],
                }],
                info: true,
                responsive: true,
                columns: [
                    { data: 'id', name: '#' },
                    { data: 'name_category', name: 'Tên danh mục' },
                    {
                        data: 'edit',
                        name: 'Sửa',
                        orderable: false,
                        searchable: false,
                        targets: 2,
                        render: function ( data, type, row, meta ) {
                            return `
                                <span class="text-secondary text-xs font-weight-bold">
                                    <a class="btn btn-secondary m-0" href="${data}">Sửa</a>
                                </span>&emsp;
                            `
                        }
                    },
                    {
                        data: 'destroy',
                        name: 'Xóa',
                        orderable: false,
                        searchable: false,
                        targets: 2,
                        render: function ( data, type, row, meta ) {
                            return `
                               <form action="${data}" method="post" onsubmit="return false">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn-delete btn btn-danger m-0">Xóa</button>
                                </form>
                            `
                        }
                    },
                ],
            });
            $(document).on('click','.btn-delete',function (){
                let text = "Bạn muốn xóa danh mục này ?";
                if (confirm(text) == true) {
                    let form = $(this).parents('form')
                    $.ajax({
                        type: "POST",
                        url: form.attr('action'),
                        datatype: 'json',
                        data: form.serialize(),
                        success:function () {
                            showToast('Success', 'Delete Successfully !', 'success')
                            myTable.draw()
                        },
                        error:function () {
                            console.log('error')
                        }
                    });
                }
            })
        });
    </script>
{{--    <script src="{{ asset('js/items/datatableCategories.js') }}"></script>--}}
@endpush
