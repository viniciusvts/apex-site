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
        initSimulador('#modal-simulador');
        initSimulador('#simulador');
        initWebMaks();
        initFormBuscar();
        initGaleriaImoveisSingle();
        initModalImg();
        initModalSimulador();
        initObraImoveisValues();
        initModalObraFotos();
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
            const mainMenu = querySelector('#top-menu');
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
     * @author Vinicius de Santana
     */
    function addBgInMenuOnScroll(){
        window.onscroll = function() {
            const mainMenu = querySelector('#top-menu');
            if (this.scrollY > 500) {
                mainMenu.classList.add('lightbg');
            } else {
                mainMenu.classList.remove('lightbg');
            }
        }
    }
    /**
     * Controla qual slide será exibido
     * @author Vinicius de Santana
     */
    function initImoveisSlideChooser(){
        const filtros = querySelectorAll('.cat-list li');
        const slides = querySelectorAll('.carImoSlide');
        if((filtros.length < 1) || (slides.length < 1)) return console.warn('Não foi encontrado filtro');
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
     * @author Vinicius de Santana
     */
    function initTraficSource(){
        // inicia todos os traffic_source
        const traffic_source = querySelectorAll('[name="traffic_source"]');
        traffic_source.forEach((item)=>{
            item.value = getUriParam('utm_source') ? getUriParam('utm_source') : getCookie('__trf.src');
        });
        // inicia todos os traffic_medium
        const traffic_medium = querySelectorAll('[name="traffic_medium"]');
        traffic_medium.forEach((item)=>{
            item.value = getUriParam('utm_medium');
        });
        // inicia todos os traffic_campaign
        const traffic_campaign = querySelectorAll('[name="traffic_campaign"]');
        traffic_campaign.forEach((item)=>{
            item.value = getUriParam('utm_campaign');
        });
        // inicia todos os traffic_value
        const traffic_value = querySelectorAll('[name="traffic_value"]');
        traffic_value.forEach((item)=>{
            item.value = getUriParam('utm_term');
        });
    }
    /**
     * Inicia o simulador
     * @author Vinicius de Santana
     */
    function initSimulador(id){
        const pagination = querySelectorAll(id + ' .page-numbers li');
        const pages = querySelectorAll(id + ' form fieldset');
        const buttonPrev = querySelector(id + ' .prev');
        const buttonNext = querySelector(id + ' .next');
        // tenho todos os componentes?
        if(pagination.length == 0) return console.warn(id + ' paginação não encontrada');
        if(pages.length == 0) return console.warn('páginas não encontradas');
        if(!buttonPrev) return console.warn('botão prev não encontrado');
        if(!buttonNext) return console.warn('botão next não encontrado');
        // tudo certo? então inicia o negócio
        var pageAtual = 1;
        buttonPrev.addEventListener('click', ()=>{
            pageAtual -= 1;
            setSimuladorPage(id, pageAtual);
        });
        buttonNext.addEventListener('click', ()=>{
            if(!isFormPageValid(id, pageAtual) || pageAtual == 5) return;
            pageAtual += 1;
            setSimuladorPage(id, pageAtual);
        });
    }
    /**
     * Verifica se os campos da página atual estão válidos
     * @param {String|Number} pageAtual página atual do simulador
     * @author Vinicius de Santana
     */
    function isFormPageValid(id, pageAtual){
        if(pageAtual == 1 ){
            if( querySelector(id + " #cidade").value == ""){
                alert("Selecione uma cidade");
                return false;
            }
        }else if( pageAtual == 2 ){
            if( querySelector(id + " #nome").value == ""){
                alert("Digite um nome");
                return false;
            }
            if(!isEmail( querySelector(id + " #email").value)){
                alert("Email inválido");
                return false;
            }
        }else if(pageAtual == 3){
            if( querySelector(id + " #renda").value == ""){
                alert("Digite sua renda");
                return false;
            }
            if( querySelector(id + " #entrada").value == ""){
                alert("Digite o valor da entrada");
                return false;
            }
        }else if(pageAtual == 4){
            var tel = querySelector(id + " #tel").value;
            if( tel == "" || tel.length < 14){
                alert("Digite um telefone válido");
                return false;
            }
        }else if( pageAtual == 5){
            querySelector(id + ' form').submit();
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
     * @param {String} id identificador do simulador
     * @param {String|Number} pageAtual página atual do simulador
     * @example setSimuladorPage('#simulador', 1);
     * @author Vinicius de Santana
     */
    function setSimuladorPage(id, pageAtual){
        const pagination = querySelectorAll(id + ' .page-numbers li');
        const pages = querySelectorAll(id + ' form fieldset');
        const buttonPrev = querySelector(id + ' .prev');
        const buttonNext = querySelector(id + ' .next');
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
    /**
     * Inicia todas as web masks
     * @author Vinicius de Santana
     */
    function initWebMaks(){
        const tels = querySelectorAll('.telMask');
        tels.forEach((item)=>{
            item.addEventListener('keyup',execMascaraTel);
        });
        const dinheiros = querySelectorAll('.dinMask');
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
     * @author Vinicius de Santana
     */
    function initFormBuscar(){
        const divsBuscar = querySelectorAll('[data-target="form-buscar"]');
        const formBuscar = querySelector('#form-buscar');
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
    /**
     * Inicia a galeria de imoveis na single
     * @author Vinicius de Santana
     */
    function initGaleriaImoveisSingle(){
        // botões de seleção filtram o conteúdo
        const selection = querySelectorAll('.selection li');
        const allItens = querySelectorAll('.galeria .item');
        if(selection.length == 0) return console.warn('não foi encontrado os seletores');
        if(allItens.length == 0) return console.warn('não foi encontrado os itens');
        // evento nos seletores
        selection.forEach((item)=>{
            item.addEventListener('click', (evt)=>{
                // primeiro removo active de todos os seletores
                selection.forEach((item)=>{
                    item.classList.remove('active');
                });
                // depois adiciono active apenas ao atual
                item.classList.add('active');
                // agora mostro ou escondo dependendo do valor de target
                var target = evt.target.dataset.target;
                allItens.forEach((item) => {
                    if(item.classList.contains(target) || target == 'all'){
                        item.classList.remove('disabled');
                    } else {
                        item.classList.add('disabled');
                    }
                });
            });
        });
    }
    /**
     * Busca todas as imagens com data-modalImg="path/to/img.jpg"
     * e adiciona o evento de click que abrirá o modal
     * o objetivo é mostrar a imagem em tela cheia
     * @author Vinicius de Santana
     */
    function initModalImg(){
        const divsImgs = querySelectorAll('img[data-modalImg]');
        const modalImg = querySelector('#modal-img');
        const internalImg = querySelector('#modal-img img');
        if(divsImgs.length == 0) return console.warn('Não há img para o modal-img');
        if(!modalImg) return console.warn('Foi encontrada img mas não o modal-img, adicione-o a página');
        // adiciona evento para exibir o formulário de busca
        divsImgs.forEach((item)=>{
            item.addEventListener('click', ()=>{
                internalImg.src = item.dataset.modalimg;
                modalImg.classList.add('active');
            });
        });
        // adiciona o evento para esconder o form de busca
        modalImg.addEventListener('click', (evt)=>{
            if(evt.target == modalImg) return modalImg.classList.remove('active');
        });
    }
    function initObraImoveisValues(){
        const estadosDaObraGraphic = querySelectorAll('#estadosDaObra .internal');
        const estadosDaObraText = querySelectorAll('#estadosDaObra p span');
        if(estadosDaObraGraphic.length == 0) return console.warn('Não há gráfico dos estados da obra');
        if(estadosDaObraText.length == 0) return console.warn('Não há texto dos estados da obra');
        // adicionar evento ao scroll
        window.addEventListener('scroll', ()=>{
            // lanço o width no gráfico, css anima
            estadosDaObraGraphic.forEach((elem) => {
                isElementVisibleCompletely(elem) ?
                    elem.style.width = elem.dataset.width :
                    elem.style.width = '0%';
            });
            // animo o texto com uma contagem
            estadosDaObraText.forEach((elem) => {
                if(isElementVisibleCompletely(elem)){
                    // se está contando ou já contou, nada faz
                    if(elem.classList.contains('counting') || 
                        elem.classList.contains('counted')) return;
                    elem.classList.add('counting');
                    elem.dataset.actual = 0;
                    elem.dataset.interval = setInterval(()=>{
                        elem.dataset.actual =  Number(elem.dataset.actual) + 1;
                        if(Number(elem.dataset.actual) > Number(elem.dataset.value)){ // acaba
                            clearInterval(elem.dataset.interval);
                            elem.innerText = elem.dataset.value;
                            elem.classList.remove('counting');
                            elem.classList.add('counted');
                            delete elem.dataset.actual;
                            delete elem.dataset.interval;
                        } else {
                            elem.innerText = elem.dataset.actual;
                        }
                    },10);
                } else { // se não está visível reset
                    if(elem.classList.contains('counted')){
                        elem.innerText = '0';
                        elem.classList.remove('counted');
                    }
                }
            });
        });
    }
    /**
     * Verifica se determinado elemento html está visivel
     * @param {HTMLElement} elem o elemento html para consultar
     * @author Vinicius de Santana
     */
    function isElementVisibleCompletely(elem){
        const domRect = elem.getBoundingClientRect();
        const isVisible = (
            domRect.top >= 0 &&
            domRect.left >= 0 &&
            domRect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            domRect.right <= (window.innerWidth || document.documentElement.clientWidth)
    
        );
        return isVisible;
    }
    /**
     * Inicia o modal do simulador
     * @author Vinicius de Santana
     */
    function initModalSimulador(){
        const divsQueChamamOSimulador = querySelectorAll('[data-modalSimula]');
        const modalSimula = querySelector('#modal-simulador');
        if(divsQueChamamOSimulador.length == 0) return console.warn('Não há div chamando o modal simulador');
        if(!modalSimula) return console.warn('Foi encontrado divs mas não o modal-simulador, adicione-o a página');
        // adiciona evento para exibir o formulário de busca
        divsQueChamamOSimulador.forEach((item)=>{
            item.addEventListener('click', ()=>{
                modalSimula.classList.add('active');
            });
        });
        // adiciona o evento para esconder o form de busca
        modalSimula.addEventListener('click', (evt)=>{
            if(evt.target == modalSimula) return modalSimula.classList.remove('active');
        });
    }
    /**
     * Inicia o modal das fotos da obra
     * @author Vinicius de Santana
     */
    function initModalObraFotos(){
        const divsQueChamamOModal = querySelectorAll('[data-show="modalObraFotos"]');
        const modal = querySelector('#modal-obrafotos');
        if(divsQueChamamOModal.length == 0) return console.warn('Não há div chamando o modal obra fotos');
        if(!modal) return console.warn('Foi encontrado divs mas não o obra fotos, adicione-o a página');
        // adiciona evento para exibir o formulário de busca
        divsQueChamamOModal.forEach((item)=>{
            item.addEventListener('click', ()=>{
                modal.classList.add('active');
            });
        });
        // adiciona o evento para esconder o form de busca
        modal.addEventListener('click', (evt)=>{
            if(evt.target == modal) return modal.classList.remove('active');
        });
    }
})(window, document, console, x=>document.querySelector(x), x=>document.querySelectorAll(x));