

/*Функция добавления проволоки на склад*/
function stock_wire_add() {
    var msg   = $('#stock_wire_add').serialize();
    $.ajax({
        type: 'POST',
        url: '/stock/function/update_wire.php',
        data: msg,
        success: function(data) {
            $('#result_update_wire').html(data);
        },
        error:  function(xhr, str){
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    });

}

function check_status() {
    var msg   = $('#check_status').serialize();
    $.ajax({
        type: 'POST',
        url: '/function/check_status.php',
        data: msg,
        success: function(data) {
            $('#status').val(data);
        },
        error:  function(xhr, str){
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    });

}

/*Функция обновления прайса рабица*/
function update_price_rabiza(cell) {
    var msg   = $('#save_price_' + cell + '').serialize();
    $.ajax({
        type: 'POST',
        url: '/function/price_update.php',
        data: msg,
        success: function(data) {
            $('#result').html(data);
        },
        error:  function(xhr, str){
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    });
}

function calc_price_rabiza(cell) {
    var msg   = $('#save_price_' + cell + '').serialize();
    $.ajax({
        type: 'POST',
        url: '/function/price_calc.php?cell='+cell,
        data: msg,
        success: function(data) {
            $('#result').html(data);
        },
        error:  function(xhr, str){
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    });
}



/*Функция пересчета прайса рабица*/
function recalculation_price_rabiza(cell) {
    var msg   = $('#save_price_' + cell + '').serialize();
    $.ajax({
        type: 'POST',
        url: '/function/price_update.php',
        data: msg,
        success: function(data) {
            $('#result').html(data);
        },
        error:  function(xhr, str){
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    });
}

/*Функция скачивания прайса*/
function price_rabica_excell() {
    $.ajax({
        type: 'POST',
        url: '/price/make.php',
        success: function(data) {
            $('#result').html(data);
        },
        error:  function(xhr, str){
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    });
}

function explanatory_id() {
    var msg   = $('#explanatory_id').serialize();
    $.ajax({
        type: 'POST',
        url: '/function/explanatory.php',
        data: msg,
        success: function(data) {
            $('#result').html(data);
        },
        error:  function(xhr, str){
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    });
}



/*Функция ознакомления с уведомлениями*/
function familiar_user(id,user,target) {
    var msg   = $('#familiar_user').serialize();
    $.ajax({
        type: 'POST',
        url: '/function/add_message.php?id='+ id +'&user='+ user +'&target='+ target +'',
        data: msg,
        success: function(data) {
            $('#result').html(data);
        },
        error:  function(xhr, str){
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    });
}

function cost_wire(type) {
    var msg   = $('#cost_wire_'+ type +'').serialize();
    $.ajax({
        type: 'POST',
        url: '/function/cost_wire_update.php?type='+type,
        data: msg,
        success: function(data) {
            $('#result').html(data);
        },
        error:  function(xhr, str){
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    });
}

function update_price_welded_mesh() {
    var msg   = $('#update_price_welded_mesh').serialize();
    $.ajax({
        type: 'POST',
        url: '/function/update_price_welded_mesh.php',
        data: msg,
        success: function(data) {
            $('#result').html(data);
        },
        error:  function(xhr, str){
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    });
}

/* Скриптсохранения настроек */
function setting_update() {
    var msg   = $('#setting_update').serialize();
    $.ajax({
        type: 'POST',
        url: '/function/update_setting.php',
        data: msg,
        success: function(data) {
            $('#result').html(data);
        },
        error:  function(xhr, str){
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    });
}

/* Сохранение прайса автозапчасти */
function parts_price(target,parts_id) {
    if(target==1){var data=$("#price_one").val();}
    if(target==2){var data=$("#price_two").val();}
    if(target==3){var data=$("#price_three").val();}
    if(target==4){var data=$("#count").val();}

    $.ajax({
        type: 'POST',
        url: '/function/update_parts_price.php',
        data: "data="+data+"&target="+target+"&parts_id="+parts_id+"",
        success: function(data) {
            $('#result').html(data);
        },
        error:  function(xhr, str){
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    });
}

