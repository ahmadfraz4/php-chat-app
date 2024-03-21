
let registerForm = document.getElementById('register');
let regName = document.getElementById('reg-name');
let regEmail = document.getElementById('reg-email');
let regPass = document.getElementById('reg-password');
let regFile = document.getElementById('reg-file');


registerForm.addEventListener('submit',registerUser);

async function registerUser(e) {
    e.preventDefault();
    const url = 'php/signup.php';

    const formData = new FormData();
    formData.append('name', regName.value);
    formData.append('email', regEmail.value);
    formData.append('password', regPass.value);
    formData.append('image', regFile.files[0]);

    try {
        let response = await fetch(url, {
            method: 'POST',
            body: formData
        });

        let data = await response.json();
        data = data[0];
        if (response.ok) {
            message(data, 2000)
           
            if(data.success){
                location.href = 'user.php'
            }
            
        } else {
            message('Server error:', response.status, 1500)
        }
    } catch (error) {
        console.error('Fetch error:', error);
    }
}
