$('.remover-item').click(function(e) {
    window.location.href = `del_carrinho.php?id_ped=${e['target'].value}`;
})