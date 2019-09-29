//Script com funções pada cadastro
document.write(unescape('%3Cscript src="../../JavaScript/Geral/cadastro.js" type="text/javascript"%3E%3C/script%3E'));

//Script com funções gerais (loading)
document.write(unescape('%3Cscript src="../../JavaScript/Geral/geral.js" type="text/javascript"%3E%3C/script%3E'));

//Script para fazer validação de formularios
document.write(unescape('%3Cscript src="../../JavaScript/validate.min.js" type="text/javascript"%3E%3C/script%3E'));

//Script para definir as mensagens padrões da validação
document.write(unescape('%3Cscript src="../../JavaScript/validateMessage.js" type="text/javascript"%3E%3C/script%3E'));


$(document).ready(() => { //Espera o documento html carregar para executar o codigo

    $('form.needs-validation').validate({ //Função pronta para fazer a validação de formularios no front-end
        submitHandler: function (form) { //Define o comportamento do formulario caso ele seja valido
            $(form).trigger("Enviar"); //Aciona o evento enviar que está ligado ao formulario
        },
        onfocusout: function (element) { 
            $(element).valid(); //Define que vai verificar a validação do input ao ele perder o foco
        },
        errorPlacement: function (error, element) { //Configura o elemento que vai ser utilizado para mostrar o erro
            error.addClass("invalid-feedback"); //Acidiona uma classe de erro a esse elemento (bootstrap)
            error.insertAfter(element); //Insere o elemento de erro logo depois do input que aconteceu o erro
        },
        errorClass: "is-invalid", //Define a classe que vai ser colocada no input se o input for invalido
        validClass: "is-valid", //Define a classe que vai ser colocada no input se ele for valido

        rules: { //Define as regras de validação do formulario
            nome: { //No campo com o name 'nome'
                required: true //Define que ele é obrigatorio
            },
            especialidade: { //no campo com o name 'especialidade'
                required: true //Define como obrigatorio
            },
            email: { //^ name 'email'
                required: true //^
            },
            lattes: { //^ name 'lattes'
                required: true //^
            }
        }
    });

    let controller = { //Criação do objeto necessario para a efetuação do cadastro
        controller: "../../Controllers/docenteController.php", //Define o local do controller e o controller para onde será enviado o formulario
        metodo: "metodoDocente", //qual o tipo de metodo (metodo seguido do nome do controller)
        valor: "Cadastrar" //Nome do metodo que irá executar
    };

    EfetuarCadastro(controller);
});