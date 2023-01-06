$(document).ready(function(){
    showHideParentMenu();
    showHideParentModule();
    
    showHideModule();
    showHideMController();
    if ($("#inp_is_module").val() == 'no'){
        showHideMethodRoute();
    }else{
        showHideMethodRouteByModule();
    }
    // fillAccessAndURL();

    $("#inp_is_menu").change(function () {
        let t = $(this);
        clearMVC(true);
        showHideParentMenu(t);
        showHideModule();
        showHideMethodRoute(t);
        showHideMController();
    });

    $("#inp_is_parent_menu").change(function () {
        let t = $(this);
        clearMVC(true);
        showHideParentModule(t); 
    });

    $("#inp_is_module").change(function () {
        let t = $(this);
        showHideModule(t);
        showHideMController();
        showHideMethodRoute();
    });

    $("#parent_module_name").find('select[name=module_name]').change(function () {
        let t = $(this);
        showHideMController(t);
        showHideMethodRouteByModule(t);
    }); 

    $("#parent_m_controller_name select[name=m_controller_name]").change(function(){
        let t = $(this);
        fillAccessAndURL(t);
    });

    $("#parent_non_m_controller_name select[name=non_m_controller_name]").change(function () {
        let t = $(this);
        fillAccessAndURL(t);
    });

    $("#form_submit").submit(function(ev){
        let t = $(this);
        let is_menu = $("#inp_is_menu");
        let is_module = $("#inp_is_module");
        let parent_is_parent_menu = $("#parent_is_parent_menu");
        let parent_module_name = $("#parent_module_name");
        let parent_m_controller_name = $("#parent_m_controller_name");
        let parent_non_m_controller_name = $("#parent_non_m_controller_name");

        if (parent_is_parent_menu.find('#inp_is_parent_menu').val() == 'yes') {
            return;
        }
        if (is_module.val() == 'yes') {
            parent_non_m_controller_name.find('select[name=non_m_controller_name]').val('');

            if(parent_module_name.find('select[name=module_name]').val() == ''){
                alert('Module name cannot be empty!');
                ev.preventDefault();
                return;
            }
            if (parent_m_controller_name.find('select[name=m_controller_name]').val() == '') {
                alert('Controller name cannot be empty!');
                ev.preventDefault();
                return;
            }
        }

        if (is_module.val() == 'no') {
            parent_module_name.find('select[name=module_name]').val('');
            parent_m_controller_name.find('select[name=m_controller_name]').val('');

            if (parent_non_m_controller_name.find('select[name=non_m_controller_name]').val() == '') {
                alert('Controller name cannot be empty!');
                ev.preventDefault();
                return;
            } 
        }
    });
});

clearMVC = (hide_parent=false) => {
    let parent_module_name = $("#parent_module_name");
    let parent_m_controller_name = $("#parent_m_controller_name");
    let parent_non_m_controller_name = $("#parent_non_m_controller_name");
    let inp_menu_url = $("#inp_menu_url");
    let inp_menu_route = $("#inp_menu_route");
    let inp_access_name = $("#inp_access_name");

    if (hide_parent){
        parent_module_name.hide();
        parent_m_controller_name.hide();
        parent_non_m_controller_name.hide();
    }
    parent_module_name.find('select[name=module_name]').val('');
    parent_m_controller_name.find('select[name=m_controller_name]').val('');
    parent_non_m_controller_name.find('select[name=non_m_controller_name]').val('');
    inp_menu_url.val('');
    inp_menu_route.val('');
    inp_access_name.val('');
    inp_menu_url.attr('readonly', true);
    inp_menu_route.attr('readonly', true);
    inp_access_name.attr('readonly', true);
}

showHideParentMenu = (t = null) => {
    if (t == null) {
        t = $("#inp_is_menu");
    }
    let parent_is_module = $("#parent_is_module");
    let parent_is_parent_menu = $("#parent_is_parent_menu");

    // parent_is_module.find('#inp_is_module').val('');
    if (t.val() == 'yes') {
        // parent_is_module.hide();
        parent_is_parent_menu.show('slow');
    } else {
        parent_is_parent_menu.hide();
        parent_is_parent_menu.find('#inp_is_parent_menu').val('no');
        // parent_is_module.find('#inp_is_module').val('no');
        parent_is_module.show('slow');
    }
}

showHideParentModule = (t = null) => {
    if (t == null) {
        t = $("#inp_is_parent_menu");
    }
    let parent_is_module = $("#parent_is_module");
    let inp_menu_url = $("#inp_menu_url");
    let inp_menu_route = $("#inp_menu_route");
    let inp_access_name = $("#inp_access_name");
    let type = $('select[name=type]');
    let final_access = type.val() + '.access.[replace_this_text]';

    if (t.val() == 'yes') {
        parent_is_module.hide('slow', function (){
            // parent_is_module.find('#inp_is_module').val('no');
            inp_menu_url.attr('readonly', false);
            inp_menu_route.attr('readonly', false);
            inp_access_name.attr('readonly', false);
            inp_menu_url.val('#');
            inp_menu_route.val('#');
            inp_access_name.val(final_access);
        });
    } else {
        // parent_is_module.find('#inp_is_module').val('no');
        inp_menu_url.attr('readonly', true);
        inp_menu_route.attr('readonly', true);
        inp_access_name.attr('readonly', true);
        inp_menu_url.val('');
        inp_menu_route.val('');
        inp_access_name.val('');
        parent_is_module.show('slow', function () {});
        showHideModule();
    }
}

