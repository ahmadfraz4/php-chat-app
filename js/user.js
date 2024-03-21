let userChats = document.getElementById('user-chats');
let search = document.getElementById('search-user');

async function getAllUsers(){
    const url = 'php/get-user.php'
    let response = await fetch(url,{
        method: 'GET',
    });
    let jsonData = await response.json();
    if(jsonData?.success == false){
        userChats.innerHTML = 'No user found';
        return
    }
    renderElem(jsonData)
   
}

search.addEventListener('keyup', searchUser);
// search-user.php
async function searchUser(e){
    let formData = new FormData();
    formData.append('search', e.target.value)
    const url = 'php/search-user.php';
    let response = await fetch(url,{
        method: 'post',
        body : formData,
    });
    let jsonData = await response.json();
    if(jsonData?.success == false){
        userChats.innerHTML = 'No user found';
        return
    }
    renderElem(jsonData)
}


getAllUsers();


function renderElem(jsonData){
    userChats.innerHTML = '';
    jsonData.forEach((item,index)=>{
        let section = document.createElement('a');
        section.href=`chat.php?id=${item.unique_id}`;
        section.classList.add('chat', 'text-chat', 'd-flex', 'align-items-center', 'justify-content-between', 'px-3', 'mt-1');
        section.innerHTML = `
            <div class="user-profile other d-flex align-items-center">
                <div class="user-pic other">
                    <img src="images/${item.image}" class="w-100" alt="user">
                </div>
                <div class="user-data">
                    <div class="fw-bold other-name">${item.name}</div>
                    <div class="other-message">${item.email}</div>     
                </div>
            </div>
            <div class="status-dot online"></div>
        `;
        userChats.appendChild(section);
    });
}

// setInterval(()=>{
// },500)