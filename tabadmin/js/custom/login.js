// validate user inputs
let validateCredential = () => {
  let user_email = $("#email-address")?.val();
  let user_password = $("#password")?.val();

  // if(user_email === "")
  if (empty(user_email, user_password)?.status) {
    return {
      status: true,
      user_email,
      user_password,
    };
  } else {
    notification?.danger("All fields must be filled before submiting");
    return {
      status: false,
    };
  }
};

let handle_submit = (admin_email, password) => {
  // console.log(email, password);
  loading.start_loading(".login");
  router
    .post(
      "http://localhost/finance_app/API'S/ADMIN%20API/login.php",
      { admin_email, password },
      () => loading.stop_loading(".login", "Login here")
    )
    .then((data) => {
        data = parse_json_response(data);
        if (data?.status) {
          location.href = "http://localhost/finance_app/tabadmin/index.php";
        } else {
          notification.danger(data?.message || "error");
        }
    })
    .catch((err) => {
      console.log(err);
    });
};

// submit details by clicking login button
$("#login_form")?.on("submit", (e) => {
  e?.preventDefault();
  let response = validateCredential();
  response?.status &&
    handle_submit(response?.user_email, response.user_password);
});
