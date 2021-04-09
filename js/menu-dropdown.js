class menuMobile {
	dn = "d-none";
	db = "d-block";
	ni = "navbar-item";
	subMenuItensToReset = [];
	constructor() {
		this.submenuElementsFilter(this.findContainer(".opcao-list"));
	}
	findContainer(selector) {
		return document.querySelector(selector);
	}
	submenuElementsFilter(el) {
		let items = el.getElementsByClassName(this.ni);
		for (let c = 0; c < items.length; c++) {
			this.submenuItemsFilter(el.getElementsByClassName(this.ni)[c]);
		}
	}
	submenuItemsFilter(it) {
		let a = it.getElementsByTagName("a")[0];
		let ul = it.getElementsByTagName("ul")[0];
		if (ul != undefined && a != undefined) {
			this.addInteraction(a, ul);
			this.subMenuItensToReset.push(ul);
		}
	}
	addInteraction(a, ul) {
		a.addEventListener("click", () => {
			this.submenuOpen(ul);
		});
	}
	subMenuItensReset() {
		let quant = this.subMenuItensToReset.length;
		for (let x = 0; x < quant; x++) {
			let it = this.subMenuItensToReset[x];
			if (it.classList.contains(this.db)) {
				it.classList.remove(this.db);
				it.classList.add(this.dn);
			}
		}
	}
	submenuOpen(ul) {
		this.subMenuItensReset();
		if (ul.classList.contains(this.dn)) {
			ul.classList.remove(this.dn);
			ul.classList.add(this.db);
		} else {
			ul.classList.remove(this.db);
			ul.classList.add(this.dn);
		}
	}
}
new menuMobile();
function menu() {
	open = document.getElementById("open");
	close = document.getElementById("close");
	if (close.classList.contains("d-none")) {
		close.classList.remove("d-none");
		close.classList.add("d-flex");
		open.classList.add("d-none");
		close.style.animationName = "abre-menu-drop";
		close.style.animationDuration = ".5s";
		setTimeout(() => {
			close.style.animationName = "";
		}, 500);
	} else {
		open.classList.remove("d-none");
		close.style.animationName = "fecha-menu-drop";
		close.style.animationDuration = ".5s";
		setTimeout(() => {
			close.style.animationName = "";
			close.classList.add("d-none");
			close.classList.remove("d-flex");
		}, 500);
	}
}