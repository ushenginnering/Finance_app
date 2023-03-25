// function to run when page loads
$(function () {
  load_investment_plans();

  load_wallets();

  load_admin_details();

  load_site_info();

  load_mailer_info();

  load_auto_mailer_template()

  // event to handle submition
  $("#update-password").submit((e) => {
    e.preventDefault();

    let [new_password, confirm_new_password] = lowercase(
      $(".new-password").val(),
      $(".confirm-new-password").val()
    );
    let old_password = $(".old-password").val();
    let status = empty(new_password, confirm_new_password).status;

    if (status) {
      let password_status = validate_passwords(
        new_password,
        confirm_new_password,
        4
      );
      if (password_status.status) {
        handle_password_update(
          new_password,
          confirm_new_password,
          old_password
        );
      } else {
        notification.danger(password_status?.message);
      }
    } else {
      notification.danger("Must fill all field");
    }
  });

  $("#site-info").submit((e) => {
    e.preventDefault();
    // process data
    let [site_name, site_url, meta_keywords, meta_description] = lowercase(
      $(".site-name").val(),
      $(".site-url").val(),
      $(".meta-keywords").val(),
      $(".meta-description").val()
    );
    handle_update_site_info(
      site_name,
      site_url,
      meta_keywords,
      meta_description
    );
  });
  $("#add-investment").submit((e) => {
    e.preventDefault();
    // process data
    let [plan_name, percentage, plan_duration, minimum_value, maximum_value] =
      lowercase(
        $(".add-plan-name").val(),
        $(".add-percentage").val(),
        $(".add-duration").val(),
        $(".add-minimum-value").val(),
        $(".add-maximum-value").val()
      );

    let status = empty(
      plan_name,
      percentage,
      plan_duration,
      minimum_value,
      maximum_value
    ).status;

    if (status) {
      // if all the fields are not empty
      handle_add_investment_plan(
        plan_name,
        percentage,
        plan_duration,
        minimum_value,
        maximum_value
      );
    } else {
      notification.danger("Must fill all fields");
    }
  });

  // event to add submition
  $("#add-wallet").submit((e) => {
    e.preventDefault();
    let [wallet_name, wallet_address] = lowercase(
      $(".add-wallet-name").val(),
      $(".add-wallet-address").val()
    );

    let wallet_avatar =
      document.getElementsByClassName("add-wallet-avatar")[0].files;
    let status = empty(
      wallet_name,
      wallet_address,
      wallet_avatar?.length
    ).status;

    if (status) {
      let formData = new FormData();

      formData.append("wallet_name", $(".add-wallet-name").val());
      formData.append("wallet_address", $(".add-wallet-address").val());
      formData.append("create_new_company_wallet", true);
      formData.append("wallet_avatar", wallet_avatar[0]);
      handle_add_wallet(formData);
    } else {
      notification.danger("Fill in all field");
    }
  });

  $("#mailer-info").submit((e) => {
    e.preventDefault();
    let [
      active_gmail_address,
      active_gmail_password,
      system_auto_send_from_email_address,
      system_reply_email_address,
    ] = lowercase(
      $(".a-gmail").val(),
      $(".a-gmail-password").val(),
      $(".system-auto-send-from-email-address").val(),
      $(".system-reply-email-address").val()
    );
    let status = empty(
      active_gmail_address,
      active_gmail_password,
      system_auto_send_from_email_address,
      system_reply_email_address
    ).status;

    if (status) {
      handle_update_mailer(
        active_gmail_address,
        active_gmail_password,
        system_auto_send_from_email_address,
        system_reply_email_address
      );
    } else {
      notification.danger("Fill in all field");
    }
  });
  $("#auto-email-template").submit((e) => {
    e.preventDefault();
    let [
      welcome_mail_draft,
      change_password_mail_draft,
      forget_password_mail_draft,
      receive_payment_mail_draft,
    ] = lowercase(
      $(".welcome_mail_draft").val(),
      $(".change_password_mail_draft").val(),
      $(".forget_password_mail_draft").val(),
      $(".receive_payment_mail_draft").val()
    );
    let status = empty(
      welcome_mail_draft,
      change_password_mail_draft,
      forget_password_mail_draft,
      receive_payment_mail_draft
    ).status;

    if (status) {
      handle_update_auto_mailer_template(
        welcome_mail_draft,
        change_password_mail_draft,
        forget_password_mail_draft,
        receive_payment_mail_draft
      );
    } else {
      notification.danger("Fill in all field");
    }
  });
});
