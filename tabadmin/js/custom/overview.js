// fetch data on load of the page
let load_data = () => {
  router
    .get("test.php")
    .then((data) => {
      if (data?.status) {
        Update_overview(data?.message);
      }
    })
    .catch((error) => {
      console.log(error);
    });
};

// function to update UI with data fetched from server
let Update_overview = (details) => {
  updateUI.selector.all(
    ["#total-deposit", Number(details?.total_deposit)?.toLocaleString()],
    ["#total-users", Number(details?.total_users)?.toLocaleString()],
    ["#total-withdrawal", Number(details?.total_withdrawal)?.toLocaleString()],
    ["#total-investment", Number(details?.total_investment)?.toLocaleString()]
  );
};

let load_notification = () => {
  // router.post('test.php', {})
};


$(function (e) {
  load_data();

  load_notification();
});
Update_overview({
  total_deposit: 1000000,
  total_users: 1000,
  total_withdrawal: 500000,
  total_investment: 90,
});
