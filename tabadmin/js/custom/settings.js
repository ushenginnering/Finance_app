// function to fetch investment plans from server
let load_investment_plans = () => {
  router
    .get(
      "http://localhost/finance_app/API'S/ADMIN%20API/company_investment_plans_json_format.php"
    )
    .then((data) => {
      data = JSON.parse(data);
      if (data?.status) {
        create_investment_table_template(data?.message);
      }
    })
    .catch((error) => {
      console.log(error);
    });
};

// function to fetch wallets from server
let load_wallets = () => {
  router
    .get(
      "http://localhost/finance_app/API'S/ADMIN%20API/company_wallet_json_format.php"
    )
    .then((data) => {
      data = JSON.parse(data);
      if (data?.status) {
        create_wallet_table_template(data?.message);
      }
    })
    .catch((error) => {
      console.log(error);
    });
};

// table template
let create_investment_table_template = (items) => {
  items = JSON.parse(items);
  let table_append_html;
  if (items.length > 0) {
    items?.forEach((item, index) => {
      table_append_html += `<tr>
          <td>${index + 1}</td>
          <td>${item?.plan_name}</td>
          <td>${item?.percentage}%</td>
          <td>${item?.plan_duration} Days</td>
          <td>${item?.minimum_value}</td>
          <td>${item?.maximum_value}</td>
          <td>
              <div>
                  <a href="javascript:void(0)">
                  <span title="Delete Plan from system"
                    class="btn btn-danger icon-delete" onClick="handle_plan_delete(${
                      item?.id
                    })">
                    </span>
                          </a>
              </div>
          </td>
      </tr>`;
    });

    updateUI.selector.all([".investment_data", table_append_html]);
  } else {
    notification.warning("No data available");
  }
};

// table template
let create_wallet_table_template = (items) => {
  items = JSON.parse(items);
  let table_append_html;
  if (items.length > 0) {
    items?.forEach((item, index) => {
      table_append_html += `<tr>
          <td>${index + 1}</td>
        <td>${item?.wallet_name}</td>
        <td><img src="${item?.wallet_avatar}" width="50" alt="${
        item?.wallet_name
      } image"/></td>
        <td>${item?.wallet_address}</td>
        <td>
        <div>
            <a href="javascript:void(0)"><span title="Delete Wallet from system"
                    class="btn btn-danger icon-delete" onClick="handle_wallet_delete(${
                      item?.id
                    })"></span></a>
        </div>
    </td>
      </tr>`;
    });

    updateUI.selector.all([".wallet_data", table_append_html]);
  } else {
    notification.warning("No data available");
  }
};

// handle delete event on investment plan
let handle_plan_delete = (id) => {
  console.log("delete plan");
};

// handle delete event on wallets
let handle_wallet_delete = (id) => {
  console.log("delete wallet");
};

// function to handle add investment
let handle_add_investment_plan = (
  plan_name,
  percentage,
  plan_duration,
  minimum_value,
  maximum_value
) => {
  loading?.start_loading("#add-investment-btn");

//   ajax request
  router
    .post(
      "http://localhost/finance_app/API'S/ADMIN%20API/create_new_investment_plan.php",
      {
        create_new_investment_plan: true,
        plan_name,
        percentage,
        plan_duration,
        minimum_value,
        maximum_value,
      },
      () => loading.stop_loading("#add-investment-btn", "Update Changes")
    )
    .then((data) => {
      data = JSON.parse(data);
      if (data?.status) {
        // if succesful
        notification.success(data?.message);

        // call function to load investments
        load_investment_plans()
      } else {
        notification.danger(data?.message);
      }
    });
};

// function to add new wallet 
let handle_add_wallet = (formData) => {
    // showing loading state on button
    loading.start_loading(".add-wallet-btn")
    $.ajax({
        url: "http://localhost/finance_app/API'S/ADMIN%20API/create_new_company_wallet.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: (data) => {
            loading.stop_loading(".add-wallet-btn", "update changes")
            data = JSON.parse(data);
            if (data?.status) {
              // if succesful
              notification.success(data?.message);
      
              // call function to load wallets
              load_wallets()
            } else {
              notification.danger(data?.message);
            }
        },
        error: (err) => {
            loading.stop_loading(".add-wallet-btn", "update changes")
            notification.warning("something went wrong. try refreshing page")
          console.log(err);
        },
      });
}

// function to run when page loads
$(function () {
  load_investment_plans();

  load_wallets();

  // event to handle submition
  $("#add-investment").submit((e) => {
    e.preventDefault();
    // process data
    let [plan_name, percentage, plan_duration, minimum_value, maximum_value] =
      lowercase(
        $(".add-plan-name").val(),
        $(".add-percentage").val(),
        $(".add-duration").val(),
        $(".add-minimum-value").val(),
        $(".add-maximum-value").val()
      );
      
      let status = empty(
      plan_name,
      percentage,
      plan_duration,
      minimum_value,
      maximum_value
    ).status;

    if (status) {
        // if all the fields are not empty 
      handle_add_investment_plan(
        plan_name,
        percentage,
        plan_duration,
        minimum_value,
        maximum_value
      );
    } else {
      notification.danger("Must fill all fields");
    }
  });

// event to add submition
  $("#add-wallet").submit((e) => {
    e.preventDefault()
    let [wallet_name, wallet_address] = lowercase($(".add-wallet-name").val(), $(".add-wallet-address").val())

    let wallet_avatar = document.getElementsByClassName("add-wallet-avatar")[0].files
    let status = empty(wallet_name, wallet_address, wallet_avatar?.length).status

    if(status){
        let formData = new FormData()

        formData.append("wallet_name", $(".add-wallet-name").val())
        formData.append("wallet_address", $(".add-wallet-address").val())
        formData.append("create_new_company_wallet", true)
        formData.append("wallet_avatar", wallet_avatar[0])
        handle_add_wallet(formData)
    }else{
        notification.danger("Fill in all field")
    }
  })
});
