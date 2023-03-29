let validate_user_cred = () => {
  let [fullname, mail, phone, country, password, confirm_password] = lowercase(
    $("#fullname").val(),
    $("#email").val(),
    $("#phone-number").val(),
    $("#country").val(),
    $("#password").val(),
    $("#confirm-password").val()
  );
  let agreement_switch = document.getElementById("customSwitch1").checked;
  let status = empty(
    fullname,
    mail,
    phone,
    country,
    password,
    confirm_password
  ).status;

  if (status) {
    let password_validity = validate_passwords(password, confirm_password, 8);
    if (!password_validity.status) {
      notification.danger(password_validity.message);
      return {
        status: false,
      };
    } else {
      if (!agreement_switch) {
        notification.warning(
          "Must fill all field. (agree to terms and condition)"
        );
        return {
          status: false,
        };
      } else {
        return {
          status: true,
          fullname,
          mail,
          phone,
          country,
          password,
          confirm_password,
        };
      }
    }
  } else {
    notification.danger("Must fill all field.");
    return {
      status: false,
    };
  }
};

let handle_submit_registration = (
  fullname,
  mail,
  phone,
  country,
  password,
  confirm_password
) => {
  loading.start_loading("#register-btn");
  let referral_id = getUrlVars()["ref"];
  router
    .post(
      `http://localhost/finance_app/API'S/USER_API's/signup.php`,
      {
        fullname,
        mail,
        phone,
        country,
        password,
        confirm_password,
        signup: true,
        referred_by:referral_id ? referral_id : "",
      },
      () => {
        loading.stop_loading("#register-btn", "Register here");
      }
    )
    .then((data) => {
      data = parse_json_response(data, "registration_status")
      if(data){
        if(data?.registration_status){
          if(data?.email_status){
            notification.success("User signed up successfully!")
            setTimeout(() => {
              notification.success(data?.message)
            }, 7000);
          }else{
            notification.success("User signed up successfully!")
            setTimeout(() => {
              notification.warning("Error sending mail to user")
            }, 7000);
          }
        }else{
          notification.danger(data?.message)
        }
      }
    })
    .catch((err) => {
      console.log(err);
    });
};
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
$(function () {
  $("#register-form").on("submit", (e) => {
    e.preventDefault();
    let validity_of_cred = validate_user_cred();
    validity_of_cred?.status &&
      handle_submit_registration(
        validity_of_cred?.fullname,
        validity_of_cred?.mail,
        validity_of_cred?.phone,
        validity_of_cred?.country,
        validity_of_cred?.password,
        validity_of_cred?.confirm_password
      );
  });
});
