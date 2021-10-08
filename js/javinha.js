
/* Eventos  */

const menu_open = document.querySelector("#menu-open")
menu_open.addEventListener('click', function (e) {
    animacao_menu();
});

const menu_close = document.querySelector("#menu-chose")
menu_close.addEventListener('click', function (e) {
    animacao_menu();
});

/* Funções */
const menu_content = document.querySelector(".nav-conteudo-mobile");

function animacao_menu() {

    if (menu_content.classList.contains("entrada")) {
        menu_content.classList.remove("entrada");
        menu_content.classList.add("saida");
    } else {
        menu_content.classList.add("entrada");
        menu_content.classList.remove("saida");
    };
}
/* new */

//funções
function animacaoHeader() {
    const elemento = document.querySelector("#header");

    function trocaCor() {
        elemento.classList.remove('transparente');
        elemento.classList.add('ativo');
    }
    function trocaCor1() {
        elemento.classList.remove('ativo');
        elemento.classList.add('transparente');
    }

    // eventos
    window.addEventListener('scroll', function () {
        if (elemento == null) {
        } else {
            var windowTop = window.pageYOffset;
            if (windowTop > 20) {
                trocaCor();
            } else {
                trocaCor1();
            }
        }
    });
}
animacaoHeader()


/* new window.VLibras.Widget('https://vlibras.gov.br/app'); */


function initAnimacaoScroll() {

    const sections = document.querySelectorAll('.js-scroll');
    if (sections.length) {
        const windowMetade = window.innerHeight * 0.7;
        function animaScroll() {
            sections.forEach((section) => {
                const sectionTop = section.getBoundingClientRect().top; //estou pegando a distancia que o meu elemento esta do top
                const isSectionVisible = (sectionTop - windowMetade) < 0;
                if (isSectionVisible) {
                    section.classList.add('js-ativo')
                } else {
                    section.classList.remove('js-ativo')
                }
            })
        }
        animaScroll();
        window.addEventListener('scroll', animaScroll);
    }
}
initAnimacaoScroll();

function numeroWhats() {
    /*add o numero que recebera a mensagem*/
    const numero = 5511976437780;

    const whats = document.querySelectorAll('#enviaZap');

    if (whats) {
        function whatsClick(index) {
            nome = document.querySelectorAll('#nome');
            if (nome[index].value) {
                nome = nome[index].value;
            } else {
                alert('Por favor preencha o campo "Seu nome"');
                nome = false;
            };
            email = document.querySelectorAll('#email')
            if (email[index].value) {
                email = email[index].value;
            } else {
                alert('Por favor preencha o campo "Seu e-mail"');
                email = false;
            };
            if ((nome != false) & (email != false)) {
                var feito = window.encodeURIComponent("Meu nome é: " + nome + "\nE-mail: " + email + "\nVim pelo site e gostaria de saber mais sobre os serviços da *inov*.");

                console.log('aqui foi');
                return feito;
            } else {
                return '';
            };
        };
        whats.forEach((botao, index) => {
            botao.addEventListener('click', () => {
                const resultado = whatsClick(index);
                if (resultado) {
                    window.open("https://web.whatsapp.com/send?phone=" + numero + "&text=" + resultado);
                };
            });
        });
    };
};
numeroWhats();

function vLibras() {
    new window.VLibras.Widget('https://vlibras.gov.br/app');
}
vLibras();
