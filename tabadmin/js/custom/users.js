// html table template 
let create_table_html = (items) => {
    let table_append_html = ``;
    if (items.length > 0) {
      items?.forEach((item, index) => {
        table_append_html += `<tr> 
            <td class="sn">${index + 1}</td>
            <td class="full_name">${item.fullname}</td>
            <td class="email">${item.mail}</td>
            <td class="phone-no">${item?.phone}</td>
            <td class="country">${item?.country}</td>
            <td class="status">${item?.account_status}</td>
            <td class="action_btns">
            <div>
            <span title="delete user investment at your own risk" class="btn btn-danger icon-delete delete-user" onClick="handle_action(${
          item?.user_id
        })">
        </span>
            <a href="user_details.php?user_id=${item?.user_id}">
            <span title="delete user investment at your own risk" class="btn btn-info icon-eye">
            </span></a>
            </div>
            </td>
            </tr>`;
      });
      updateUI.selector.all(["#user-data", table_append_html]);
    }else{
      notification.warning("No data available.");
    }
  };

let handle_action = (id) => {
  console.log('delete clicked');
}

// function to load data when page loads with filter
let load_data = (filter) => {
    router
      .get(`http://localhost/finance_app/API'S/USER_API's/users_json_wallet.php?filter=${filter}`)
      .then((data) => {
        data = JSON.parse(data)
        console.log(data);
        if (data.status) {
          if (data.message) {
            create_table_html(data.message);
          }
        }else{
          notification.warning(data?.message)
        }
      })
      .catch((err) => {
        console.error(err);
      });
  };

  // function to fire when the page loads
  $(function (e) {
    load_data("ACTIVE");

    // onchange event to trigger when the filter is changed
    document.getElementById("filter").addEventListener("change", (e) => {
      let filter_text = e.target.value;
      load_data(filter_text);
    });
  });


  // create_table_html([
  //   {
  //     user_id: 1,
  //     fullname: "Jehoshaphat",
  //     mail: "segunade041@gmail.com",
  //     phone: "09078785538",
  //     country: "Nigeria",
  //     account_status: "active",
  //   },
  //   {
  //     user_id: 2,
  //     fullname: "segun",
  //     mail: "jeoh@gmail.com",
  //     phone: "09043781138",
  //     country: "Argentina",
  //     account_status: "suspended",
  //   },
  // ]);
  