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
                }% daily for 10days</div>
            </div>
            <ul class="pricing-features">
                <li>Minimun deposit : $${item?.minimum_value?.toLocaleString()}</li>
                <li>Maximum deposit: $${item?.maximum_value?.toLocaleString()}</li>
                <li>10% refferal commission</li>
            </ul>
        </div>
    </div>`;
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

let suscribe_investment_plan = (amount_invested, investment_plan) => {
    loading.start_loading(".invest-amount");

    router
      .post(
        `http://localhost/finance_app/API'S/USER_API's/investment_request.php`,
        {
          amount_invested,
          investment_plan,
        },
        () => {
          loading.stop_loading(".invest-amount", "Start investment");
        }
      )
      .then((data) => {
        data = parse_json_response(data);
        if (data?.status) {
          notification.success(data?.message)
        } else {
          notification.danger(data?.message || "error");
        }
      })
      .catch((err) => {
        console.log(err);
      });
}

$(function () {
  load_investment_plans();

  $("#invest").submit((e) => {
    e.preventDefault();

    let [invest_plan, invest_amount] = lowercase(
      $("#investment-plan").val(),
      $(".invest-amount").val()
    );
    let status = empty(invest_amount, invest_plan).status;
    if (status) {
      suscribe_investment_plan(invest_amount, invest_plan);
    } else {
      notification.danger("Must fill all field");
    }
  });
});
