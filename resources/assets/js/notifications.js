$(document).ready(function() {
    var getNotifications_url = home_url + "/getNotifications";
    var read_notifications_url = home_url + "/read_notifications";

    setInterval(function() {

        $.get(getNotifications_url, function(response) {
            if (response.success) {
                $('#notification_count').text(response.count)
                if (response.count > 0) {
                    $('#notification_count').css('display', 'block');
                } else {
                    $('#notification_count').css('display', 'none');
                }
                var items = "";
                if (response.notifications.length > 0) {
                    for (var i = 0; i < response.notifications.length; i++) {
                        items += `<li><a class="dropdown-item notification-item ${response.notifications[i].status==0?'msg-unread':''}" data-id="${response.notifications[i].id}" href="${response.notifications[i].url}">${response.notifications[i].content}</a></li>`
                    }
                } else {
                    items = "<p class='text-center text-light'>لا يوجد اشعارات</p>"
                }
                $('ul#notifications').html(items);
            }
        })

    }, 3000)
    $(document).on('click', '.notification-item', function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        var id = $(this).data('id');
        var item = $(this);
        var data = {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "id": id
        };
        $.post(read_notifications_url, data, function(response) {
            if (response.success) {
                $(item).removeClass('msg-unread');
                window.location.href = href;
            }
        })
    })
})