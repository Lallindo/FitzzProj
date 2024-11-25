// É um array para ver se algum dos valores foi selecionado
let pagSelect = [0, 0, 0];

$('#btn-finalizar-compra').click(function (e) {
    Object.keys($('.radio-pag')).forEach((key, index) => {
        if (!isNaN(key) && $('.radio-pag')[key].checked) {
            pagSelect[index] = 1;
        } else {
            pagSelect[index] = 0;
        }
    });
    console.log(pagSelect);
    let tipoPag = $('.radio-pag')[Object.keys($('.radio-pag'))[pagSelect.indexOf(1)]].value;
    console.log(tipoPag);


    
    if (!pagSelect.includes(1)) {
        console.log('Erro! Selecione um tipo de pagamento.')
    } else {
        window.location.href = `../Views/calcular_valor_final.php?tipo=${tipoPag}`;
    }
});

$('.remover-item').click(() => window.location.href = 'carrinho.php');

console.log($('.preco-produto'));

let value = 0;

Object.keys($('.preco-produto')).forEach((key) => {
    if (!isNaN(key)) {
        console.log($('.preco-produto')[key]);
        value += parseInt($('.preco-produto')[key].innerText.split('$')[1]);
    } else {
        return;
    }
});

$('#valor-total').text('Total: R$' + value.toFixed(2).replace('.', ','));