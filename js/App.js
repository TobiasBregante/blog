let dest;
if (document.querySelector('.login-title') != null){
	if (document.querySelector('.login-title').classList == 'd-block' || document.querySelector('.login-title').classList == 'login-title'){
		dest = './src/library/login.php';
	}else{
		dest = './src/library/register.php';
	}
	document.querySelector('.register-link-2').addEventListener('click', () =>{
		dest = './src/library/login.php';
	});
	document.querySelector('.register-link').addEventListener('click', () =>{
		dest = './src/library/register.php';
	});	
}
if (document.querySelector('#frm_register_or_login') != null){
	document.querySelector('#frm_register_or_login').addEventListener('submit', (ev) =>{
		let xhr = new XMLHttpRequest();
		const data = document.querySelector('#frm_register_or_login');
		let form = new FormData(data);	
		xhr.open('POST', dest, true);
		xhr.addEventListener('load', () => {
			if (xhr.status === 200) {			
				if (xhr.responseText == 1) {
					document.querySelector('.text-true').classList.remove('d-none');
					document.querySelector('.text-true').classList.add('d-block');
					document.querySelector('.verify-true-1').classList.remove('d-none');
					document.querySelector('.verify-true-1').classList.add('d-block');
					setTimeout(() =>{
						document.querySelector('.verify-true-1').classList.add('d-none');
						document.querySelector('.verify-true-1').classList.remove('d-block');
						document.querySelector('.text-true').classList.remove('d-block');
						document.querySelector('.text-true').classList.add('d-none');
						document.querySelector('input[type="mail"]').value = '';
						document.querySelector('input[type="password"]').value = '';				
					}, 3000);
				}if(xhr.responseText == 0){
					document.querySelector('.text-false').classList.remove('d-none');
					document.querySelector('.verify-false-1').classList.add('d-block');
					document.querySelector('.verify-false-1').classList.remove('d-none');
					document.querySelector('.text-false').classList.add('d-block');
					setTimeout(() =>{
						document.querySelector('.verify-false-1').classList.remove('d-block');
						document.querySelector('.verify-false-1').classList.add('d-none');
							document.querySelector('.text-false').classList.add('d-none');
							document.querySelector('.text-false').classList.remove('d-block');
						document.querySelector('input[type="mail"]').value = '';
						document.querySelector('input[type="password"]').value = '';					
					}, 3000);			
				}if (xhr.responseText == 200){
					window.location = 'public/blog.php';
				}if (xhr.responseText == 400){
					document.querySelector('.text-false-login').classList.add('d-block');
					document.querySelector('.text-false-login').classList.remove('d-none');
					setTimeout(() =>{
						document.querySelector('.text-false-login').classList.remove('d-block');
						document.querySelector('.text-false-login').classList.add('d-none');
					}, 3000);
				}
			}else{
				console.log(`error en la petición: ${xhr.status}`);
			}
		});
		xhr.send(form);
		ev.preventDefault();		
	});
}
if(document.querySelector('.contact') != null){
	let xhr = new XMLHttpRequest();
	xhr.open('POST', '../src/library/contacts.php', true);
	xhr.addEventListener('load', () => {
		if (xhr.status === 200) {
			document.querySelector('.contact').innerHTML = '';
			document.querySelector('.contact').insertAdjacentHTML('beforeend', xhr.responseText);		
		}else{
			console.log(`error en la petición: ${xhr.status}`);
		}
	});
	xhr.send();	
	setInterval(() =>{
		let xhr = new XMLHttpRequest();
		xhr.open('POST', '../src/library/contacts.php', true);
		xhr.addEventListener('load', () => {
			if (xhr.status === 200) {
				document.querySelector('.contact').innerHTML = '';
				document.querySelector('.contact').insertAdjacentHTML('beforeend', xhr.responseText);
			}else{
				console.log(`error en la petición: ${xhr.status}`);
			}
		});
		xhr.send();
	}, 10000);	
}
if (document.querySelector('.register-link') != null){
	document.querySelector('.register-link').addEventListener('click', () =>{
		document.querySelector('.register-link').classList.toggle('d-none');
		document.querySelector('.login-title').classList.toggle('d-none');
		document.querySelector('.register-title').classList.toggle('d-block')
		document.querySelector('.register-link-2').classList.toggle('d-block');
	});	
}
if (document.querySelector('.register-link-2') != null){
	document.querySelector('.register-link-2').addEventListener('click', () =>{
		document.querySelector('.register-link').classList.toggle('d-none');
		document.querySelector('.login-title').classList.toggle('d-none');
		document.querySelector('.register-title').classList.toggle('d-block')
		document.querySelector('.register-link-2').classList.toggle('d-block');
	});	
}

