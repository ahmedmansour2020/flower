$(document).ready(function() {
    var shops = $("#areas").DataTable({
        dom: "lBfrtip",
        processing: false,
        serverSide: true,
        destroy: true,
        "pageLength": 25,
        "bInfo": false,
        "bFilter": false,
        "bLengthChange": false,
        language: {
            url: language,
        },
        ajax: {
            url: admin_url + "/areas",
            type: "GET",
        },

        columns: [{
                data: "name",
                name: "name"
            },

            {
                data: "city_name",
                name: "city_name"
            },
            {
                data: "edit",
                name: "edit",
                render: function(d, t, r, m) {
                    return `
                    <a  class="btn btn-success" href="${admin_url}/area/${r.id}">تعديل</a>
                    `
                }
            },
            {
                data: "remove",
                name: "remove",
                render: function(d, t, r, m) {
                    return `
                    <button type="button" data-id="${r.id}"class="btn btn-danger remove">حذف</button>
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
    $(document).on('click', '.remove', function() {
        var id = $(this).data('id');
        var data = {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'id': id
        };
        var status = $(this).data('status');
        $.confirm({
            title: 'تأكيد الإجراء',
            content: "هل تريد حذف هذا الحي ؟",
            type: "red",
            buttons: {
                نعم: {
                    btnClass: 'btn btn-primary',
                    action: function() {
                        $.post(area_delete, data, function(response) {
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