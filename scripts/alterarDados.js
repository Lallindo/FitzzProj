// Botões para mudar os telefones

let newTelAdd = false;

$('.alt-tel').click(function (e) {
        let id = e['target'].id.split('-')[2];
        let value = $(`#inp-tel-${id}`).val();
        if (value.length === 11) {
                window.location.href = `alterar_tel.php?id=${id}&value=${value}`;
        } else {
                alert('Número inválido');
        }
        console.log(value);
})

$('.rem-tel').click(function (e) {
        let id = e['target'].id.split('-')[2];
        window.location.href = `remover_tel.php?id=${id}`;
});

$('.add-tel').click(function (e) {
        if (!newTelAdd) {
                newTelAdd = true;
                console.log($('.add-tel').length)
                let id = $('.add-tel').length;
                $(`#tr-${id-1}`).after(
                        `<tr id='tr-${id}'>
                            <td>
                                <input id='inp-tel-new' type='tel' maxlength='11'>
                            </td>
                            <td>    
                            <button class='btn btn-success btn-sm add-tel add-tel-new'>Adicionar</button>
                            </td>
                            </tr>`
                        );
                            // O botão dentro de TD irá chamar o PHP
        }
})

// Botões criados dinamicamente precisam usar o 'ON'
$('body').on('click', '.add-tel-new', function (e) {
        // let value = $('')
        window.location.href = `adicionar_tel.php?value=${$('#inp-tel-new').val()}`
})

// Botões para mudar os 