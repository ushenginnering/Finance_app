// function to create html table template
let create_table_html = (items, others) => {
    items = JSON.parse(items)
    // others = JSON.parse(others)
    let table_append_html = ``;
    if (items.length > 0) {
      items?.forEach((item, index) => {
        table_append_html += `<tr> 
            <td class="sn">${index + 1}</td>
            <td class="full_name">${others[index]?.fullname}</td>
            <td class="email">${others[index]?.mail}</td>
            <td class="amount"><span>$</span>${parseInt(
              Number(item.amount_withdrawn)
            )?.toLocaleString()}</td>
            <td class="date">${new Date(item?.date_time)
              .toJSON()
              .slice(0, 10)}</td>
            <td class="wallet-address">${item?.withdrawal_address}</td>
            <td class="withdrawal_type">${item?.withdrawal_type}</td>
            <td class="status">${item?.transaction_status}</td>
            <td class="action_btns">
            <div>
            <a href="javascript:void(0)" data-id="${
              item?.withdrawal_id
            }" class="decline-withdrawal" onClick="handle_action('decline', ${
          item?.withdrawal_id
        })">
            <span title="Decline Withdrawal"class="btn btn-warning icon-cancel decline-icon" >
            </span>
            </a>
            <a href="javascript:void(0)" data-id="${
              item?.withdrawal_id
            } class="approve-withdrawal" onClick="handle_action('approve', ${
          item?.withdrawal_id
        })">
            <span title="Approved Withdrawal"class="btn btn-success icon-check2 accept-icon-${item?.transaction_id}">
            </span>
            </a>
            </div>
            </td>
            </tr>`;
      });
  
      updateUI.selector.all(["#withdrawal_data", table_append_html]);
    }else{
      setTimeout(() => {
        notification.warning('No data available')
      }, 3000);
      $("#deposit_data").html("")
    }
  };
  
  
  let show_img_popup = (e) => {
    let btn = $(e);
    let src = btn.prev('img').attr('src')
    document.getElementById('show-img-popup').src = src
  }
  
  // function to approve a deposit
  let handle_approve_deposit = (id) => {
    $(`.accept-icon-${id}`).removeClass("icon-check2").text("...")
    // console.log("clicked approve", id);
    router.post("http://localhost/finance_app/API'S/ADMIN%20API/approve_withdrawal.php", {
      withdraw_id:id,
      approve:true,
    }, () => $(`.accept-icon-${id}`).addClass("icon-check2").text(""))
    .then((data) => {
      data = parse_json_response(data)
      if (data.status) {
        if (data.message) {
          notification.success(data?.message)
          load_data('pending', false)
        }
      }else{
        notification.warning(data?.message)
      }
    })
    .catch((err) => {
      console.error(err);
    });
  };
  
  // function to decline a deposit
  let handle_decline_deposit = (id) => {
    // console.log("clicked decline", id);
    $(`.decline-icon-${id}`).removeClass("icon-cancel").text("...")
    // console.log("clicked approve", id);
    router.post("http://localhost/finance_app/API'S/ADMIN%20API/decline_withdrawal.php", {
      withdrawal_id:id,
    }, () => $(`.accept-icon-${id}`).addClass("icon-cancel").text(""))
    .then((data) => {
      data = parse_json_response(data)
      if (data.status) {
        if (data.message) {
          notification.success(data?.message)
          load_data('pending', false)
        }
      }else{
        notification.warning(data?.message)
      }
    })
    .catch((err) => {
      console.error(err);
    });
  };
  
  // function to load data on when the page is ready
  let load_data = (filter) => {
    // custom api to send an ajax request to the server
    router
      .get(`http://localhost/finance_app/API'S/ADMIN%20API/display_withdrawal_section.php?filter=${filter}`)
      .then((data) => {
        data = JSON.parse(data)
        if (data.status) {
          if (data.message) {
            create_table_html(data?.message, data?.others);
          }
        }else{
          notification.warning(data?.message)
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
  
  
  