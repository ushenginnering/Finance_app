
$(function(){
    $("#forgot-pass").submit((e) => {
        e.preventDefault()
        let [email] = lowercase($(".email").val())
        let status = empty(email).status
        if(status){
            loading.start_loading(".forgot-pass-btn");
            router.post("../../../../Finance_app/API'S/USER_API's/confirm_password/validate_email.php", {
                confirm_email:email,
            }, () => loading.stop_loading(".forgot-pass-btn", "Validate Email"))
            .then(data => {
                data = parse_json_response(data);
                if(data?.status && data?.email_status){
                    notification.success(data?.message)
                    $(".new-pas-show").hide()
                    $(".new-pas-hide").show()
                }else{
                    notification.danger(data?.message)
                }
            })
        }else{
            notification.danger("Enter email address")
        }
    })
    $("#new-pas").submit((e) => {
        e.preventDefault()
        let [OTP, new_password, confirm_password] = lowercase($(".OTP").val(), $(".new-password").val(), $(".confirm-password").val())
        let status = empty(OTP, new_password, confirm_password).status
        if(status){
            loading.start_loading(".new-pas-btn");
            router.post("../../../../Finance_app/API'S/USER_API's/confirm_password/create_password.php", {
                new_pass:new_password,
                temp_pass:OTP,
                confirm_pass:confirm_password,
                email:$(".email").val(),
            }, () => loading.stop_loading(".new-pas-btn", "Reset Password"))
            .then(data => {
                data = parse_json_response(data);
                if(data?.status){
                    notification.success(data?.message)

                }else{
                    notification.danger(data?.message)
                }
            })
        }else{
            notification.danger("Enter email address")
        }
    })

})