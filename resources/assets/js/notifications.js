$(document).ready(function() {
    var getNotifications_url = home_url + "/getNotifications";
    var read_notifications_url = home_url + "/read_notifications";
    $(document).on('click', '#notification_btn', function() {
        $.get(getNotifications_url, function(response) {
            if (response.success) {
                var items = "";
                for (var i = 0; i < response.notifications.length; i++) {
                    items += `<li><a class="dropdown-item notification-item ${response.notifications[i].status==0?'msg-unread':''}" data-id="${response.notifications[i].id}" href="${response.notifications[i].url}">${response.notifications[i].content}</a></li>`
                }
                $('ul#notifications').html(items);
            }
        })
    })
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