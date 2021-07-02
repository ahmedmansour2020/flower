$(document).ready(function() {
    $(document).on('click', '.open-message', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var item = $(this);
        var message = $(this).data('message');
        var content = `
     <br>
           <hr>
                <div class="modal-body w-100">
                    <p>
                    ${message}
                    </p>
                </div>
               
            
       
        `;
        var data = {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "id": id,
        };
        $.post(msg_read, data, function(response) {
            $(item).removeClass('msg-unread');
        })
        $.confirm({
            title: false,
            content: content,
            closeIcon: true,
            buttons: {
                'تواصل معنا': {
                    btnClass: "btn-messages w-100",
                    action: open_send_message
                }
            },
        })
    })
    $(document).on('click', '.open_send_message', function(e) {
        e.preventDefault();
        open_send_message()
    })

    function open_send_message() {

        $('.jconfirm-closeIcon').click();
        var content = `
        <br>
           <hr>
        <div class="modal-body ">

            <div class="form-group">
                <input type="text" name="subject" id="subject-message" class="w-100 d-block text-end" placeholder="العنوان">
                <textarea name="content" id="content-message" cols="30" class="w-100 d-block text-end"
                    placeholder="الرساله"></textarea>
            </div>

    </div>
    <div class="modal-footer btn-map">
        <button type="button" class="send-message">ارسال</button>
    </div>
        `
        $.confirm({
            title: false,
            content: content,
            closeIcon: true,
            buttons: false
        })
    }

    $(document).on('click', '.send-message', function() {
        $('.jconfirm-closeIcon').click();
        var data = {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "subject": $('#subject-message').val(),
            "content": $('#content-message').val(),
        };
        $.post(home_message, data, function(response) {
            if (response.success) {
                $.confirm({
                    title: false,
                    content: "تم ارسال الرسالة بنجاح",
                    buttons: {
                        "حسناً": {

                            btnClass: "btn-messages",
                            action: function() {}
                        }
                    }
                })
            }
        })
    })
})