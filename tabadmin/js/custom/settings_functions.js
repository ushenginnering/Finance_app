// functions to fetch from server on page load
let load_investment_plans = () => {
  router
    .get(
      "http://localhost/finance_app/API'S/ADMIN%20API/company_investment_plans_json_format.php"
    )
    .then((data) => {
      data = JSON.parse(data);
      if (data?.status) {
        create_investment_table_template(data?.message);
      }
    })
    .catch((error) => {
      console.log(error);
    });
};

let load_wallets = () => {
  router
    .get(
      "http://localhost/finance_app/API'S/ADMIN%20API/company_wallet_json_format.php"
    )
    .then((data) => {
      data = JSON.parse(data);
      if (data?.status) {
        create_wallet_table_template(data?.message);
      }
    })
    .catch((error) => {
      console.log(error);
    });
};

let load_admin_details = () => {
  router
    .get(
      "http://localhost/finance_app/API'S/ADMIN%20API/get_company_passsword_json_format.php"
    )
    .then((data) => {
      data = JSON.parse(data);
      if (data?.status) {
        let message = JSON.parse(data?.message);
        $(".old-password").val(message[0]?.admin_password);
      }
    })
    .catch((error) => {
      console.log(error);
    });
};

let load_site_info = () => {
  router
    .get(
      "http://localhost/finance_app/API'S/ADMIN%20API/get_company_mata_json_format.php"
    )
    .then((data) => {
      data = JSON.parse(data);
      if (data?.status) {
        let message = JSON.parse(data?.message);
        $(".site-name").val(message[0]?.site_name);
        $(".site-url").val(message[0]?.site_url);
        $(".meta-keywords").val(message[0]?.meta_keywords);
        $(".meta-description").val(message[0]?.meta_description);
      }
    })
    .catch((error) => {
      console.log(error);
    });
};

let load_mailer_info = () => {
  router
    .get(
      "http://localhost/finance_app/API'S/ADMIN%20API/get_company_mailer_info_json_format.php"
    )
    .then((data) => {
      data = JSON.parse(data);
      if (data?.status) {
        let message = JSON.parse(data?.message);
        $(".a-gmail").val(message[0]?.active_gmail_address);
        $(".a-gmail-password").val(message[0]?.active_gmail_password);
        $(".system-auto-send-from-email-address").val(
          message[0]?.system_auto_send_from_email_address
        );
        $(".system-reply-email-address").val(
          message[0]?.system_reply_email_address
        );
      }
    })
    .catch((error) => {
      console.log(error);
    });
};

let load_auto_mailer_template = () => {
  router
    .get(
      "http://localhost/finance_app/API'S/ADMIN%20API/get_mailer_draft_json_fromat.php"
    )
    .then((data) => {
      data = JSON.parse(data);
      if (data?.status) {
        let message = JSON.parse(data?.message);
        $(".welcome_mail_draft").val(message[0]?.welcome_mail_draft),
          $(".change_password_mail_draft").val(
            message[0]?.change_password_mail_draft
          ),
          $(".forget_password_mail_draft").val(
            message[0]?.forget_password_mail_draft
          ),
          $(".receive_payment_mail_draft").val(
            message[0]?.receive_payment_mail_draft
          );
      }
    })
    .catch((error) => {
      console.log(error);
    });
};

let create_investment_table_template = (items) => {
  items = JSON.parse(items);
  let table_append_html;
  if (items.length > 0) {
    items?.forEach((item, index) => {
      table_append_html += `<tr>
            <td>${index + 1}</td>
            <td>${item?.plan_name}</td>
            <td>${item?.percentage}%</td>
            <td>${item?.plan_duration} Days</td>
            <td>${item?.minimum_value}</td>
            <td>${item?.maximum_value}</td>
            <td>
                <div>
                    <a href="javascript:void(0)">
                    <span title="De-activate Plan from system"
                      class="btn btn-warning icon-cancel" onClick="handle_plan_delete(${
                        item?.id
                      })">
                      </span>
                            </a>
                </div>
            </td>
        </tr>`;
    });

    updateUI.selector.all([".investment_data", table_append_html]);
  } else {
    notification.warning("No data available");
  }
};

let create_wallet_table_template = (items) => {
  items = JSON.parse(items);
  let table_append_html;
  if (items.length > 0) {
    items?.forEach((item, index) => {
      table_append_html += `<tr>
            <td>${index + 1}</td>
          <td>${item?.wallet_name}</td>
          <td><img src="${item?.wallet_avatar}" width="50" alt="${
        item?.wallet_name
      } image"/></td>
          <td>${item?.wallet_address}</td>
          <td>
          <div>
              <a href="javascript:void(0)"><span title="Delete Wallet from system"
                      class="btn btn-danger icon-delete" onClick="handle_wallet_delete(${
                        item?.id
                      })"></span></a>
          </div>
      </td>
        </tr>`;
    });

    updateUI.selector.all([".wallet_data", table_append_html]);
  } else {
    notification.warning("No data available");
  }
};

