
let loginForm = document.getElementById('login');
let logEmail = document.getElementById('login-email');
let logPass = document.getElementById('login-password');


loginForm.addEventListener('submit',loginUser);

async function loginUser(e) {
    e.preventDefault();
    const url = 'php/login.php';

    const formData = new FormData();
    formData.append('email', logEmail.value);
    formData.append('password', logPass.value);

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
            message('Server error:'+response.status, 1500)
        }
    } catch (error) {
        console.error('Fetch error:', error);
    }
}
