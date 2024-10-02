<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $servico = trim($_POST['servico']);
    $mensagem = trim($_POST['mensagem']);

    // Verifica se todos os campos foram preenchidos
    if (empty($nome) || empty($email) || empty($servico) || empty($mensagem)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        // Defina o destinatário do e-mail (pode ser seu e-mail corporativo)
        $para = "luisgustavooliveira242@gmail.com";

        // Assunto do e-mail
        $assunto = "Novo Pedido de Orçamento";

        // Conteúdo do e-mail
        $conteudo = "Nome: $nome\n";
        $conteudo .= "Email: $email\n";
        $conteudo .= "Serviço: $servico\n";
        $conteudo .= "Mensagem: $mensagem\n";

        // Cabeçalhos do e-mail
        $cabecalhos = "From: $email\r\n";
        $cabecalhos .= "Reply-To: $email\r\n";

        // Envia o e-mail
        if (mail($para, $assunto, $conteudo, $cabecalhos)) {
            echo "Orçamento solicitado com sucesso! Entraremos em contato em breve.";
        } else {
            echo "Ocorreu um erro ao enviar seu pedido. Tente novamente.";
        }
    }
}
?>
