function message(response, time){

    let body = document.body;
    let ele = document.createElement('div');
    ele.classList.add('response')

    if(response.success == true){
        ele.classList.add('success');
    }else{
        ele.classList.add('error')
    }
    console.log(response.message, response.success)
    ele.innerText = response.message;
    body.appendChild(ele)
    setTimeout(()=>{
        body.removeChild(ele)
    },time)
}
