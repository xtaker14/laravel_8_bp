$(document).ready(function () {
    $.each($('div.c-sidebar ul.c-sidebar-nav-dropdown-items > li.c-sidebar-nav-dropdown > ul.c-sidebar-nav-dropdown-items > li'), function (idx, key) {
        let t = $(this);
        let old_padding = t.find('a:eq(0)').css("padding-left");
        let old_padding_val = old_padding.replace('px', '');
        let new_padding_val = parseInt(old_padding_val) + 15;

        // alert(t.find('a:eq(0)').text().trim() + ' ' + idx);
        t.find('a:eq(0)').css({
            'padding-left': new_padding_val + 'px',
        });
        if (t.find('ul:eq(0)').length > 0){
            setPaddingChild(t, new_padding_val);
        }
    });
});

function setPaddingChild(t, new_padding_val) {
    $.each(t.find('ul:eq(0) > li'), function (idx, key) {
        let tt = $(this);
        // let new_padding_val_2 = parseInt(new_padding_val) + 15;

        // alert(tt.find('a:eq(0)').text().trim() + ' ' + idx);
        tt.find('a:eq(0)').css({
            'padding-left': new_padding_val + 'px',
        });
        if (tt.find('ul:eq(0)').length > 0) {
            setPaddingChild(tt, new_padding_val);
        }
    });
}
