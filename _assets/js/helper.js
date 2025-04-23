let x = document.querySelectorAll(".rp");
for (let i = 0, len = x.length; i < len; i++) {
	let num = Number(x[i].innerHTML).toLocaleString("id");
	x[i].innerHTML = num;
	x[i].classList.add("currSign");
}
