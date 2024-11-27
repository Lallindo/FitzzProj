// Botões para mudar os telefones

let newTelAdd = false;
let newEndAdd = false;

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

// Botões para mudar os endereços

$('.alt-end').click(function (e) {
        let id = e['target'].id.split('-')[2];
        let ruaEnd = $(`#rua-end-${id}`).val();
        let bairroEnd = $(`#bairro-end-${id}`).val();
        let cepEnd = $(`#cep-end-${id}`).val().replace('.', '').replace('-', '');

        if (cepEnd.length < 8) {
                alert('CEP inválido');
        } else {
                window.location.href = `alterar_end.php?
                id=${id}&
                rua=${ruaEnd}&
                bairro=${bairroEnd}&
                cep=${cepEnd}`;
        };
})

$('.rem-end').click(function (e) {
        let id = e['target'].id.split('-')[2];
        window.location.href = `remover_end.php?id=${id}`;
})

$('.add-end').click(function (e) {
        if (!newEndAdd) {
                newEndAdd = true;
                let id = $('.add-end').length;
                $(`#tr-end-${id-1}`).after(
                        `<tr id='tr-${id}'>
                            <td><input id='inp-rua-new' type='text' class='form-control'></td>
                            <td><input id='inp-bairro-new' type='text' class='form-control'></td>
                            <td><input id='inp-cep-new' type='text' class='form-control'></td>
                            <td>    
                            <button class='btn btn-success btn-sm add-end add-end-new'>Adicionar</button>
                            </td>
                            </tr>`
                        );
                            // O botão dentro de TD irá chamar o PHP    
        }
})

$('body').on('click', '.add-end-new', function (e) {
        window.location.href = `adicionar_end.php?
        rua=${$('#inp-rua-new').val()}&
        bairro=${$('#inp-bairro-new').val()}&
        cep=${$('#inp-cep-new').val().replace('-','').replace('.', '')}`;
})

$('body').on("keypress", '#inp-cep-new', function () {
        formatCEP(this);
    });
    
    function formatCEP(cep) {
        // console.log(cep.value.length);
        if (cep.value.length === 2) {
            cep.value += '.';
        } else if (cep.value.length === 6) {
            cep.value += '-';
        } else if (cep.value.length === 10) {
            cep.value += '';
        }
    }