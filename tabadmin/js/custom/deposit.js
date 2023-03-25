// function to create html table template
let create_table_html = (items) => {
  items = JSON.parse(items)
  let table_append_html = ``;
  if (items.length > 0) {
    items?.forEach((item, index) => {
      table_append_html += `<tr> 
          <td class="sn">${index + 1}</td>
          <td class="full_name">${item.fullname}</td>
          <td class="email">${item.mail}</td>
          <td class="amount"><span>$</span>${parseInt(
            Number(item.amount_deposited)
          )?.toLocaleString()}</td>
          <td class="date">${new Date(item?.date_time)
            .toJSON()
            .slice(0, 10)}</td>
          <td class="payment_type">${item?.deposit_type}</td>
          <td class="deposit_proof">
          <img src="${item?.deposit_proof}" width="30"/>
          <button type="button" class="btn btn-info icon-eye" data-toggle="modal" data-target="#pop" onClick="show_img_popup(this) " id="show_proof_popup">
          </td>
          <td class="status">${item?.transaction_status}</td>
          <td class="action_btns">
          <div>
          <a href="#" data-id="${
            item?.user_id
          }" class="decline-deposit" onClick="handle_action('decline', ${
        item?.user_id
      })">
          <span title="Decline Deposit"class="btn btn-warning icon-cancel" >
          </span>
          </a>
          <a href="#" data-id="${
            item?.user_id
          } class="approve-deposit" onClick="handle_action('approve', ${
        item?.user_id
      })">
          <span title="Approved Deposit"class="btn btn-success icon-check2">
          </span>
          </a>
          </div>
          </td>
          </tr>`;
    });

    updateUI.selector.all(["#deposit_data", table_append_html]);
  }else{
    notification.warning('No data available')
  }
};

// function to approve a deposit
let handle_approve_deposit = (id) => {
  console.log("clicked approve");
};

let show_img_popup = (e) => {
  let btn = $(e);
  let src = btn.prev('img').attr('src')
  document.getElementById('show-img-popup').src = src
}
// function to decline a deposit
let handle_decline_deposit = (id) => {
  console.log("clicked decline");
};

// function to load data on when the page is ready
let load_data = (filter) => {
  // custom api to send an ajax request to the server
  router
    .get(`http://localhost/finance_app/API'S/ADMIN%20API/display_deposite_section.php?filter=${filter}`)
    .then((data) => {
      data = JSON.parse(data)
      if (data.status) {
        if (data.message) {
          create_table_html(data.message);
        }
      }
    })
    .catch((err) => {
      console.error(err);
    });
};

// handle button click events
let handle_action = (action, id) => {
  if (action.toLowerCase()?.trim() === "approve") {
    handle_approve_deposit(id);
  }
  if (action.toLowerCase()?.trim() === "decline") {
    handle_decline_deposit(id);
  }
};

// fetch data on load of the page
$(function () {
  load_data("pending");
});

// onchange function for filter
document.getElementById("filter").addEventListener("change", (e) => {
  let filter_text = e.target.value;
  load_data(filter_text);
});


// create_table_html([
//   {
//     user_id: 1,
//     fullname: "Jehoshaphat",
//     mail: "segunade041@gmail.com",
//     amount_deposited: "50000",
//     date_time: new Date(Date.now()),
//     deposit_type: "Etherium type",
//     transaction_status:'Success',
//     deposit_proof:'../../../../Finance_app/tabadmin/img/user24.png'
//   },
//   {
//     user_id: 2,
//     fullname: "Tee Jay",
//     mail: "jehoshaphatadediran@gmail.com",
//     amount_deposited: "100000",
//     date_time: new Date(Date.now()),
//     deposit_type: "Bitcoin type",
//     transaction_status:'Declined',
//     deposit_proof:'../../../../Finance_app/user/img/user12.png'

//   },
// ]);
