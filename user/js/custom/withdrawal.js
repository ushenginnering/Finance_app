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
}
let update_overview = (details) => {
    updateUI.selector.all(
      ["#account-balance", Number(details?.total_balance)?.toLocaleString()],
      ["#referral-bonus", Number(details?.referral_bonus)?.toLocaleString()],
    );
  };
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

  let sort_balance = () => {
    let account_balance =  $("#account-balance").text();
    let referral_balance = $("#referral-bonus").text();

    let check_account_balance = document.getElementById("accbalance").checked
    let check_referral_balance = document.getElementById("refbonus").checked

    if(check_account_balance){
        return {
            value:parseInt(account_balance.replace(/,/g,"")),
            account:"balance",
        }
    }
    if(check_referral_balance){
        return {
            value:parseInt(referral_balance.replace(/,/g,"")),
            account:"referral"
        }
    }
  }


  $(function () {
    load_data()

    load_account_details()

    $("#withdraw").submit((e) => {
        e.preventDefault()

        let [payment_type, amount, wallet_address] = lowercase($("#payment-type").val(), $(".amount").val(), $(".wallet-address").val())

        let status = empty(payment_type, amount, wallet_address).status;
        if(status){
            let response = sort_balance()
            if(response.value > balance){
                notification.warning("Amount greater than balance")
            }else{
                request_withdrawal(payment_type, amount, wallet_address, response.account, response.value)
            }
        }else{
            notification.danger("Must fill in all fields")
        }
    })
  })