$(document).ready(function() {
    var shops = $("#shops").DataTable({
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
            url: admin_url + "/all-shops",
            type: "GET",
        },

        columns: [{
                data: "buyer_name",
                name: "buyer_name"
            },

            {
                data: "buyer_mobile",
                name: "buyer_mobile"
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
                data: "stop",
                name: "stop",
                render: function(d, t, r, m) {
                    var attr = r.membership_status == 0 ? 'disabled' : '';
                    return `
                    <button type="button" data-status="0" data-id="${r.id}" ${attr} class="btn btn-danger status">ايقاف</button>
                    `
                }
            },
            {
                data: "activate",
                name: "activate",
                render: function(d, t, r, m) {
                    var attr = r.membership_status == 1 ? 'disabled' : '';
                    return `
                    <button type="button" data-status="1" data-id="${r.id}" ${attr} class="btn btn-primary status">تفعيل</button>
                    `
                }
            },
            {
                data: "membership",
                name: "membership",
                render: function(d, t, r, m) {
                    return `
                   باقي شهر على الاشتراك
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
    $(document).on('click', '.status', function() {
        var id = $(this).data('id');
        var data = {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'id': id
        };
        var status = $(this).data('status');
        $.confirm({
            title: 'تأكيد الإجراء',
            content: (status == 0 ? 'هل تريد إيقاف الحساب' : 'هل تريد تفعيل الحساب') + ' ؟ ',
            type: status == 0 ? 'red' : 'blue',
            buttons: {
                نعم: {
                    btnClass: 'btn btn-primary',
                    action: function() {
                        $.post(change_buyer_membership_status, data, function(response) {
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