if (document.querySelector('#frm-img') != null){
	document.querySelector('#frm-img').addEventListener('submit', (ev) =>{
		let xhr = new XMLHttpRequest();
		const data = document.querySelector('#frm-img');
		let form = new FormData(data);	
		xhr.open('POST', '../src/library/post_shared.php', true);
		xhr.addEventListener('load', () => {
			if (xhr.status === 200) {
				refresh_shared();			
				document.querySelector('#shared').value = '';
				document.querySelector('#file').value = '';
			}else{
				console.log(`error en la petición: ${xhr.status}`);
			}
		});
		xhr.send(form);
		ev.preventDefault();				
	});
}
if(document.querySelector('.row-shared') != null){
	let xhr = new XMLHttpRequest();
	xhr.open('POST', '../src/library/list_shared.php', true);
	xhr.addEventListener('load', () => {
		if (xhr.status === 200) {
			document.querySelector('.row-shared').innerHTML = '';
			document.querySelector('.row-shared').insertAdjacentHTML('beforeend', xhr.responseText);
		}else{
			console.log(`error en la petición: ${xhr.status}`);
		}
	});
	xhr.send();
	setInterval(() =>{
		let xhr = new XMLHttpRequest();
		xhr.open('POST', '../src/library/list_shared.php', true);
		xhr.addEventListener('load', () => {
			if (xhr.status === 200) {
				document.querySelector('.row-shared').innerHTML = '';
				document.querySelector('.row-shared').insertAdjacentHTML('beforeend', xhr.responseText);
			}else{
				console.log(`error en la petición: ${xhr.status}`);
			}
		});
		xhr.send();
	}, 60000);
}	
if (document.querySelector('.usuarios') != null){
	document.querySelector('.usuarios').addEventListener('click', () =>{
		document.querySelector('.aside').classList.toggle('d-block');
	});
}
if (document.querySelector('.img-nav') != null){
	document.querySelector('.img-nav').addEventListener('click', () =>{
		document.querySelector('.option-user').classList.toggle('d-block');
	});
}
let refresh_shared = () =>{
	let xhr = new XMLHttpRequest();
	xhr.open('POST', '../src/library/list_shared.php', true);
	xhr.addEventListener('load', () => {
		if (xhr.status === 200) {
			document.querySelector('.row-shared').innerHTML = '';
			document.querySelector('.row-shared').insertAdjacentHTML('beforeend', xhr.responseText);
			document.querySelector('.cont-edit-in').classList.remove('d-block');
			document.querySelector('.exitBtn').classList.remove('d-block');
			document.querySelector('.back-black').classList.remove('d-block');
			document.querySelector('.back-black').classList.add('d-none');
			document.querySelector('.cont-edit-in').classList.add('d-none');
			document.querySelector('.exitBtn').classList.add('d-none');		
		}else{
			console.log(`error en la petición: ${xhr.status}`);
		}
	});
	xhr.send();
};
let clickaction = (b) =>{
	let xhr = new XMLHttpRequest();
	const data = document.querySelector(`#${b.id}`);
	let form = new FormData(data);	
	xhr.open('POST', '../src/library/list_comments.php', true);
	xhr.addEventListener('load', () => {
		if (xhr.status === 200) {
			refresh_shared();	
		}else{
			console.log(`error en la petición: ${xhr.status}`);
		}
	});
	xhr.send(form);
	event.preventDefault();	
};
if (document.querySelector('.frm-img') == null){
	if(document.querySelector('.posted') != null){
		document.querySelector('.posted').classList.toggle('d-none');
		document.querySelector('.row-shared').style = 'margin-top: 5%;';
	}
}
let on_like = (c) =>{
	let xhr = new XMLHttpRequest();
	const data = document.querySelector(`#${c.id}`);
	let form = new FormData(data);	
	xhr.open('POST', '../src/library/like_post.php', true);
	xhr.addEventListener('load', () => {
		if (xhr.status === 200) {
			refresh_shared();	
		}else{
			console.log(`error en la petición: ${xhr.status}`);
		}
	});
	xhr.send(form);
	event.preventDefault();		
}
let post_edit = (x) =>{
	document.querySelector('.cont-edit-in').classList.add('d-block');
	document.querySelector('.exitBtn').classList.add('d-block');
	document.querySelector('.back-black').classList.add('d-block');
	document.querySelector('.back-black').classList.remove('d-none');
	document.querySelector('.cont-edit-in').classList.remove('d-none');
	document.querySelector('.exitBtn').classList.remove('d-none');
}
if(document.querySelector('#exitBtn') != null){
	document.querySelector('#exitBtn').addEventListener('submit', (event) =>{
		let xhr = new XMLHttpRequest();
		const data = document.querySelector('#exitBtn');
		let form = new FormData(data);		
		xhr.open('POST', '../src/library/remove_sessions.php', true);
		xhr.addEventListener('load', () => {
			if (xhr.status === 200){
				document.querySelector('.cont-edit-in').classList.remove('d-block');
				document.querySelector('.exitBtn').classList.remove('d-block');
				document.querySelector('.back-black').classList.remove('d-block');
				document.querySelector('.back-black').classList.add('d-none');
				document.querySelector('.cont-edit-in').classList.add('d-none');
				document.querySelector('.exitBtn').classList.add('d-none');
			}else{
				console.log(`error en la petición: ${xhr.status}`);
			}
		});
		xhr.send(form);
		event.preventDefault();

	});
}	
if(document.querySelector('#frm-edit') != null){
	document.querySelector('#frm-edit').addEventListener('submit', (event) =>{
		let xhr = new XMLHttpRequest();
		const data = document.querySelector('#frm-edit');
		let form = new FormData(data);	
		xhr.open('POST', '../src/library/post_shared_edit.php', true);
		xhr.addEventListener('load', () => {
			if (xhr.status === 200){
				document.querySelector('#shared-edit').value = ''
				document.querySelector('#file-edit').value = ''
				refresh_shared();
			}else{
				console.log(`error en la petición: ${xhr.status}`);
			}
		});
		xhr.send(form);
		event.preventDefault();			
	});
}
let func_text_edit = () =>{
	let xhr = new XMLHttpRequest();	
	xhr.open('POST', '../src/library/text_pre_edit.php', true);
	xhr.addEventListener('load', () => {
		if (xhr.status === 200){
			document.querySelector('.text-pre-edit').innerHTML = xhr.responseText;
		}else{
			console.log(`error en la petición: ${xhr.status}`);
		}
	});
	xhr.send();
};
let val_id = (ev) =>{
	let xhr = new XMLHttpRequest();
	const data = document.querySelector(`#${ev.id}`);
	let form = new FormData(data);	
	xhr.open('POST', '../src/library/val_id.php', true);
	xhr.addEventListener('load', () => {
		if (xhr.status === 200){
			document.querySelector('#img-pre-edit').src = xhr.responseText;
			setTimeout(func_text_edit(), 4000);
		}else{
			console.log(`error en la petición: ${xhr.status}`);
		}
	});
	xhr.send(form);
	event.preventDefault();	
}
if (document.querySelector('#delete-publi') != null){
	document.querySelector('#delete-publi').addEventListener('submit', (ev) =>{
		let xhr = new XMLHttpRequest();
		const data = document.querySelector('#delete-publi');
		let form = new FormData(data);	
		xhr.open('POST', '../src/library/delete_publi.php', true);
		xhr.addEventListener('load', () => {
			if (xhr.status === 200){
				refresh_shared();
			}else{
				console.log(`error en la petición: ${xhr.status}`);
			}
		});
		xhr.send(form);
		event.preventDefault();
	});
}