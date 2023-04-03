// update user table
let update_user_table_html = (details) => {
  if (details) {
    updateUI.selector.all(
      ["#active-user", details?.fullname?.toUpperCase()],
      ["#full-name", details?.fullname],
      ["#email", details?.mail],
      ["#avatar", `<img src='${details?.img}' alt="avatar" width="30px"/>`],
      ["#phone-number", details?.phone],
      ["#country", details?.country]
    );
    updateUI.selector.all(
      $("#update-fullname").val(details?.fullname),
      $("#update-phone").val(details?.phone),
      $("#update-country").val(details?.country)
    );
  }
};

// update overview table
let update_overview_table_html = (details) => {
  if (details) {
    updateUI.selector.all(
      ["#total-deposit", Number(details?.total)?.toLocaleString()],
      ["#account-balance", Number(details?.balance)?.toLocaleString()],
      ["#total-profit-earned", Number(details?.total_profit)?.toLocaleString()],
      [
        "#total-withdrawal",
        Number(details?.total_withdrawal)?.toLocaleString(),
      ],
      [
        "#active-investment",
        Number(details?.active_investments)?.toLocaleString(),
      ],
      ["#last-deposit", Number(details?.last_deposit)?.toLocaleString()],
      ["#last-withdrawal", Number(details?.last_withdrawal)?.toLocaleString()],
      ["#referral-bonus", Number(details?.referral_bonus)?.toLocaleString()]
    );
    $(".total-deposit").val(details?.total);
    $(".account-balance").val(details?.balance);
    $(".total-profit-earned").val(details?.total_profit);
    $(".total-withdrawal").val(details?.total_withdrawal);
    $(".active-investment").val(details?.active_investments);
    $(".last-deposit").val(details?.last_deposit);
    $(".last-withdrawal").val(details?.last_withdrawal);
    $(".referral-bonus").val(details?.referral_bonus);
  }
  console.log("hi");
};

function getUrlVars() {
  var vars = [],
    hash;
  var hashes = window.location.href
    .slice(window.location.href.indexOf("?") + 1)
    .split("&");
  for (var i = 0; i < hashes.length; i++) {
    hash = hashes[i].split("=");
    vars.push(hash[0]);
    vars[hash[0]] = hash[1];
  }
  return vars;
}

// update investment table
let create_investment_table_html = (items, others) => {
  let table_append_html = ``;
  if (items.length > 0) {
    items?.forEach((item, index) => {
      table_append_html += `<tr> 
            <td class="sn">${index + 1}</td>
            <td class="investment_plan">${item?.investment_plan}</td>
            <td class="percentage">${others[index]?.percentage}</td>
            <td class="amount_invested">${item?.amount_invested}</td>
            <td class="duration">${others[index]?.plan_duration} days</td>
            <td class="start_date">${item?.created_at}</td>
            <td class="end_date">${item?.end_date}</td>
            <td class="status">${item?.transaction_status}</td>
            <td class="action_btns">
            <div>
            </div>
            </td>
            </tr>`;
    });
    updateUI.selector.all(["#investment-data", table_append_html]);
  }
};
let create_referral_table_html = (items) => {
  let table_append_html = ``;
  if (items.length > 0) {
    items?.forEach((item, index) => {
      table_append_html += `<tr> 
            <td class="referral_name">${item?.referral_name}</td>
            <td class="referral_bonus">${Number(
              item?.referral_bonus
            )?.toLocaleString()}</td>
            </tr>`;
    });
    updateUI.selector.all(["#referral-data", table_append_html]);
  }
};
let handle_activate_investment = (id) => {
  console.log(id);
};
let load_data = () => {
  let user_id = getUrlVars()["user_id"];
  router
    .get(
      `http://localhost/finance_app/API'S/ADMIN%20API/user-details.php?user_id=${user_id}`
    )
    .then((data) => {
      data = JSON.parse(data);
      if (data.status) {
        if (data.message) {
          update_user_table_html(data.message.user);
          // update_overview_table_html(data.message.overview);
          create_investment_table_html(
            data.message.investment,
            data?.message.plan_info
          );
          create_referral_table_html(data.message.referral);
        }
      }
    })
    .catch((err) => {
      console.error(err);
    });
};

