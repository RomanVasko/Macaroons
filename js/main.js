'use strict'

window.onload = function () {
    /* wow init */
    new WOW().init();
    /* Maskedinput */
    $('#order-form-call').mask('+38(999) 999-99-99');
    // $('.subtract').click(function () {
    //     var $input = $('#total');
    //     var count = parseInt($input.val()) - 1;
    //     count = count < 1 ? 1 : count;
    //     $input.val(count);
    //     // $input.change();
    //     // return false;
    // });
    // $('.add').click(function () {
    //     var $input = $('#total');
    //     $input.val(parseInt($input.val()) + 1);
    //     // $input.change();
    //     // return false;
    // });

    let btn_plus = document.getElementsByClassName('add');
    let btn_minus = document.getElementsByClassName('subtract');
    let total = document.getElementsByClassName('total');

    for (let i = 0; i < btn_plus.length; i++) {
        btn_plus[i].addEventListener('click', () => {
            total[i].value = parseInt(total[i].value) + 1;
        });
    }

    for (let j = 0; j < btn_minus.length; j++) {
        btn_minus[j].addEventListener('click', () => {
            let count = parseInt(total[j].value) - 1;
            count = count < 0 ? 0 : count;
            total[j].value = count;
        });
    }

    document.getElementById('header-menu-1').onclick = function () {
        document.getElementById('header-menu').classList.add('open');
    };

    document.querySelectorAll('#header-menu > *').forEach((item) => {
        console.log(item);
        item.onclick = () => {
            document.getElementById('header-menu').classList.remove('open');
        }
    })
}


