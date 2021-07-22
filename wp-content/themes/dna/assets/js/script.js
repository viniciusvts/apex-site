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
        initImoveisSlideChooser();
        initSimulador();
        initWebMaks();
        initFormBuscar();
    }

    /** O evento de carga é disparado quando toda a página é carregada,
     * incluindo todos os recursos dependentes, como folhas de estilo e imagens.
     */
    function load(evt) {
        initTraficSource();
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
    /**
     * Controla qual slide será exibido
     */
    function initImoveisSlideChooser(){
        var filtros = querySelectorAll('.cat-list li');
        var slides = querySelectorAll('.carImoSlide');
        if((filtros.length < 1) || (slides.length < 1)) return console.log('Não foi encontrado filtro');
        filtros.forEach((item)=>{
            item.addEventListener('click', (evt)=>{
                var dataTarget = evt.target.dataset.target;
                // faço um for nos slides para procurar o id correto
                slides.forEach((item)=>{
                    if(item.id == dataTarget) item.classList.add('active');
                    else item.classList.remove('active');
                });
            });
        });
    }
    /**
     * Inicia a aquisição de dados de rastreio
     * melhor lançar em load para esperar rd preencher __trf
     */
    function initTraficSource(){
        // inicia todos os traffic_source
        var traffic_source = querySelectorAll('[name="traffic_source"]');
        traffic_source.forEach((item)=>{
            item.value = getUriParam('utm_source') ? getUriParam('utm_source') : getCookie('__trf.src');
        });
        // inicia todos os traffic_medium
        var traffic_medium = querySelectorAll('[name="traffic_medium"]');
        traffic_medium.forEach((item)=>{
            item.value = getUriParam('utm_medium');
        });
        // inicia todos os traffic_campaign
        var traffic_campaign = querySelectorAll('[name="traffic_campaign"]');
        traffic_campaign.forEach((item)=>{
            item.value = getUriParam('utm_campaign');
        });
        // inicia todos os traffic_value
        var traffic_value = querySelectorAll('[name="traffic_value"]');
        traffic_value.forEach((item)=>{
            item.value = getUriParam('utm_term');
        });
    }
    /**
     * Inicia o simulador
     */
    function initSimulador(){
        var pagination = querySelectorAll('#simulador .page-numbers li');
        var pages = querySelectorAll('#simulador form fieldset');
        var buttonPrev = querySelector('#simulador .prev');
        var buttonNext = querySelector('#simulador .next');
        // tenho todos os componentes?
        if(pagination.length == 0) return console.warn('paginação não encontrada');
        if(pages.length == 0) return console.warn('páginas não encontradas');
        if(!buttonPrev) return console.warn('botão prev não encontrado');
        if(!buttonNext) return console.warn('botão next não encontrado');
        // tudo certo? então inicia o negócio
        var pageAtual = 1;
        buttonPrev.addEventListener('click', ()=>{
            pageAtual -= 1;
            setSimuladorPage(pageAtual);
        });
        buttonNext.addEventListener('click', ()=>{
            if(!isFormPageValid(pageAtual)) return;
            pageAtual += 1;
            setSimuladorPage(pageAtual);
        });
    }
    /**
     * Verifica se os campos da página atual estão válidos
     * @param {String|Number} pageAtual página atual do simulador
     */
    function isFormPageValid(pageAtual){
        if(pageAtual == 1 ){
            if( querySelector("#cidade").value == ""){
                alert("Selecione uma cidade");
                return false;
            }
        }else if( pageAtual == 2 ){
            if( querySelector("#nome").value == ""){
                alert("Digite um nome");
                return false;
            }
            if(!isEmail( querySelector("#email").value)){
                alert("Email inválido");
                return false;
            }
        }else if(pageAtual == 3){
            if( querySelector("#renda").value == ""){
                alert("Digite sua renda");
                return false;
            }
            if( querySelector("#entrada").value == ""){
                alert("Digite o valor da entrada");
                return false;
            }
        }else if(pageAtual == 4){
            var tel = querySelector("#tel").value;
            if( tel == "" || tel.length < 14){
                alert("Digite um telefone válido");
                return false;
            }
        }else if( pageAtual == 5){
            querySelector('#simulador form').submit();
        }
        return true;
    }
    /**
     * Verifica se a string passada é email
     * @param {String} value string a ser validada como email
     * @returns {boolean} true se é email
     * @author https://www.devmedia.com.br/validando-e-mail-em-inputs-html-com-javascript/26427
     */
    function isEmail(value) {
        usuario = value.substring(0, value.indexOf("@"));
        dominio = value.substring(value.indexOf("@")+ 1, value.length);
            
        if ((usuario.length >=1) &&
                (dominio.length >=3) && 
                (usuario.search("@")==-1) && 
                (dominio.search("@")==-1) &&
                (usuario.search(" ")==-1) && 
                (dominio.search(" ")==-1) &&
                (dominio.search(".")!=-1) &&      
                (dominio.indexOf(".") >=1)&& 
                (dominio.lastIndexOf(".") < dominio.length - 1)) {
            return true;
        }else{
            return false;
        }
    }
    /**
     * Exibe a página e a páginação no simulador
     * @param {String|Number} pageAtual página atual do simulador
     */
    function setSimuladorPage(pageAtual){
        var pagination = querySelectorAll('#simulador .page-numbers li');
        var pages = querySelectorAll('#simulador form fieldset');
        var buttonPrev = querySelector('#simulador .prev');
        var buttonNext = querySelector('#simulador .next');
        //  exibir paginação correta
        pagination.forEach((item)=>{
            if(item.dataset.page == pageAtual){
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });
        // exibir fieldset correto
        pages.forEach((item)=>{
            if(item.dataset.page == pageAtual){
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });
        // se page igual a um, não exibe prev
        if(pageAtual == 1){
            buttonPrev.classList.remove('active');
        } else {
            buttonPrev.classList.add('active');
        }
        // dependendo da página o botão next exibe um texto diferente
        if(pageAtual == 5){
            buttonNext.innerText = 'Enviar';
        } else {
            buttonNext.innerText = 'Próximo';
        }
    }
    function initWebMaks(){
        var tels = querySelectorAll('.telMask');
        tels.forEach((item)=>{
            item.addEventListener('keyup',execMascaraTel);
        });
        var dinheiros = querySelectorAll('.dinMask');
        dinheiros.forEach((item)=>{
            item.addEventListener('keyup',execMascaraDinheiroBR);
        });
    }
    /**
     * Mascara de Telefone para ser usada em inputs html
     * @param {KeyboardEvent} evt - O evento será entregue aqui
     * @example <caption>Executa a mascara quando evento keyup é lançado.</caption>
     * document.querySelector('#phone').addEventListener('keyup',execMascaraTel);
     * @author Vinicius de Santana <vinicius.vts@gmail.com>
     * @license CC BY-NC
     */
    function execMascaraTel (evt) {
        let v = evt.target.value;
        v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
        v=v.replace(/^(\d{11})(\d*)/g,"$1"); // remove o excedente de 11 digitos
        v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
        v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca - depois dos 4 digitos após ()
        evt.target.value = v;
    }
    /**
     * Máscara dinheiro para ser usada em inputs html
     * @param {KeyboardEvent} evt - O evento será entregue aqui
     * @example <caption>Executa a mascara quando evento keyup é lançado.</caption>
     * document.querySelector('#dinheiro').addEventListener('keyup',execMascaraDinheiroBR);
     * @author Vinicius de Santana <vinicius.vts@gmail.com>
     * @license CC BY-NC
     */
    function execMascaraDinheiroBR(evt){
        let v = evt.target.value;
        v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
        v=v.replace(/(\d+)(\d{2})/g,"R$ $1,$2"); //R$ (grupo1),(grupo2)
        evt.target.value = v;
    }
    /** https://www.w3schools.com/js/js_cookies.asp */
    function getCookie(cname) {
        let name = `${cname}=`;
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(";");
        for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === " ") {
            c = c.substring(1);
        }
        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }
        }
        return "";
    }
    
    /**
    * Pega parametros passados pela uri
    * @param {String} param - parâmetro que se quer pegar
    * @author Vinicius de Santana
    */
    function getUriParam(param) {
        var params = window.location.search.substr(1).split('&');
        for (var i = 0; i < params.length; i++) {
            var par = params[i].split('=');
            if (par[0] == param) {
                return decodeURIComponent(par[1]);
            }
        }
        return '';
    }
    /**
     * Buscar por todos os itemcom data-target="form-buscar"
     * E insere o evento para abrir a busca
     */
    function initFormBuscar(){
        var divsBuscar = querySelectorAll('[data-target="form-buscar"]');
        var formBuscar = querySelector('#form-buscar');
        if(divsBuscar.length == 0) return console.warn('Não há itens para buscar nesta página');
        if(!formBuscar) return console.warn('Não foi encontrado o form de busca');
        // adiciona evento para exibir o formulário de busca
        divsBuscar.forEach((item)=>{
            item.addEventListener('click', ()=>{
                formBuscar.classList.add('active');
            });
        });
        // adiciona o evento para esconder o form de busca
        formBuscar.addEventListener('click', (evt)=>{
            if(evt.target == formBuscar) return formBuscar.classList.remove('active');
        });
    }
})(window, document, console, x=>document.querySelector(x), x=>document.querySelectorAll(x));