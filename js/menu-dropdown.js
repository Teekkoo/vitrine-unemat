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





function dropToggle(elClass) {
    let vetor = ['submenu-drop-1', 'submenu-drop-2', 'submenu-drop-3', 'submenu-drop-4', 'submenu-drop-5'];
    for (let i = 0; i < vetor.length; i++) {
        let close = document.getElementById(vetor[i]);
        if (!close.classList.contains("d-none")) {
            close.classList.add("d-none");
            close.classList.remove("d-block");
        };

    }
    if (elClass != "") {
        let el = document.getElementById(elClass);
        if (el.classList.contains("d-none")) {
            el.classList.remove("d-none");
            el.classList.add("d-block");

        } else {
            el.classList.remove("d-block");
            el.classList.add("d-none");
        }
    }
}

addClickMap('menu-drop-1', 'submenu-drop-1');
addClickMap('menu-drop-2', 'submenu-drop-2');
addClickMap('menu-drop-3', 'submenu-drop-3');
addClickMap('menu-drop-4', 'submenu-drop-4');
addClickMap('menu-drop-5', 'submenu-drop-5');

function addClickMap(elClass, elClassOp) {
    let el = document.getElementById(elClass);
    el.addEventListener('click', () => {
        dropToggle(elClassOp);
    });
}
