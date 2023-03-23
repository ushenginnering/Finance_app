let load_data = () => {
  router
    .get("../../../tabadmin/test.php")
    .then((data) => {
      console.log(data);
    })
    .catch((err) => {
      console.log(err);
    });
};

let handle_uploading_proof = (formData) => {
  $.ajax({
    url: "http://localhost/finance_app/API'S/USER_API's/deposite_request.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: (data) => {
      console.log(data);
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
      let file =  document.getElementById("proof").files
    let status = empty(amount_deposited, payment_type, file?.length).status;
    if (status) {
      var formData = new FormData();
      formData.append("amount_deposited", $("#amount-deposited").val());
      formData.append("deposit_type", $("#payment-type").val());
      formData.append(
        "deposit_proof",
        document.getElementById("proof").files[0]
      );
      handle_uploading_proof(formData)
    }
    notification.danger("Must fill all fields");
  });
});
