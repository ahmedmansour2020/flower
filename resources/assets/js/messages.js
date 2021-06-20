$(document).ready(function() {
    var all = $("#all").DataTable({
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
            url: home_url + "/incoming-mail",
            type: "GET",
        },

        columns: [{
                data: "name",
                name: "name"
            },

            {
                data: "subject",
                name: "subject"
            },
            {
                data: "date",
                name: "date"
            },
            {
                data: "time",
                name: "time"
            },
            {
                data: "status",
                name: "status",
                render: function(d, t, r, m) {
                    if (d == 0) {
                        return '<span class="text-warning">غير مقروءة</span>';
                    } else {
                        return '<span class="text-success">مقروءة</span>';
                    }
                }
            },
            {
                data: "view",
                name: "view",
                render: function(d, t, r, m) {
                    return `<a href="${home_url}/view-mail/${r.id}" class="btn btn-success">عرض</a>`;
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
                targets: [0, 1, 2, 3],
                searchable: true
            },

        ],
        ordering: false,
    });

    var _new = $("#new").DataTable({
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
            url: home_url + "/incoming-mail?mail-messages=new",
            type: "GET",
        },

        columns: [{
                data: "name",
                name: "name"
            },

            {
                data: "subject",
                name: "subject"
            },
            {
                data: "date",
                name: "date"
            },
            {
                data: "time",
                name: "time"
            },
            {
                data: "status",
                name: "status",
                render: function(d, t, r, m) {
                    if (d == 0) {
                        return '<span class="text-warning">غير مقروءة</span>';
                    } else {
                        return '<span class="text-success">مقروءة</span>';
                    }
                }
            },
            {
                data: "view",
                name: "view",
                render: function(d, t, r, m) {
                    return `<a href="${home_url}/view-mail/${r.id}" class="btn btn-success">عرض</a>`;
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
                targets: [0, 1, 2, 3],
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
            title: 'هل تريد حذف هذه الرسالة ؟',
            type: 'red',
            typeAnimated: true,

            content: false,
            buttons: {
                نعم: {
                    btnClass: 'btn-blue',
                    action: function() {
                        $.post(delete_message, data, function(response) {
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