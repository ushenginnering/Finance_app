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
  }
};

// update overview table
let update_overview_table_html = (details) => {
  if (details) {
    updateUI.selector.all(
      ["#total-deposit", Number(details?.total - deposit)?.toLocaleString()],
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
  }
};

// update investment table
let create_investment_table_html = (items, others) => {
  console.log(others);
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
            <a href="#" onclick="handle_activate_investment(${item?.id})">
            <span class="btn btn-success">activate</span
            ></a>
            </div>
            </td>
            </tr>`;
    });
    updateUI.selector.all(["#investment-data", table_append_html]);
  }
};
let create_referral_table_html = (items) => {
  console.log(items);
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
  router
    .get(`http://localhost/finance_app/API'S/ADMIN%20API/user-details.php?user_id=87862`)
    .then((data) => {
      data = JSON.parse(data)
      if (data.status) {
        if (data.message) {
          update_user_table_html(data.message.user);
          // update_overview_table_html(data.message.overview);
          create_investment_table_html(data.message.investment, data?.message.plan_info);
          create_referral_table_html(data.message.referral);
        }
      }
    })
    .catch((err) => {
      console.error(err);
    });
};

// function to send ajax request to update personal info
let update_personal_info = (formData) => {
  $.ajax({
    url: "http://localhost/finance_app/tabadmin/test.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: (data) => {
      console.log(data);
    },
    error: (err) => {
      console.log(err);
    },
  });
};
// function to fire when the page loads
$(function (e) {
  load_data();

  //handle click event to update personal info
  $("#update-personal-info").submit((e) => {
    e.preventDefault();

    //convert to lowercase and trim data
    let [update_fullname, update_phone, update_country] = lowercase(
      $("#update-fullname").val(),
      $("#update-phone").val(),
      $("#update-country").val()
    );
    let file = document.getElementById("update-img").files[0];

    let formData = new FormData();
    update_fullname !== "" &&
      formData.append("update_fullname", $("#update-fullname").val());
    update_country !== "" &&
      formData.append("update_country", $("#update-country").val());
    update_phone !== "" &&
      formData.append("update_phone", $("#update-phone").val());
    file?.name && formData.append("update_img", file);

    // call function to update personal info
    update_personal_info(formData);
  });
});

// create_investment_table_html([
//   {
//     investment_plan: "Beginners plan",
//     percentage: "2%",
//     amount_invested: 20000,
//     duration: 10,
//     start_date: new Date(Date.now()),
//     end_date: new Date(Date.now()),
//     investment_status: "success",
//   },
// ]);
// create_referral_table_html([
//   {
//     referral_name: "Lorem apsum",
//     referral_bonus: "30000",
//   },
// ]);

// update_user_table_html({
//   fullname: "Alex Iwobi",
//   mail: "segunade041@gmail.com",
//   country: "Nigeria",
//   phone: "07023432154",
//   img: "../../../../Finance_app/user/img/user10.png",
// });
