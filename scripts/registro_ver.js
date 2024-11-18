// Formatação do CEP

// Estrutura do CEP:
// xx.xxx-xxx

$('#cep').on("keypress", function () {
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

// Chamado da API 
$('#cep').blur(function () {
    console.log(this.value.length); 
    console.log($('#erCep').value)
    if (this.value.length < 10) {
        // Se o CEP não tiver todos os dígitos retorna um erro
        $('#erCep').text('Erro! Verifique se o CEP inserido está correto.');
        $('#erCep').removeClass('hidden');
    } else {
        // Se o CEP tiver dígitos o suficiente chama a API
        $('#erCep').hasClass('hidden') ? null : $('#erCep').addClass('hidden');
        $.ajax({
            url: `https://viacep.com.br/ws/${this.value.replace('.', '').replace('-', '')}/json/`,
            method: 'GET',
            success: function (response) {
                if (response['erro']) {
                    $('#erCep').hasClass('hidden') ? $('#erCep').removeClass('hidden') : null;
                    $('#erCep').text('Erro! CEP não foi encontrado.');
                    // Tirar os inputs do READONLY
                } else {
                    console.log(response);
                    addressData(response);
                } 
            }
        })
    }
})
// --- --- ---

// Adiciona os valores trazidos pela API aos inputs do formulário
function addressData(response) {
    $('#logr').val(response['logradouro']);
    $('#bairro').val(response['bairro']);
    $('#cid').val(response['localidade']);
    $('#est').val(response['uf']);
}

// --- --- ---


// Formatação do CPF

// Estrutura do CPF:
// xxx.xxx.xxx-xx

$('#cpf').on("keyup", function () {
    formatCPF(this);
    if (this.value.length === 14) {
        if (verifyCPF(this.value)) {
            $('#erCpf').addClass('hidden');
        } else {
            $('#erCpf').removeClass('hidden');
        }
    }
})

function formatCPF(cpf) {
    // console.log(cpf.value.length);
    if (cpf.value.length === 3 || cpf.value.length === 7) {
        cpf.value += '.';
    } else if (cpf.value.length === 11) {
        cpf.value += '-';
    }
}

function verifyCPF(cpf) {
    // Algoritmo feito baseado nos dados apresentados em:
    // https://www.macoratti.net/alg_cpf.htm


    let arrCpf = cpf.replace('.', '').replace('.', '').replace('-', '').split('');
    console.log(arrCpf);
    let sumCpf = 0;
    let priDig = 0;
    let segDig = 0;
    for (i = 0; i <= 8; i++) {
        sumCpf += arrCpf[i] * (10 - i);
    }

    (sumCpf % 11 < 2) ? priDig = 0: priDig = (11 - sumCpf % 11)
    console.log(priDig);

    sumCpf = 0;

    for (i = 0; i <= 9; i++) {
        sumCpf += arrCpf[i] * (11 - i);
    }

    (sumCpf % 11 < 2) ? segDig = 0: segDig = (11 - sumCpf % 11)
    console.log(segDig);

    console.log(cpf[cpf.length - 2], cpf[cpf.length - 1]);
    console.log(priDig, segDig);
    if (priDig == cpf[cpf.length - 2] && segDig == cpf[cpf.length - 1]) {
        return true
    } else {
        return false
    }
}

// --- --- ---

// Verificação da senha

$('#senhaRep').blur(function() {
    if ($('#senha').val() != $('#senhaRep').val()) {
        console.log('foi');
        $('#erSenhaRep').hasClass('hidden') ? $('#erSenhaRep').removeClass('hidden') : null;
        $('#erSenhaRep').text('Erro! Senhas não são iguais.');
    } else {
        $('#erSenhaRep').hasClass('hidden') ? null : $('#erSenhaRep').addClass('hidden');
        console.log('certas');
    }
})