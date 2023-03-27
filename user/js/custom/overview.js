let load_data = () => {
  router
    .get("http://localhost/finance_app/API'S/USER_API's/display_user_account_info.php")
    .then((data) => {
      data = JSON.parse(data)
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
    ["#active-investment", Number(details?.total_active_investment)?.toLocaleString()],
    ["#last-deposit", Number(details?.last_deposit)?.toLocaleString()],
    ["#last-withdrawal", Number(details?.last_withdrawal)?.toLocaleString()],
    ["#referral-bonus", Number(details?.referral_bonus)?.toLocaleString()],
  );
  $("#referral-link").attr("href", details?.referral_link).html(details?.referral_link)
};

$(function () {
  load_data();
});
