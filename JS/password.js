let password = document.getElementById('password')
loock_password=document.addEventListener('change',()=>{
let loock_password = document.getElementById('loock_password')
if(loock_password.checked){
    password.type="text"
}else{
    password.type='password'
}
})