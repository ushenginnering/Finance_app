// validate user inputs
let validate_credential = () => {
  let [user_email, user_password] = lowercase(
    $("#email-address")?.val(),
    $("#password")?.val()
  );

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

let handle_submit = (user_email, user_password) => {
  loading.start_loading("#login-btn");

  router
    .post(
      `http://localhost/finance_app/API'S/USER_API's/login.php`,
      {
        user_email,
        user_password,
      },
      () => {
        loading.stop_loading("#login-btn", "Login here");
      }
    )
    .then((data) => {
      data = JSON.parse(data);
      if (data?.status) {
        location.href = "http://localhost/finance_app/user/index.php";
      } else {
        notification.danger(data?.message || "error");
      }
    })
    .catch((err) => {
      console.log(err);
    });
};

// submit details by clicking login button
$("#login-form")?.on("submit", (e) => {
  e?.preventDefault();
  let response = validate_credential();
  response?.status &&
    handle_submit(response?.user_email, response.user_password);
});
