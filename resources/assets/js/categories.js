$(document).ready(function() {
    var categories = $("#categories").DataTable({
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
            url: admin_url + "/category",
            type: "GET",
        },

        columns: [{
                data: "name",
                name: "name"
            },

            {
                data: "update",
                name: "update",
                render: function(d, t, r, m) {
                    return `<a href="${admin_url}/category/${r.id}" class="btn btn-success">تعديل</a>`;
                }
            },
            {
                data: "delete",
                name: "delete",
                render: function(d, t, r, m) {
                    return `<button type="button" class="btn btn-danger delete" data-id="${r.id}">حذف</button>`;
                }
            },




        ],
        columnDefs: [{
                targets: [0, 1, 2],
                searchable: true
            },

        ],
        ordering: false,
    });


    $(document).on('click', ".delete", function(e) {
        var id = $(this).data('id');
        var data = {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'id': id,
        };
        e.preventDefault();
        $.confirm({
            title: 'هل تريد حذف هذا العنصر ؟',
            type: 'red',
            typeAnimated: true,

            content: false,
            buttons: {
                نعم: {
                    btnClass: 'btn-blue',
                    action: function() {
                        $.post(delete_category, data, function(response) {
                            if (response.success) {
                                $('table').DataTable().ajax.reload();
                            }
                        })
                    }
                },
                لا: {
                    btnClass: 'btn-red',
                    action: function() {
                        // $.alert('Canceled!');
                    },
                }

            }
        });

    });
})