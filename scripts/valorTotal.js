let value = 0;

Object.keys($('.preco-produto')).forEach((key) => {
    if (!isNaN(key)) {
        value += parseInt($('.preco-produto')[key].innerText.split('$')[1]);
    } else {
        return;
    }
});

$('.total-carrinho').text('Total: R$' + value.toFixed(2).replace('.', ','));