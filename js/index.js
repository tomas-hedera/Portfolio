$('#kontakt [name]').on("input", (udalost) =>{
	const input = udalost.currentTarget;
	const nazevInputu = input.getAttribute("name");
	const hodnotaInputu = input.value;
	console.log(hodnotaInputu);

	let ok = true

	if(nazevInputu == "jmeno")
	{
		//validace jmena
		if(hodnotaInputu.length < 3)
		{
			ok = false;
		};

	}
	else if (nazevInputu == "email")
	{
		if(hodnotaInputu.match(/.+@.+\..+/) == null)
		{
			ok = false;
		}
	}
	else if(nazevInputu == "predmet")
	{
		if(hodnotaInputu.length < 3)
		{
			ok = false;
		}
	}
	else if (nazevInputu == "zprava")
	{
		if(hodnotaInputu.length < 3)
		{
			ok = false;
		}
	}

	// zvizualizujeme vysledek validace

	const statusElement = document.querySelector(`#kontakt [name=${nazevInputu}]~.status`);
	//console.log(statusElement);
	if(ok)
	{
		statusElement.className = "status ok";
	}
	else
	{
		statusElement.className = "status chyba";
	}	
});

const nahoru = document.querySelector("#nahoru");
nahoru.addEventListener("click",(udalost) =>{
	window.scrollTo({
		left: 0, 
		top: 0,
		behavior: 'smooth'
	});
});

const header = document.querySelector("header");
window.addEventListener("scroll", (udalost) => {
	const poziceHeaderu = header.getBoundingClientRect();
	if(window.scrollY > poziceHeaderu.bottom)
		{
			nahoru.classList.add("zobrazit");
		}
		else
		{
			nahoru.classList.remove("zobrazit");
		}
});