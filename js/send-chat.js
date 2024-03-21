let chatForm = document.getElementById('chat-form');
let outgoing_id = document.getElementById('outgoing');
let incoming_id = document.getElementById('income');
let chat = document.getElementById('message');
let chatArea = document.getElementById('chat-area');
let userStatus = document.getElementById('user-status');
let dots = document.querySelectorAll('.dots');
let del = document.querySelectorAll('.del');



var id = getUrlParameter('id')
chatForm.addEventListener('submit', sendChat);
chat.addEventListener('keydown',statusDown)

function statusDown(){

    sendStatus('Typing...');

    statusFlag = true; // Set the flag to true when typing starts
    setTimeout(() => {
        if (statusFlag) { // Only call statusUp if the flag is still true after the delay
            statusUp();
            statusFlag = false; // Reset the flag
        }
    }, 1500);
}

function statusUp(){
    sendStatus('Active');
}


async function sendStatus(val){
    let form = new FormData();
    const url = `php/userStatus.php`;
    form.append('status', val)

    let response = await fetch(url,{
        method : 'POST',
        body : form
    });
    // let data = await response.text();
    // userStatus.innerText = data;
    getChats();
}

async function sendChat(e){
    e.preventDefault();
    let formData = new FormData()
     formData.append('outgoing_id', outgoing_id.value)
     formData.append('incoming_id', incoming_id.value)
     formData.append('message', chat.value)
    const url = 'php/sendChat.php';

    let response = await fetch(url,{
        method : 'POST',
        body : formData,
    })
    if(response.ok){
        getChats();
        chat.value = ''
    }
}

function scrollToBottom() {
    var chatContainer = document.getElementById("chat-area");
    chatContainer.scrollTop = chatContainer.scrollHeight;
}
async function getChats(){
    let formData = new FormData()
     formData.append('outgoing_id', outgoing_id.value)
     formData.append('incoming_id', incoming_id.value)
    const url = 'php/getChats.php';

    let response = await fetch(url,{
        method : 'POST',
        body : formData,
    })
    let data =await response.text();
    chatArea.innerHTML = data;
    scrollToBottom();
}

async function getUserStatus(){
    const url = `php/getStatus.php?id=${id}`;
    let response = await fetch(url,{
        method : 'GET'
    });
    let data = await response.text();
    userStatus.innerText = data;
}

setInterval(()=>{
    getUserStatus();
},1000)

setInterval(()=>{
    getChats()
},1500);


function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}

