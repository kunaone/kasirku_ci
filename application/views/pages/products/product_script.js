$(function () {
    moment.locale('id');

    $('.js-time').each(function () {
        var $el = $(this);
        var m = moment($.trim($el.text()), 'YYYY-MM-DD HH:mm:ss', true);
        if (!m.isValid()) { return; }

        var label = m.isSame(moment(), 'day')
            ? m.format('HH:mm')   // today: just the time
            : m.fromNow();        // older: "kemarin", "3 hari yang lalu"

        $el.html('<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;' + label);
    });
});