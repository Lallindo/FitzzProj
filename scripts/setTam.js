const valorInp = $('#inpId').val(); // Id do produto

let pedidoValues = [valorInp, null, null, null]; //  [id_produto, cor_espec, tam_espec, quant_espec];

let json = [];
let jsonObj = {
    // PP  P  M  G  GG
    0: [0, 0, 0, 0, 0],
    1: [0, 0, 0, 0, 0],
    2: [0, 0, 0, 0, 0],
    3: [0, 0, 0, 0, 0]
};

let btnArr = [
    $('#PP'), $('#P'), $('#M'), $('#G'), $('#GG')
];

$.ajax({
    type: "POST",
    url: `ajaxCores.php?id_prod=${valorInp}`,
    // Async falso torna possível trazer o valor para fora do ajax
    async: false,
    data: "data",
    dataType: "json",
    success: function (response) {
        json = response;
    }
});
json.forEach((x) => {
    jsonObj[x['cor_espec']][x['tamanho_espec']] = x['quantidade_espec'];
})

$('.btnCor').click(function(e) {
    pedidoValues[1] = e['target'].value;
    pedidoValues[2] = null; 
    jsonObj[e['target'].value].forEach((x, index) => {
        if (x < $('#quantCompra').val()) {
            btnArr[index][0].disabled = true;
        } else {
            btnArr[index][0].disabled = false;
        }
    })
})

$('.btnTam').click(function(e) {
    pedidoValues[2] = e['target'].value;
})

$('#btnCart').click(function(e) {
    pedidoValues[3] = $('#quantCompra').val();
    if (pedidoValues[2] == null) {
        alert('SELECIONE UM TAMANHO');
    } else {
        window.location.href = `add_carrinho.php?id_prod=${pedidoValues[0]}&cor_espec=${pedidoValues[1]}&tam_espec=${pedidoValues[2]}&quant_espec=${pedidoValues[3]}`;
    }
})