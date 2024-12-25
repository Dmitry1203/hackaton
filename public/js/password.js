document.addEventListener("DOMContentLoaded", (event) => {

	document.querySelector("#сurrent-password").value = "";
	document.querySelector("#password").value = "";
	document.querySelector("#password-confirmation").value = "";

	let settingsPasswordForm = document.querySelector(
		"#change-password"
	);
		
	if (settingsPasswordForm) {
		settingsPasswordForm.addEventListener("submit", function (e) {
			e.preventDefault();
			const currentPassword = document.querySelector("#сurrent-password").value;
			const initialPassword = document.querySelector("#password").value;
			const repeatedPassword = document.querySelector("#password-confirmation").value;			
			changePassword(currentPassword,initialPassword,repeatedPassword);				
		});
	}

	async function changePassword(currentPassword,initialPassword,repeatedPassword) {

		const url = `${location.origin}/personal/profile/password/change`;
		const data = { currentPassword,initialPassword,repeatedPassword };	
		const testPassword = await fetch(url, {
			method: "POST",
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
				Accept: "application/json, text/plain, */*",
				"Content-Type": "application/json",
			},
			body: JSON.stringify(data),
		});
		
		const response = await testPassword.json();		

		if (response['status'] === 'OK') {	
		
			document.querySelector("#сurrent-password-error").innerHTML = response['data']['currentPasswordError'];
			document.querySelector("#password-error").innerHTML = response['data']['newPasswordError'];
			document.querySelector("#password-confirmation-error").innerHTML = response['data']['confirmPasswordError'];
			
			if (response['data']['success'] == 1){	
			
				document.querySelector("#сurrent-password-error").innerHTML = '';
				document.querySelector("#password-error").innerHTML = '';
				document.querySelector("#password-confirmation-error").innerHTML = '';
				
				document.querySelector("#сurrent-password").value = "";
				document.querySelector("#password").value = "";
				document.querySelector("#password-confirmation").value = "";				
				
				document.querySelector("#password-change-success").innerHTML = 'Пароль успешно изменен';
			}
						
		} 
		
	}

});