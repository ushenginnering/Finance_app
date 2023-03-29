let create_options = (items) => {
  items = JSON.parse(items);
  console.log(items);
  let option_append_html;
  if (items.length > 0) {
    items?.forEach((item) => {
      option_append_html += `
        <option value="">select individual user</option>
        <option value="${item}">${item}</option>
        `;
    });
    updateUI.selector.all(["#send-individual", option_append_html]);
  }
};

let load_users = () => {
  router
    .get(
      "http://localhost/finance_app/API'S/ADMIN%20API/mailer_fetch_usermail.php"
    )
    .then((data) => {
      data = JSON.parse(data);
      console.log(data);
      if (data?.status) {
        create_options(data?.message);
      }
    })
    .catch((err) => {
      console.log(err);
    });
};

let submit_mailer = (send_to, individual, subject, body) => {
    loading.start_loading(".send-mailer");
  router.post("http://localhost/finance_app/API'S/ADMIN%20API/mailer.php", {
    send_to,
    subject,
    specific_user:individual,
    body,
  }, () => loading.stop_loading(".send-mailer", "Send mail"))
  .then(data=> {
    data = parse_json_response(data)
    if (data?.status) {
        notification.success(data?.message);
    }else{
        notification.danger(data?.message)
    }
  })
  .catch(err => {
    console.log(err);
  })
};

$(function () {
  load_users();

  $("#mailer").submit((e) => {
    e.preventDefault();
    let [send_to, individual, subject, message] = lowercase(
      $("#send-to").val(),
      $("#send-individual").val(),
      $(".subject").val(),
      $(".message").val()
      );
      let status = empty(send_to, subject, message).status;
      
      if (status) {
          submit_mailer(send_to, individual, subject, message);
        } else {
            notification.danger("Must fill in all field");
        }
    });
});
