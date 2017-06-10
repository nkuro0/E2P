/**
 * Created by Florian on 09-06-17.
 */
var elID = [];

$(document).ready(function() {
    $('tbody.basket tr').each(function() {
        elID.push($(this).attr('id'));
    })

    for (var i = 0; i < elID.length; i++) {
        let id = `tr#${ elID[i] }`;

        $(id).children('td.nbr')
            .keypress(function() { changeQty(id) })
            .keyup(function() { changeQty(id) })
    }
})

function changeQty(id) {
    let el = $(id).children('td.nbr').children('input[type=number]')
        , unitPrice = $(`${id} input[name=prixUnitaire]`).val()
        , s  = el.val()
        , to = $(id).children('td.sumprice').children('b')
        , total = [];

    to.html(s * unitPrice)

    $('td.sumprice b').each(function() {
        total.push($(this).text() * 1)
    })
    let sumTotal = total.reduce((a, b) => a + b, 0);
    $('b.totalprice').text(sumTotal)
}