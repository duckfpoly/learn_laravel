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
            targets     : [ 2 ],
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
        if (confirm(text) === true) {
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
