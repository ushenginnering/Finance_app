// function to create html table template
let create_table_html = (items, others, extra, showNoti) => {
  items = JSON.parse(items);
  // others = JSON.parse(others)
  let table_append_html = ``;
  if (items.length > 0) {
    items?.forEach((item, index) => {
      table_append_html += `
        <tr>
        <td class="sn">${(index + 1)}</td>
        <td class="full_name">${others[index]?.fullname}</td>
        <td class="email">${others[index]?.mail}</td>
        <td>${item?.investment_plan}</td>
        <td>${extra[index]?.percentage}</td>
        <td>${extra[index]?.plan_duration} Days</td>
        <td>${new Date(item?.created_at).toJSON()?.slice(0,10)}</td>
        <td>${new Date(item?.end_date).toJSON()?.slice(0,10)}</td>
        <td>${(item?.amount_invested)?.toLocaleString()}</td>
        <td>${item?.transaction_status}</td>
        <td>
        <div>
        <a href="javascript:void(0)" data-id="${item?.transaction_id}" class="decline-investment" onClick="handle_action('decline', ${
        item?.transaction_id})">
        <span title="Decline Investment "class="btn btn-warning icon-cancel decline-icon" ></span>
        </a>
        <a href="#" data-id="${item?.transaction_id} class="approve-investment" onClick="handle_action('approve', ${
        item?.transaction_id})">
        <span title="Approved Investment"class="btn btn-success icon-check2 accept-icon-${item?.transaction_id}">
        </span>
        </a>
        </div>
        </td>
        </tr>
       `;
    });

    updateUI.selector.all(["#invest_data", table_append_html]);
  } else {
    setTimeout(() => {
      notification.warning("No data available");
    }, 4000);
    $("#invest_data").html("");
  }
};

// function to approve a investment
let handle_approve_deposit = (id) => {
  $(`.accept-icon-${id}`).removeClass("icon-check2").text("...");
  // console.log("clicked approve", id);
  router
    .post(
      "http://localhost/finance_app/API'S/ADMIN%20API/approve_investment.php",
      {
        transaction_id: id,
        approve: true,
      },
      () => $(`.accept-icon-${id}`).addClass("icon-check2").text("")
    )
    .then((data) => {
      data = parse_json_response(data);
      if (data.status) {
        if (data.message) {
          notification.success(data?.message);
          load_data("pending", false);
        }
      } else {
        notification.warning(data?.message);
      }
    })
    .catch((err) => {
      console.error(err);
    });
};

// function to decline a investment
let handle_decline_deposit = (id) => {
  // console.log("clicked decline", id);
  $(`.decline-icon-${id}`).removeClass("icon-cancel").text("...");
  // console.log("clicked approve", id);
  router
    .post(
      "http://localhost/finance_app/API'S/ADMIN%20API/decline_investment.php",
      {
        transaction_id: id,
      },
      () => $(`.accept-icon-${id}`).addClass("icon-cancel").text("")
    )
    .then((data) => {
      data = parse_json_response(data);
      if (data.status) {
        if (data.message) {
          notification.success(data?.message);
          load_data("pending", false);
        }
      } else {
        notification.warning(data?.message);
      }
    })
    .catch((err) => {
      console.error(err);
    });
};

// function to load data on when the page is ready
let load_data = (filter, showNoti = true) => {
  // custom api to send an ajax request to the server
  router
    .get(
      `http://localhost/finance_app/API'S/ADMIN%20API/display_investment_section.php?filter=${filter}`
    )
    .then((data) => {
      data = JSON.parse(data);
      if (data.status) {
        if (data.message) {
          create_table_html(
            data?.message,
            data?.others,
            data?.percentages,
            showNoti
          );
        }
      } else {
        notification.warning(data?.message);
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

