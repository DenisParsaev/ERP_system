/**
 * Created by ignat on 13.04.2016.
 */

/* Функция аавершения предоплаты*/
function end_prepay() {
    var msg   = $('#end_prepay').serialize();
    $.ajax({
        type: 'POST',
        url: '/delivery_function/delivery.php',
        data: msg,
        success: function(data) {
            $('#result_delivery').html(data);
            $(".submitForm").remove();
        },
        error:  function(xhr, str){
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    });
}

/* Функция аавершения предоплаты*/
function end_delivery() {
    var msg = $('#end_delivery').serialize();
    var msg_prepay= $('#end_prepay').serialize();

    $.ajax({
        type: 'POST',
        url: '/function/preorder_content.php',
        data: msg_prepay+'&'+msg,
        success: function(data) {
            $('#result_end_delivery').html(data);
        },
        error:  function(xhr, str){
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    });
}

/* Функция вывода заполения оплаты предзаказа*/
function select_post_type(target,type,full_cost,prepay_sum,call_id)
{
    if(type==1)
    {
        if(target==1)
            {
                $.ajax({
                    type: 'POST',
                    url: '/delivery_function/intime/shop.php?full_cost='+full_cost+'&call_id='+call_id+'&prepay_sum='+prepay_sum,
                    success: function(data) {
                        $('#type_post_result').html(data);
                        $(".select").select2();
                    },
                    error:  function(xhr, str){
                        alert('Возникла ошибка: ' + xhr.responseCode);
                    }
                });
            }
        else
            {
                $.ajax({
                    type: 'POST',
                    url: '/delivery_function/intime/address.php?full_cost='+full_cost+'&call_id='+call_id+'&prepay_sum='+prepay_sum,
                    success: function(data) {
                        $('#type_post_result').html(data);
                        $(".select").select2();
                    },
                    error:  function(xhr, str){
                        alert('Возникла ошибка: ' + xhr.responseCode);
                    }
                });
            }

    }
    else
    {
        if(target==1)
        {
            $.ajax({
                type: 'POST',
                url: '/delivery_function/newpost/shop.php?full_cost='+full_cost+'&call_id='+call_id+'&prepay_sum='+prepay_sum,
                success: function(data) {
                    $('#type_post_result').html(data);
                    $(".select").select2();
                },
                error:  function(xhr, str){
                    alert('Возникла ошибка: ' + xhr.responseCode);
                }
            });
        }
        else
        {
            $.ajax({
                type: 'POST',
                url: '/delivery_function/newpost/address.php?full_cost='+full_cost+'&call_id='+call_id+'&prepay_sum='+prepay_sum,
                success: function(data) {
                    $('#type_post_result').html(data);
                    $(".select").select2();
                },
                error:  function(xhr, str){
                    alert('Возникла ошибка: ' + xhr.responseCode);
                }
            });
        }
    }
}

/* Функция вывода заполения оплаты предзаказа*/
function preorder_prepay(type,full_cost,call_id)
{
    if(type==1)
    {
        $.ajax({
            type: 'POST',
            url: '/price_function/prepay.php?full_cost='+full_cost+'&call_id='+call_id,
            success: function(data) {
                $('#result_prepay').html(data);
                $(".select").select2();
            },
            error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
    }
    else
    {
        $.ajax({
            type: 'POST',
            url: '/price_function/prepay.php?prepay=no',
            success: function(data) {
                $('#result_prepay').html(data);
                $(".select").select2();
            },
            error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
    }
}

/* Функция вывода заполения оплаты предзаказа*/
function imposed_money(type,full_cost,prepay_sum)
{
    if(type==1)
    {
        $.ajax({
            type: 'POST',
            url: '/delivery_function/imposed_pay.php?full_cost='+full_cost+'&prepay_sum='+prepay_sum,
            success: function(data) {
                $('#result_imposed_pay').html(data);
            },
            error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
    }
    else
    {
        var imposed_sum = document.getElementById("imposed_sum");
        imposed_sum.remove();
    }
}



/*Функция вывода полей для заполнения доставки*/
function preorder_delivery(type,call_id,prepay_sum,full_cost)
{
    if(type==0)
        {
            $.ajax({
                type: 'POST',
                url: '/delivery_function/two_pillars.php',
                data: 'call_id='+call_id+'&prepay_sum='+prepay_sum+'&full_cost='+full_cost,
                success: function(data) {
                    $('#delivery_type').html(data);
                },
                error:  function(xhr, str){
                    alert('Возникла ошибка: ' + xhr.responseCode);
                }
            });

            var newpost = document.getElementById("newpost");
            newpost.remove();

            var intime = document.getElementById("intime");
            intime.remove();

            var addres = document.getElementById("addres");
            addres.remove();

            var hitched = document.getElementById("hitched");
            hitched.remove();

            var pickup = document.getElementById("pickup");
            pickup.remove();

        }

    if(type==1)
    {
        $.ajax({
            type: 'POST',
            url: '/delivery_function/newpost/overall.php',
            data: 'call_id='+call_id+'&prepay_sum='+prepay_sum+'&full_cost='+full_cost,
            success: function(data) {
                $('#delivery_type').html(data);
            },
            error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });

        var intime = document.getElementById("intime");
        intime.remove();

        var addres = document.getElementById("addres");
        addres.remove();

        var hitched = document.getElementById("hitched");
        hitched.remove();

        var pickup = document.getElementById("pickup");
        pickup.remove();

        var two_pillars = document.getElementById("two_pillars");
        two_pillars.remove();

    }

    if(type==2)
    {
        $.ajax({
            type: 'POST',
            url: '/delivery_function/intime/overall.php',
            data: 'call_id='+call_id+'&prepay_sum='+prepay_sum+'&full_cost='+full_cost,
            success: function(data) {
                $('#delivery_type').html(data);
            },
            error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });

        var newpost = document.getElementById("newpost");
        newpost.remove();

        var addres = document.getElementById("addres");
        addres.remove();

        var hitched = document.getElementById("hitched");
        hitched.remove();

        var pickup = document.getElementById("pickup");
        pickup.remove();

        var two_pillars = document.getElementById("two_pillars");
        two_pillars.remove();;

    }

    if(type==3)
    {
        $.ajax({
            type: 'POST',
            url: '/delivery_function/addres.php',
            data: 'call_id='+call_id+'&prepay_sum='+prepay_sum+'&full_cost='+full_cost,
            success: function(data) {
                $('#delivery_type').html(data);
            },
            error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });

        var newpost = document.getElementById("newpost");
        newpost.remove();

        var intime = document.getElementById("intime");
        intime.remove();

        var hitched = document.getElementById("hitched");
        hitched.remove();

        var pickup = document.getElementById("pickup");
        pickup.remove();

        var two_pillars = document.getElementById("two_pillars");
        two_pillars.remove();;

    }

    if(type==4)
    {
        $.ajax({
            type: 'POST',
            url: '/delivery_function/hitched.php',
            data: 'call_id='+call_id+'&prepay_sum='+prepay_sum+'&full_cost='+full_cost,
            success: function(data) {
                $('#delivery_type').html(data);
            },
            error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });

        var newpost = document.getElementById("newpost");
        newpost.remove();

        var intime = document.getElementById("intime");
        intime.remove();

        var addres = document.getElementById("addres");
        addres.remove();

        var pickup = document.getElementById("pickup");
        pickup.remove();

        var two_pillars = document.getElementById("two_pillars");
        two_pillars.remove();;

    }

    if(type==5)
        {
            $.ajax({
                type: 'POST',
                url: '/delivery_function/pickup.php',
                data: 'call_id='+call_id+'&prepay_sum='+prepay_sum+'&full_cost='+full_cost,
                success: function(data) {
                    $('#delivery_type').html(data);
                },
                error:  function(xhr, str){
                    alert('Возникла ошибка: ' + xhr.responseCode);
                }
            });

            var newpost = document.getElementById("newpost");
            newpost.remove();

            var intime = document.getElementById("intime");
            intime.remove();

            var addres = document.getElementById("addres");
            addres.remove();

            var hitched = document.getElementById("hitched");
            hitched.remove();

            var two_pillars = document.getElementById("two_pillars");
            two_pillars.remove();;

        }
}
/* Функция показа полей для зполнения при выборе направления предоплаты*/
function way_prepay(full_cost,call_id)
{
    var sel = document.getElementById("prepay_way"); // Получаем наш список
    var val = sel.options[sel.selectedIndex].value; // Получаем значение выделенного элемента (в нашем случае fruit2).

    if(val=='card')
        {
            $.ajax({
                type: 'POST',
                url: '/price_function/way_prepay/card.php?full_cost='+full_cost,
                success: function(data) {
                    $('#result_way_prepay').html(data);
                    $(".select_card").select2();
                },
                error:  function(xhr, str){
                    alert('Возникла ошибка: ' + xhr.responseCode);
                }
            });

            var cash = document.getElementById("cash");
            cash.remove();

            var vat = document.getElementById("vat");
            vat.remove();

            var check = document.getElementById("check");
            check.remove();
        }
    if(val=='cash')
        {
            $.ajax({
                type: 'POST',
                url: '/price_function/way_prepay/cash.php?full_cost='+full_cost+'&call_id='+call_id,
                success: function(data) {
                    $('#result_way_prepay').html(data);
                },
                error:  function(xhr, str){
                    alert('Возникла ошибка: ' + xhr.responseCode);
                }
            });



            var card = document.getElementById("card");
            card.remove();

            var vat = document.getElementById("vat");
            vat.remove();

            var check = document.getElementById("check");
            check.remove();
        }
    if(val=='vat')
        {
            $.ajax({
                type: 'POST',
                url: '/price_function/way_prepay/vat.php?full_cost='+full_cost,
                success: function(data) {
                    $('#result_way_prepay').html(data);
                },
                error:  function(xhr, str){
                    alert('Возникла ошибка: ' + xhr.responseCode);
                }
            });

            var card = document.getElementById("card");
            card.remove();

            var cash = document.getElementById("cash");
            cash.remove();

            var check = document.getElementById("check");
            check.remove();
        }
    if(val=='check')
        {
            $.ajax({
                type: 'POST',
                url: '/price_function/way_prepay/check.php?full_cost='+full_cost,
                success: function(data) {
                    $('#result_way_prepay').html(data);
                },
                error:  function(xhr, str){
                    alert('Возникла ошибка: ' + xhr.responseCode);
                }
            });

            var card = document.getElementById("card");
            card.remove();

            var cash = document.getElementById("cash");
            cash.remove();

            var vat = document.getElementById("vat");
            vat.remove();
        }
}