let load_account_overview = () => {
  let user_id = getUrlVars()["user_id"];

  router
    .get(
      `http://localhost/finance_app/API'S/ADMIN%20API/display_user_account_info.php?user_id=${user_id}`
    )
    .then((data) => {
      data = JSON.parse(data);
      if (data?.status) {
      }
      update_overview(data?.message);
    })
    .catch((err) => {
      console.log(err);
    });
};

let update_overview = (details) => {
  updateUI.selector.all(
    ["#total-deposit", Number(details?.total_deposit)?.toLocaleString()],
    ["#account-balance", Number(details?.total_balance)?.toLocaleString()],
    ["#total-profit-earned", Number(details?.total_profit)?.toLocaleString()],
    ["#total-withdrawal", Number(details?.total_withdrawal)?.toLocaleString()],
    [
      "#active-investment",
      Number(details?.total_active_investment)?.toLocaleString(),
    ],
    ["#last-deposit", Number(details?.last_deposit)?.toLocaleString()],
    ["#last-withdrawal", Number(details?.last_withdrawal)?.toLocaleString()],
    ["#referral-bonus", Number(details?.referral_bonus)?.toLocaleString()]
  );
  $(".total-deposit").val(details?.total_deposit || 0);
  $(".account-balance").val(details?.total_balance || 0);
  $(".total-profit-earned").val(details?.total_profit || 0);
  $(".total-withdrawal").val(details?.total_withdrawal || 0);
  $(".active-investment").val(details?.active_investments || 0);
  $(".last-deposit").val(details?.last_deposit || 0);
  $(".last-withdrawal").val(details?.last_withdrawal || 0);
  $(".referral-bonus").val(details?.referral_bonus || 0);
};

// function to send ajax request to update personal info
let update_personal_info = (formData) => {
  $.ajax({
    url: "http://localhost/finance_app/API'S/ADMIN%20API/manual_update_user_info.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: (data) => {
      data = parse_json_response(data);
      if (data?.status) {
        alert(data?.message);
        load_data();
      } else {
        alert(data?.message);
      }
    },
    error: (err) => {
      console.log(err);
    },
  });
};
let update_wallet_info = (account_balance, total_profit, referral_bonus) => {
  loading.start_loading(".update-wallet-btn");
  router
    .post(
      "http://localhost/finance_app/API'S/ADMIN%20API/manual_update_user_info.php",
      {
        account_balance,
        total_profit,
        referral_bonus,
      },
      () => loading.stop_loading(".update-wallet-btn", "UPDATE WALLET")
    )
    .then((data) => {
      data = parse_json_response(data);
      if (data?.status) {
        alert(data?.message);
        load_data();
      } else {
        alert(data?.message);
      }
    });
};

// function to fire when the page loads
$(function (e) {
  load_data();

  load_account_overview();

  //handle click event to update personal info
  $("#update-personal-info").submit((e) => {
    e.preventDefault();

    //convert to lowercase and trim data
    let [update_fullname, update_phone, update_country] = lowercase(
      $("#update-fullname").val(),
      $("#update-phone").val(),
      $("#update-country").val()
    );
    let status = empty(update_fullname, update_phone, update_country).status;
    if (status) {
      let file = document.getElementById("update-img").files[0];

      let formData = new FormData();
      update_fullname !== "" &&
        formData.append("update_fullname", $("#update-fullname").val());
      update_country !== "" &&
        formData.append("update_country", $("#update-country").val());
      update_phone !== "" &&
        formData.append("update_phone", $("#update-phone").val());
      formData.append("update_img", file);
      formData.append("user_id", getUrlVars()["user_id"]);
      // call function to update personal info
      update_personal_info(formData);
    } else {
      notification.danger("Must fill all fields");
    }
  });
  $("#update-wallet-info").submit((e) => {
    e.preventDefault();
    let account_balance = $(".account-balance").val();
    let total_profit_earned = $(".total-profit-earned").val();
    let referral_bonus = $(".referral-bonus").val();

    let status = empty(
      account_balance,
      total_profit_earned,
      referral_bonus
    ).status;
    if (status) {
      update_wallet_info(account_balance, total_profit_earned, referral_bonus);
    } else {
      alert("Must fill in all fields");
    }
  });
});
