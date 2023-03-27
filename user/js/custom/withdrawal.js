let load_data = () => {
    // fetch wallets
    router
      .get(
        "http://localhost/finance_app/API'S/ADMIN%20API/company_wallet_json_format.php"
      )
      .then((data) => {
        data = JSON.parse(data);
        if (data?.status) {
          create_select_option_template(data?.message);
        }
      })
      .catch((err) => {
        console.log(err);
      });
  };
let load_account_details = () => {
    router.get("")
}
  let create_select_option_template = (items) => {
    items = JSON.parse(items);
    let options_append_html = ``;
    if (items.length > 0) {
      items?.forEach((item) => {
        options_append_html += `<option value="${item?.wallet_name?.toLowerCase()}">${item?.wallet_name?.toUpperCase()}</option>`;
      });
  
      updateUI.selector.all(["#payment-type", options_append_html]);
    } else {
      notification.warning("No data available");
    }
  };

  $(function () {
    load_data()
  })