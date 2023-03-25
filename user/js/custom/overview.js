let load_data = () => {
  router
    .get("../../../../Finance_app/tabadmin/test.php")
    .then((data) => {
      console.log(data);
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
    ["#total-deposit", Number(10000)?.toLocaleString()],
    ["#account-balance", Number(30000)?.toLocaleString()],
    ["#total-profit-earned", Number(2000)?.toLocaleString()],
    ["#total-withdrawal", Number(90000)?.toLocaleString()],
    ["#active-investment", Number(3)?.toLocaleString()],
    ["#last-deposit", Number(4000)?.toLocaleString()],
    ["#last-withdrawal", Number(3500)?.toLocaleString()],
    ["#referral-bonus", Number(1200)?.toLocaleString()]
  );
};

$(function () {
  load_data();
});
