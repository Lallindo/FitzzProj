function mostrarFormaPagamento(tipo) {
    const formaPagamento = document.getElementById('forma-pagamento');

    formaPagamento.innerHTML = '';
    formaPagamento.style.display = 'block';

    if (tipo === 'pix') {
        formaPagamento.innerHTML = `
            <br>
            <h3>Pagamento via Pix</h3>
            <p>Escaneie o QR Code abaixo ou copie o código para realizar o pagamento:</p>
            <img src="/imagens/QRCode.png" width = 200px height = 200px alt="QR Code Pix"> <br>
            <br>
            <p><strong>Código:</strong> 12345678900000001234567890</p>
            <button type="button" onclick="finalizarCompra()"><a href="compra_confirmada.html">Finalizar Compra</a></button>
        `;
    } else if (tipo === 'boleto') {
        formaPagamento.innerHTML = `
            <br>
            <h3>Pagamento via Boleto</h3>
            <p>O boleto foi gerado. Use o código abaixo para pagamento:</p>
            <p><strong>Código:</strong> 84670000001743590024020902405000243584221010811</p>
            <button type="button" onclick="finalizarCompra()"><a href="compra_confirmada.html">Finalizar Compra</a></button>
        `;
    } else if (tipo === 'cartao') {
        formaPagamento.innerHTML = `
            <br>
            <h3>Pagamento via Cartão</h3>
            <form class="form-cartao">
                <label for="nome-cartao">Nome no Cartão:</label>
                <input type="text" id="nome-cartao" placeholder="Digite o nome completo"> <br>
                <br>
                <label for="numero-cartao">Número do Cartão:</label>
                <input type="text" id="numero-cartao" placeholder="0000 0000 0000 0000" maxlength="19"> <br>
                <br>
                <label for="validade-cartao">Validade:</label>
                <input type="text" id="validade-cartao" placeholder="MM/AA" maxlength="5"> <br>
                <br>
                <label for="cvv-cartao">CVV:</label>
                <input type="text" id="cvv-cartao" placeholder="000" maxlength="3"> <br>
                <br>
                <button type="button" onclick="finalizarCompra()"><a href="compra_confirmada.html">Finalizar Compra</a></button>
            </form>
        `;
    }
}

function finalizarCompra() {
    alert('Compra finalizada com sucesso!');
}
