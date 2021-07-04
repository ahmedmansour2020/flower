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
        language: {
            url: language,
        },
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
                    <button  class="btn btn-success change-password" data-id="${r.id}" data-name="${r.name}" type="button">تعديل كلمة المرور</button>
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
    $(document).on('click', '#confirmation', function() {
        var id = $(this).data('id');
        if ($('#password').val() == $('#confirm-password').val() && $('#password').val() != "" && $('#confirm-password').val() != "") {
            $('.password-alarm').addClass('hidden');
            var data = {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "id": id,
                "password": $('#password').val(),
            };
            $.post(change_password, data, function(response) {
                if (response.success) {
                    $('.jconfirm-closeIcon').click();
                    $.alert('تم تغيير كلمة المرور بنجاح')
                }
            })
        } else if ($('#password').val() != $('#confirm-password').val()) {
            $('.password-alarm').removeClass('hidden');
            $('.password-alarm').text('كلمة المرور غير متطابقة');

        } else if ($('#password').val() == "" || $('#confirm-password').val() == "") {
            $('.password-alarm').removeClass('hidden');
            $('.password-alarm').text('برجاء كتابة كلمة المرور');

        }
    })
    $(document).on('click', '.change-password', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var content = `
        <div class="row px-2 text-right w-100">
        <div class="col-12 form-group">
        <label>كلمة المرور الجديدة</label>
        <input type="password" id="password" class="form-control">
        </div>
        <div class="col-12 mt-2 form-group">
        <label>تأكيد كلمة المرور </label>
        <input type="password" id="confirm-password" class="form-control">
        </div>
        <div class="col-12 mt-2 text-danger hidden password-alarm">
        
        </div>
        <div class="col-12 my-2 text-center">
        <button class="btn btn-primary" data-id="${id}" type="button" id="confirmation">تأكيد</button>
        </div>
        </div>
        
        `
        $.confirm({
            title: "تغيير كلمة مرور" + ` ${name}`,
            content: content,
            buttons: false,
            // buttons: {
            //     'تأكيد': {
            //         btnClass: 'btn btn-primary',
            //         action: function() {
            //             if ($('#password').val() == $('#confirm-password').val()) {
            //                 $('.password-alarm').addClass('hidden');

            //                 console.log($('#password').val());
            //                 console.log($('#confirm-password').val());
            //             } else {
            //                 $('.password-alarm').removeClass('hidden');

            //             }
            //         }
            //     },
            //     'إلغاء': {
            //         btnClass: 'btn btn-danger',
            //         action: function() {

            //         }
            //     }
            // }
        })
    })
})