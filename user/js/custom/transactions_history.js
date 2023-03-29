// update user table
let update_deposit_table_html = (items) => {
  let table_append_html = ``;
  if (items.length > 0) {
    items?.forEach((item) => {
      table_append_html += `
      <tr> 
            <td class="amount">${item?.amount_deposited}</td>
            <td class="type">${item?.deposit_type}</td>
            <td class="date">${new Date(item?.date_time)
              .toJSON()
              .slice(0, 10)}</td>
            <td class="status">${item?.transaction_status}</td>
            </tr>`;
    });
    updateUI.selector.all(["#deposit-data", table_append_html]);
  }
};

// update overview table
let update_withdrawal_table_html = (items) => {
  let table_append_html = ``;
  if (items.length > 0) {
    items?.forEach((item, index) => {
      table_append_html += `<tr> 
            <td class="amount_withdrawn">${item?.amount_withdrawn}</td>
            <td class="withdrawal_type">${item?.withdrawal_type}</td>
            <td class="withdrawal_address">${item?.withdrawal_address}</td>
            <td class="date_time">${new Date(item?.date_time)
              .toJSON()
              .slice(0, 10)}</td>
            <td class="transaction_status">${item?.transaction_status}</td>
            </tr>`;
    });
    updateUI.selector.all(["#withdrawal-data", table_append_html]);
  }
};

// update investment table
let create_investment_table_html = (items) => {
  let table_append_html = ``;
  if (items.length > 0) {
    items?.forEach((item, index) => {
      var date1 = new Date(item?.created_at).toJSON().slice(0, 10);
      var date2 = new Date(item?.end_date).toJSON().slice(0, 10);

      // First we split the values to arrays date1[0] is the year, [1] the month and [2] the day
      date1 = date1.split("-");
      date2 = date2.split("-");

      // Now we convert the array to a Date object, which has several helpful methods
      date1 = new Date(date1[0], date1[1], date1[2]);
      date2 = new Date(date2[0], date2[1], date2[2]);

      // We use the getTime() method and get the unixtime (in milliseconds, but we want seconds, therefore we divide it through 1000)
      date1_unixtime = parseInt(date1.getTime() / 1000);
      date2_unixtime = parseInt(date2.getTime() / 1000);

      var timeDifference = date2_unixtime - date1_unixtime;

      // in Hours
      var timeDifferenceInHours = timeDifference / 60 / 60;

      // and finaly, in days :)
      var timeDifferenceInDays = timeDifferenceInHours / 24;

      table_append_html += `<tr> 
            <td class="start_date">${new Date(item?.created_at)
              .toJSON()
              .slice(0, 10)}</td>
            <td class="duration">${timeDifferenceInDays} days</td>
            <td class="end_date">${new Date(item?.end_date)
              .toJSON()
              .slice(0, 10)}</td>
            <td class="amount">${item?.amount_invested}</td>
            <td class="profit">${item?.profit_to_get}</td>
            <td class="status">${item?.transaction_status}</td>
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
  router
    .get(
      `http://localhost/finance_app/API'S/USER_API's/transactions_history.php`
    )
    .then((data) => {
      data = JSON.parse(data);
      if (data.status) {
        if (data.message) {
          update_deposit_table_html(data.message.total_deposit);
          update_withdrawal_table_html(data.message.total_withdrawal);
          create_investment_table_html(data.message?.total_investment);
          create_referral_table_html(data.message.referrals);
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

function days_between(date1, date2) {
  // The number of milliseconds in one day
  const ONE_DAY = 1000 * 60 * 60 * 24;

  // Calculate the difference in milliseconds
  const differenceMs = Math.abs(date1 - date2);

  // Convert back to days and return
  return Math.round(differenceMs / ONE_DAY);
}
// update_user_table_html({
//   fullname: "Alex Iwobi",
//   mail: "segunade041@gmail.com",
//   country: "Nigeria",
//   phone: "07023432154",
//   img: "../../../../Finance_app/user/img/user10.png",
// });
