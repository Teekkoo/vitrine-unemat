

var element = document.getElementById('pesquisa');
if (element.addEventListener) {
    element.addEventListener("submit", function(evt) {
        evt.preventDefault();
    
    }, true);
}
else {
    element.attachEvent('onsubmit', function(evt){
        evt.preventDefault();
       
    });
}



function FuncPesquisaAtv(elClass, elClassOp, elClass1) {
    open = document.getElementById(elClass);
    pesq = document.getElementById(elClassOp);
    close = document.getElementById(elClass1);
    if(pesq.classList.contains('d-none')){
        open.classList.add('d-none');
        pesq.classList.remove('d-none');
        pesq.style.animationName = "aparecer";
        pesq.style.animationDuration = '.5s';
        setTimeout(() => {
            pesq.style.animationName = "";

        },500);
    }else{
        pesq.style.animationName = "sumir";
        pesq.style.animationDuration = '.6s';
        setTimeout(() => {
            pesq.style.animationName = "";
            pesq.classList.add('d-none');
            open.classList.remove('d-none');

        },200); 
    }
    
}

opensearch('pesquisa-img', 'form-pesq','pesquisa');
opensearch('pesquisa-servico-img', 'form-pesq-servico','pesquisa-servico');
opensearch('pesquisa-produto-img', 'form-pesq-produto','pesquisa-produto');

function opensearch(elClass, elClassOp, elClass1) {
    let el = document.getElementById(elClass);
    if(el!=undefined){
    el.addEventListener('click', () => {
        FuncPesquisaAtv(elClass, elClassOp);

    });
    let al = document.getElementById(elClass1);
    al.addEventListener('click', () => {
        FuncPesquisaAtv(elClass, elClassOp);
        dropLoad(elClassOp);
    });
}
}

function faztroca(urlA, urlN, idbrasao){
    img = document.getElementById(idbrasao);
    let valor = document.getElementById('trocaId').value;
    img.src = valor+urlN;
    img.addEventListener('mouseout',() => {
       img.src = valor+urlA;
     });
}

trocaImage('/img/brasao-unemat.svg','/img/brasao-unemat-colorido.svg','brasao');
trocaImage('/img/brasao-unemat.svg','/img/brasao-unemat-colorido.svg','brasaoFooter');
trocaImage('/img/RiscLogobranca.svg','/img/RiscLogoFUNDOBRANCO.svg','brasaoRisc');


function trocaImage(urlA, urlN, idbrasao){
    img = document.getElementById(idbrasao);
    console.log(img);
    img.addEventListener('mouseover', () =>{
        faztroca(urlA, urlN, idbrasao);
    });
    
}


function menu() {
   console.log('aa');
   open = document.getElementById('open');
   close = document.getElementById('close');

   if (close.classList.contains('d-none')) {
       close.classList.remove('d-none');
       close.classList.add('d-flex');
       open.classList.add('d-none');
       close.style.animationName = "abre-menu-drop";
       close.style.animationDuration = '.5s';
       setTimeout(() => {
           close.style.animationName = "";

       }, 500);
   } else {
       open.classList.remove('d-none');
       close.style.animationName = "fecha-menu-drop";
       close.style.animationDuration = '.5s';
       setTimeout(() => {
           close.style.animationName = "";
           close.classList.add('d-none');
           close.classList.remove('d-flex');
           dropToggle("");
       }, 500);
   }
}