showHideModule = (t = null) => {
    if (t == null) {
        t = $("#inp_is_module");
    }
    // let inp_access_name = $("#inp_access_name");
    let parent_module_name = $("#parent_module_name");
    let parent_non_m_controller_name = $("#parent_non_m_controller_name");
    let parent_is_parent_menu = $("#parent_is_parent_menu");

    clearMVC();
    if (parent_is_parent_menu.find('#inp_is_parent_menu').val() == 'no') {
        if (t.val() == 'yes') {
            parent_non_m_controller_name.hide();
            parent_module_name.show('slow');
        } else {
            parent_module_name.hide();
            parent_non_m_controller_name.show('slow');
        }
    } else {
        parent_module_name.hide();
        parent_non_m_controller_name.hide();
    }
}

showHideMController = (t = null) => {
    if (t == null) {
        t = $("#parent_module_name").find('select[name=module_name]');
    }
    let parent_m_controller_name = $("#parent_m_controller_name");

    parent_m_controller_name.find('select[name=m_controller_name]').val('');
    if (t.val() != '') {
        parent_m_controller_name.show('slow');
    } else {
        parent_m_controller_name.hide();
    }
}

showHideMethodRoute = (t = null) => {
    if (t == null) {
        t = $("#inp_is_menu");
    }
    let parent_m_controller_name = $("#parent_m_controller_name");
    let parent_non_m_controller_name = $("#parent_non_m_controller_name");

    clearMVC();
    $.each(parent_m_controller_name.find('option.opt_check'), function (idx, key) {
        let t2 = $(this);
        t2.hide();
    });

    $.each(parent_non_m_controller_name.find('option.opt_check'), function (idx, key) {
        let t2 = $(this);

        // console.log(t2.data('method'));
        t2.hide();
        if (t.val() == 'yes' && t2.data('method') == 'GET') {
            t2.show();
        }
        else if (t.val() == 'no' && t2.data('method') != 'GET') {
            t2.show();
        }
    });
}

showHideMethodRouteByModule = (t = null) => {
    if (t == null) {
        t = $("#parent_module_name").find('select[name=module_name]');
    }
    let parent_m_controller_name = $("#parent_m_controller_name");
    let parent_non_m_controller_name = $("#parent_non_m_controller_name");
    let is_menu = $("#inp_is_menu");
    let inp_menu_url = $("#inp_menu_url");
    let inp_menu_route = $("#inp_menu_route");
    let inp_access_name = $("#inp_access_name");

    inp_menu_url.val('');
    inp_menu_route.val('');
    inp_access_name.val('');
    inp_menu_url.attr('readonly', true);
    inp_menu_route.attr('readonly', true);
    inp_access_name.attr('readonly', true);
    parent_non_m_controller_name.find('select[name=non_m_controller_name]').val('');
    $.each(parent_non_m_controller_name.find('option.opt_check'), function (idx, key) {
        let t2 = $(this);
        t2.hide();
    });

    if (t.val() != '') {
        $.each(parent_m_controller_name.find('option.opt_check'), function (idx, key) {
            let t2 = $(this);
            t2.hide();
        });

        $.each(v_modules[t.find('option:selected').text().trim()], function (idx, key) {
            if (is_menu.val() == 'yes' && key.methods[0] == 'GET') {
                parent_m_controller_name.find('option.opt_check[data-uri="' + key.uri + '"]').show();
            }
            else if (is_menu.val() == 'no' && key.methods[0] != 'GET') {
                parent_m_controller_name.find('option.opt_check[data-uri="' + key.uri + '"]').show();
            }
        });
    }
}

fillAccessAndURL = (t = null) => {
    let is_module = $("#inp_is_module");
    if (t == null && is_module.val() == 'yes') {
        t = $('#parent_m_controller_name select[name=m_controller_name]');
    }else if (t == null && is_module.val() == 'no') {
        t = $('#parent_non_m_controller_name select[name=non_m_controller_name]');
    }else if (t == null){
        return true;
    }

    let t_selected = t.find('option:selected');
    let inp_menu_url = $("#inp_menu_url");
    let inp_menu_route = $("#inp_menu_route");
    let inp_access_name = $("#inp_access_name");
    let type = $('select[name=type]');

    if (t_selected.length == 0 || t.val() == '') {
        inp_menu_url.attr('readonly', true);
        inp_menu_route.attr('readonly', true);
        inp_access_name.attr('readonly', true);
        inp_menu_url.val('');
        inp_menu_route.val('');
        inp_access_name.val('');
        return true;
    }

    let menu_url = t_selected.data('uri');
    let menu_route = t_selected.data('route');
    let access = t_selected.data('access');
    let exp_access = access.split('.');
    let final_access = type.val() + '.access';
    let start_i = 0;

    if (type.val() == exp_access[0] || exp_access[0] == '') {
        start_i = 1;
    }

    for (let i = start_i; i < exp_access.length; i++) {
        if (exp_access[i] == ''){
            exp_access[i] = 'index';
        }
        final_access += '.' + exp_access[i];
    }

    inp_menu_url.attr('readonly', false);
    inp_menu_route.attr('readonly', false);
    inp_access_name.attr('readonly', false);
    inp_menu_url.val(menu_url);
    inp_menu_route.val(menu_route);
    inp_access_name.val(final_access);
}