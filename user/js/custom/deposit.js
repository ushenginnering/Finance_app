let load_data = () => {
  // fetch wallets
  router
    .get(
      "http://localhost/finance_app/API'S/ADMIN%20API/company_wallet_json_format.php"
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
          <h4 class="pricing-title">${item?.wallet_name}</h4>
        </div>
        <img src="" width="100" src=""${item?.wallet_avatar}/>
        <p class="font-weight-700 text-center" style="overflow-wrap: break-word;" id="p${item?.id}">${item?.wallet_address}</p>
        <div class="pricing-footer">
          <a href="javascript:void(0)" onclick="copyToClipboard('#p${item?.id}')" class="btn btn-primary btn-lg">Copy Address</a>
        </div>
      </div>
    </div>`;
    });

    updateUI.selector.all([".wallet-info-container", card_append_html]);
  } else {
    notification.warning("No data available");
  }
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
let handle_uploading_proof = (formData) => {
  $.ajax({
    url: "http://localhost/finance_app/API'S/USER_API's/deposite_request.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: (data) => {
      data = JSON.parse(data)
      if(data?.status){
        notification.success(data?.message)
      }else{
        notification.danger(data?.message)
      }
    },
    error: (err) => {
      console.log(err);
    },
  });
};

// loads when the page is ready
$(function () {
  load_data();

  $("#deposit-form").submit((e) => {
    e.preventDefault();
    let [amount_deposited, payment_type] = lowercase(
      $("#amount-deposited").val(),
      $("#payment-type").val()
    );
    let file = document.getElementById("proof").files;
    console.log(empty(amount_deposited, payment_type, file?.length));
    let status = empty(amount_deposited, payment_type, file?.length).status;
    if (status) {
      var formData = new FormData();
      formData.append("amount_deposited", $("#amount-deposited").val());
      formData.append("deposit_type", $("#payment-type").val());
      formData.append(
        "deposit_proof",
        document.getElementById("proof").files[0]
      );
      handle_uploading_proof(formData);
    } else {
      notification.danger("Must fill all fields");
    }
  });
});
