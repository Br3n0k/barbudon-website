// JS para o login
document.addEventListener('DOMContentLoaded', function() {
    let form = document.querySelector('form');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Impede o envio padrão do formulário

        let formData = new FormData(form);

        fetch('', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                email: formData.get('email'),
                password: formData.get('password')
            })
        })
            .then(response => response.json())
            .then(data => {
                console.log(data); // Aqui você pode lidar com a resposta da API
                // Por exemplo, redirecionar para outra página se o login for bem-sucedido
                if (data.success) {
                    window.location.href = 'URL_DA_SUA_PÁGINA_DE_DESTINO';
                } else {
                    alert('Login falhou! Verifique suas credenciais.');
                }
            })
            .catch(error => {
                console.error('Erro ao fazer login:', error);
                alert('Ocorreu um erro ao tentar fazer login.');
            });
    });
});