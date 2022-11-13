const form = document.forms["form"];

form.addEventListener("submit", formSubmit);

async function formSubmit(){
	const data = serializeForm(form);
	const response = await sendData(data);
	if(response.ok){
		let result = await response.json();
		alert(result.message);
		form.reset();
	} else {
		alert("Код ошибки: " + response.status);
		console.log(data);
	}
}

function serializeForm(formNode){
	return new FormData(form);
}

async function sendData(data){
	return await fetch("send_mail.php", {
		mode: 'no-cors',
		method: "POST",
		body: data,
	});
}