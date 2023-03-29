var checkers = []
var balance = 0;
let load_investment_plans = () => {
  router
    .get(
      "http://localhost/finance_app/API'S/ADMIN%20API/company_investment_plans_json_format.php"
    )
    .then((data) => {
      data = JSON.parse(data);
      if (data?.status) {
        create_wallet_card_template(data?.message);
        create_select_option_template(data?.message);
      }
    })
    .catch((err) => {
      console.log(err);
    });
};

let create_wallet_card_template = (items) => {
  items = JSON.parse(items);
  let card_append_html = ``;
  if (items.length > 0) {
    items?.forEach((item, index) => {
      card_append_html += `
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
        <div class="pricing-plan">
            <div class="pricing-header">
                <h4 class="pricing-title">${item?.plan_name}</h4>
                <div class="pricing-save">${
                  item?.percentage
                }% daily for ${item?.plan_duration}days</div>
            </div>
            <ul class="pricing-features">
                <li>Minimun deposit : $${item?.minimum_value?.toLocaleString()}</li>
                <li>Maximum deposit: $${item?.maximum_value?.toLocaleString()}</li>
                <li>10% refferal commission</li>
            </ul>
        </div>
    </div>`;
    checkers.push({
      plan_name:item?.plan_name,
      min:item?.minimum_value,
      max:item?.maximum_value,
      percentage:item?.percentage,
    })
    });

    updateUI.selector.all([".invest-info-container", card_append_html]);
  } else {
    notification.warning("No data available");
  }
};

let create_select_option_template = (items) => {
  items = JSON.parse(items);
  let options_append_html = ``;
  if (items.length > 0) {
    items?.forEach((item) => {
      options_append_html += `<option value="${item?.plan_name?.toLowerCase()}">${item?.plan_name?.toUpperCase()}</option>`;
    });

    updateUI.selector.all(["#investment-plan", options_append_html]);
  } else {
    notification.warning("No data available");
  }
};

let suscribe_investment_plan = (amount_invested, investment_plan, profit) => {
    loading.start_loading(".invest-amount");

    router
      .post(
        `http://localhost/finance_app/API'S/USER_API's/investment_request.php`,
        {
          amount_invested,
          investment_plan,
          profit,
        },
        () => {
          loading.stop_loading(".invest-amount", "Start investment");
        }
      )
      .then((data) => {
        data = parse_json_response(data);
        if (data?.status) {
          notification.success(data?.message)
          load_account_details()
        } else {
          notification.danger(data?.message || "error");
        }
      })
      .catch((err) => {
        console.log(err);
      });
}

let check_min_max = (amount, plan_name) => {
  let plan = checkers.find((plans) => plans?.plan_name === plan_name?.toLowerCase())
  // console.log(plan, amount);
  if(parseInt(amount) < parseInt(plan?.min)){
    notification.warning("Amount to small")
    return {
      status:false
    }
  }
  if(parseInt(amount) > parseInt(plan?.max)){
    notification.warning("Amount to big")
    return {
      status:false,
    }
  }
  let profit = (parseInt(amount) * parseInt(plan?.percentage)) / 100;
  return {
    status:true,
    profit,
  }

}

let load_account_details = () => {
  router
    .get(
      "http://localhost/finance_app/API'S/USER_API's/display_user_account_info.php"
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
    ["#account-balance", Number(details?.total_balance)?.toLocaleString()],
  );
  balance = details?.total_balance;
  console.log(balance)
};

let validate_amount = (balance) => {
  if(balance > 0){
    return true;
  }
  else{
    return false
  }
}
$(function () {
  load_investment_plans();
  
  load_account_details()

  $("#invest").submit((e) => {
    e.preventDefault();

    let [invest_plan, invest_amount] = lowercase(
      $("#investment-plan").val(),
      $(".invest-amount").val()
    );
    let status = empty(invest_amount, invest_plan).status;
    if (status) {
      if(validate_amount(balance)){
        let amount_validity = check_min_max(invest_amount, invest_plan);
        if(amount_validity.status){
          suscribe_investment_plan(invest_amount, invest_plan, amount_validity?.profit);
        }
      }else{
        notification.danger("Balance not enough");

      }
    } else {
      notification.danger("Must fill all field");
    }
  });
});
