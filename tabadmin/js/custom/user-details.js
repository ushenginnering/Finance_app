// update user table
let update_user_table_html = (details) => {
  if (details) {
    updateUI.selector.all(
      ["#full-name", details?.fullname],
      ["#email", details?.mail],
      ["#avatar", `<img src='${details?.img}' alt="avatar"/>`],
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
let create_investment_table_html = (items) => {
  let table_append_html = ``;
  if (items.length > 0) {
    items?.forEach((item, index) => {
      table_append_html += `<tr> 
            <td class="sn">${index + 1}</td>
            <td class="investment_plan">${item?.investment_plan}</td>
            <td class="percentage">${item?.percentage}</td>
            <td class="amount_invested">${item?.amount_invested}</td>
            <td class="duration">${item?.duration} days</td>
            <td class="start_date">${new Date(item?.start_date)
              .toJSON()
              .slice(0, 10)}</td>
            <td class="end_date">${new Date(item?.end_date)
              .toJSON()
              .slice(0, 10)}</td>
            <td class="status">${item?.investment_status}</td>
            <td class="action_btns">
            <div>
            <a href="#" onclick="handle_activate_investment(${item?.id})">
            <span class="btn btn-success">activate</span
            ></a>
            </div>
            </td>
            </tr>`;
    });
    updateUI.selector.apppend(["#investment-data", table_append_html]);
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
    updateUI.selector.apppend(["#referral-data", table_append_html]);
  }
};
let handle_activate_investment = (id) => {
  console.log("id");
};
let load_data = (filter) => {
  router
    .get(`test.php?filter=${filter}`)
    .then((data) => {
      console.log(data);
      if (data.status) {
        if (data.message) {
          update_user_table_html(data.message.user);
          update_overview_table_html(data.message.overview);
          create_investment_table_html(data.message.investment);
          create_referral_table_html(data.message.referral);
        }
      }
    })
    .catch((err) => {
      console.error(err);
    });
};

// function to fire when the page loads
$(function (e) {
  load_data("active");
});

create_investment_table_html([
  {
    investment_plan: "Beginners plan",
    percentage: "2%",
    amount_invested: 20000,
    duration: 10,
    start_date: new Date(Date.now()),
    end_date: new Date(Date.now()),
    investment_status: "success",
  },
]);
create_referral_table_html([
  {
    referral_name: "Lorem apsum",
    referral_bonus: "30000",
  },
]);
