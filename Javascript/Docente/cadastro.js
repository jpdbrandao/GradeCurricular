//Script com funções pada cadastro
document.write(unescape('%3Cscript src="../../JavaScript/Geral/cadastro.js" type="text/javascript"%3E%3C/script%3E'));

//Script com funções gerais (loading)
document.write(unescape('%3Cscript src="../../JavaScript/Geral/geral.js" type="text/javascript"%3E%3C/script%3E'));

//Script para fazer validação de formularios
document.write(unescape('%3Cscript src="../../JavaScript/validate.min.js" type="text/javascript"%3E%3C/script%3E'));

//Script para definir as mensagens padrões da validação
document.write(unescape('%3Cscript src="../../JavaScript/validateMessage.js" type="text/javascript"%3E%3C/script%3E'));


$(document).ready(() => {
    
    $('form.needs-validation').validate({
        submitHandler: function (form) {
            $(form).trigger("Enviar");
        },
        onfocusout: function (element) {
            $(element).valid();
        },
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            error.insertAfter(element);
        },
        errorClass: "is-invalid",
        validClass: "is-valid",

        rules: {
            nome: {
                required: true
            },
            especialidade: {
                required: true
            },
            email: {
                required: true
            },
            lattes: {
                required: true
            }
        }
    });

    let controller = {
        controller: "../../Controllers/docenteController.php", //Url para o controller
        metodo: "metodoDocente", //qual o tipo de metodo (metodo seguido do nome do controller)
        valor: "Cadastrar" //Nome do metodo que irá executar
    };
    
    EfetuarCadastro(controller);
});