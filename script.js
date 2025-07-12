let token = '';

document.getElementById('loginForm').addEventListener('submit', async(e)=>{
    e.preventDefault();

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    const response = await fetch('login.php',{
        method:'POST',
        headers: {'Content-Type' : 'application/json'},
        body:JSON.stringify({username,password})
    });

    const data = await response.json();

    if(response.ok){
        token = data.token;
        alert('Login successfull');
    }else{
        alert(data.error);
    }
})

async function fetchProtected(){
    const response = await fetch('protected.php', {
        headers: {
            'Authorization' : 'Bearer '+ token
        }
    });

    const data = await response.json();
    document.getElementById('result').textContent = JSON.stringify(data, null, 2);
}