
// validate user inputs
 let validateCredential = () =>{
    let user_email = $('#email-address')?.val()
    let user_password = $('#password')?.val()

    // if(user_email === "")
    if(empty(user_email, user_password)?.status){
        return {
            status:true,
            user_email,
            user_password,
        }
    }else{
        notification?.danger('All fields must be filled before submiting')
        return {
            status:false
        }
    }
}

let handle_submit = (email, password) => {
    console.log(email, password);
    // router.post('index.php', {email, password})
    
}

// submit details by clicking login button
$('#login_form')?.on('submit', (e) => {
    e?.preventDefault()
    let response = validateCredential() 
     response?.status && handle_submit(response?.user_email, response.user_password)
})
