$(document).ready(function() {
    var shops = $(`#${type}`).DataTable({
        dom: "lBfrtip",
        processing: false,
        serverSide: true,
        destroy: true,
        "pageLength": 25,
        "bInfo": false,
        "bFilter": false,
        "bLengthChange": false,
        ajax: {
            url: admin_url + "/page/" + type,
            type: "GET",
        },

        columns: [{
                data: "name",
                name: "name"
            },

            {
                data: "mobile",
                name: "mobile"
            },
            {
                data: "email",
                name: "email"
            },
            {
                data: "edit",
                name: "edit",
                render: function(d, t, r, m) {
                    return `
                    <a  class="btn btn-success" href="${admin_url}/byerinfo/${r.id}">تعديل</a>
                    `
                }
            },
            {
                data: "delete",
                name: "delete",
                render: function(d, t, r, m) {
                    return `
                    <button type="button" data-status="0" data-id="${r.id}" class="btn btn-danger delete">حذف</button>
                    `
                }
            },




        ],
        columnDefs: [{
                targets: [0, 1, 2, 3],
                searchable: true
            },

        ],
        ordering: false,
    });
    $(document).on('click', '.delete', function() {
        var id = $(this).data('id');
        var data = {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'id': id
        };
        var status = $(this).data('status');
        $.confirm({
            title: 'تأكيد الإجراء',
            content: 'هل أنت متأكد من حذف هذا الحساب ؟',
            type: 'red',
            buttons: {
                نعم: {
                    btnClass: 'btn btn-primary',
                    action: function() {
                        $.post(delete_user, data, function(response) {
                            if (response.success) {
                                shops.ajax.reload();
                            }
                        })
                    }
                },
                لا: {
                    btnClass: 'btn btn-danger',
                }
            }
        })
    })
})