// function to handle add investment
let handle_add_investment_plan = (
  plan_name,
  percentage,
  plan_duration,
  minimum_value,
  maximum_value
) => {
  loading?.start_loading("#add-investment-btn");

  //   ajax request
  router
    .post(
      "http://localhost/finance_app/API'S/ADMIN%20API/create_new_investment_plan.php",
      {
        create_new_investment_plan: true,
        plan_name,
        percentage,
        plan_duration,
        minimum_value,
        maximum_value,
      },
      () => loading.stop_loading("#add-investment-btn", "update changes")
    )
    .then((data) => {
      data = parse_json_response(data);
      if (data?.status) {
        // if succesful
        notification.success(data?.message);

        // call function to load investments
        load_investment_plans();
      } else {
        notification.danger(data?.message);
      }
    });
};

// handle delete event on wallets
let handle_wallet_delete = (id) => {
  console.log("delete wallet");
};

let handle_update_site_info = (
  site_name,
  site_url,
  meta_keywords,
  meta_description
) => {
  loading.start_loading(".update-site-btn");

  router
    .post(
      "http://localhost/finance_app/API'S/ADMIN%20API/update_company_meta_info.php",
      {
        update_meta_info: true,
        site_name,
        site_url,
        meta_keywords,
        meta_description,
      },
      () => loading.stop_loading(".update-site-btn", "update changes")
    )
    .then((data) => {
      data = parse_json_response(data);
      if (data?.status) {
        // if succesful
        notification.success(data?.message);

        // call function to load investments
        load_site_info();
      } else {
        notification.danger(data?.message);
      }
    });
};

let handle_update_mailer = (
  active_gmail_address,
  active_gmail_password,
  system_auto_send_from_email_address,
  system_reply_email_address
) => {
  loading.start_loading(".a-mailer-btn");

  router
    .post(
      "http://localhost/finance_app/API'S/ADMIN%20API/update_company_mailer_info.php",
      {
        update_mailer_info: true,
        active_gmail_address,
        active_gmail_password,
        system_auto_send_from_email_address,
        system_reply_email_address,
      },
      () => loading.stop_loading(".a-mailer-btn", "update changes")
    )
    .then((data) => {
      data = parse_json_response(data);
      if (data?.status) {
        // if succesful
        notification.success(data?.message);

        // call function to load investments
        load_mailer_info();
      } else {
        notification.danger(data?.message);
      }
    });
};

let handle_update_auto_mailer_template = (
  welcome_mail_draft,
  change_password_mail_draft,
  forget_password_mail_draft,
  receive_payment_mail_draft
) => {
  loading.start_loading(".auto-mailer-btn");

  router
    .post(
      "http://localhost/finance_app/API'S/ADMIN%20API/update_mail_drafts.php",
      {
        update_email_drafts: true,
        welcome_mail_draft,
        change_password_mail_draft,
        forget_password_mail_draft,
        receive_payment_mail_draft,
      },
      () => loading.stop_loading(".auto-mailer-btn", "update changes")
    )
    .then((data) => {
      data = parse_json_response(data);
      if (data?.status) {
        // if succesful
        notification.success(data?.message);

        // call function to load investments
        load_auto_mailer_template()
      } else {
        notification.danger(data?.message);
      }
    });
};


// handle delete event on investment plan
let handle_plan_delete = (id) => {
  console.log("deactivate plan");
};

// function to add new wallet
let handle_add_wallet = (formData) => {
  // showing loading state on button
  loading.start_loading(".add-wallet-btn");
  $.ajax({
    url: "http://localhost/finance_app/API'S/ADMIN%20API/create_new_company_wallet.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: (data) => {
      loading.stop_loading(".add-wallet-btn", "update changes");
      data = parse_json_response(data);
      if (data?.status) {
        // if succesful
        notification.success(data?.message);

        // call function to load wallets
        load_wallets();
      } else {
        notification.danger(data?.message);
      }
    },
    error: (err) => {
      loading.stop_loading(".add-wallet-btn", "update changes");
      notification.warning("something went wrong. try refreshing page");
      console.log(err);
    },
  });
};

let handle_password_update = (new_password, confirm_password, old_password) => {
  loading?.start_loading(".update-pass-btn");

  //   ajax request
  router
    .post(
      "http://localhost/finance_app/API'S/ADMIN%20API/update_company_password.php",
      {
        update_company_password: true,
        old_password,
        new_password,
        confirm_password,
      },
      () => loading.stop_loading(".update-pass-btn", "update changes")
    )
    .then((data) => {
      data = parse_json_response(data);
      if (data?.status) {
        // if succesful
        notification.success(data?.message);
        $(".new-password").val("");
        $(".confirm-new-password").val("");

        // call function to load investments
        load_admin_details();
      } else {
        notification.danger(data?.message);
      }
    });
};
