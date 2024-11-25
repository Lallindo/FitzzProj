let value = 0;

// console.log(Object.keys($('.preco-produto')).length)

if (Object.keys($('.preco-produto')).length === 2) {
    $('.btn-finalizar').attr('disabled', true);
}

Object.keys($('.preco-produto')).forEach((key) => {
    if (!isNaN(key)) {
        value += parseInt($('.preco-produto')[key].innerText.split('$')[1]);
    } else {
        return;
    }
});

$('.total-carrinho').text('Total: R$' + value.toFixed(2).replace('.', ','));