$('.btn-warning').click(function(e) {
        let id = e['target'].id.split('-')[2];
        let value = $(`#inp-tel-${id}`).val();
        if (value.length === 11) {
                window.location.href = `alterar_tel.php?id=${id}&value=${value}`;
        } else {
                alert('Número inválido');
        }
        console.log(value);
})

$('.btn-danger').click(function(e) {
        let id = e['target'].id.split('-')[2];
        window.location.href = `remover_tel.php?id=${id}`;
});