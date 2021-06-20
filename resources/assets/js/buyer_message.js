$(document).ready(function() {
    if (message != "") {
        var content = `
            <div class="row w-100 p-0">
                <div class="col-12 p-0">
                    <section class="acc-success text-center">
                        <img src="${success_img}" class="img-fluid" alt="done">
                        <h3>تم انشاء الحساب بنجاح</h3>
                        <p>${message}</p>
                    </section>
                </div>
            </div>
        `
        setTimeout(() => {


            $.confirm({
                columnClass: 'col-md-12',
                title: false,
                content: content,
                buttons: {
                    'حسنًا': {
                        btnClass: 'btn btn-success',
                        alignMiddle: true,
                        action: function() {
                            $.post(change_message_status, { '_token': $('meta[name="csrf-token"]').attr('content') }, function(respone) {})
                        }
                    }
                }
            })
        }, 2000);
    }
})