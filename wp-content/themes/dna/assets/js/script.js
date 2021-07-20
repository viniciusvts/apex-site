/*!Vinicius de Santana*/
//https://javascript-minifier.com/
//https://skalman.github.io/UglifyJS-online/
(function ssw(window, document, console, querySelector, querySelectorAll) {
    // nav menu
    document.addEventListener("DOMContentLoaded", DOMContentLoaded);
    window.addEventListener("load", load);
    /** O evento DOMContentLoaded é acionado quando todo o HTML foi
     * completamente carregado e analisado, sem aguardar pelo CSS, imagens,
     * e subframes para encerrar o carregamento.
     */
    function DOMContentLoaded(evt) {
        initMenuControl();
        addBgInMenuOnScroll();
    }

    /** O evento de carga é disparado quando toda a página é carregada,
     * incluindo todos os recursos dependentes, como folhas de estilo e imagens.
     */
    function load(evt) {
        console.log('load event', evt);
    }
    /**
     * inicia o controle de menu
     * @author Vinicius de Santana
     */
    function initMenuControl() {
        querySelector('#hambmenu').addEventListener('click', ()=>{
            /** @type HTMLElement */
            var mainMenu = querySelector('#top-menu');
            // se existe a classe active a remove
            // se não adiciona
            if(mainMenu.classList.contains('active'))
                mainMenu.classList.remove('active');
            else
                mainMenu.classList.add('active');
        });
    }
    /**
     * adiciona uma classe ao menu quando o usuário scrolla
     */
    function addBgInMenuOnScroll(){
        window.onscroll = function() {
            var mainMenu = querySelector('#top-menu');
            if (this.scrollY > 500) {
                mainMenu.classList.add('lightbg');
            } else {
                mainMenu.classList.remove('lightbg');
            }
        }
    }
})(window, document, console, x=>document.querySelector(x), x=>document.querySelectorAll(x));