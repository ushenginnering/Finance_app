let empty = (...args) => {
  let emptyArr = [];
  if (args.length > 0) {
    args.forEach((arg, index) => {
      if (arg === "" || arg === 0) {
        emptyArr.push(index + 1);
      }
    });
    if (emptyArr.length !== 0) {
      return {
        status: false,
        index: emptyArr,
      };
    } else {
      return {
        status: true,
        index: emptyArr,
      };
    }
  } else {
    return {
      status: false,
    };
  }
};
let notification = {
  warning: (message) => {
    if ($(".__notification")) {
      $(".__notification")
      .removeClass("alert-success")
      .removeClass("alert-danger")
        .text(message)
        .addClass("alert-warning")
        .css({ width: "fit-content" })
        .show();
        $(".__notification")[0].scrollIntoView({
          behavior:"smooth",
          block:"end"
        })
      setTimeout(() => {
        $(".__notification")
          .hide()
          .text("")
          .removeClass("alert-warning");
      }, 10000);
    }
  },
  danger: (message) => {
    if ($(".__notification")) {
      $(".__notification")
      .removeClass("alert-warning")
        .removeClass("alert-success")
        .text(message)
        .addClass("alert-danger")
        .css({ width: "fit-content" })
        .show();
      $(".__notification")[0].scrollIntoView({
        behavior: "smooth",
        block: "end",
      });

      setTimeout(() => {
        $(".__notification")
          .text("")
          .removeClass("alert-danger")
          .hide();
      }, 10000);
    }
  },
  success: (message) => {
    if ($(".__notification")) {
      $(".__notification")
      .removeClass("alert-warning")
      .removeClass("alert-danger")
        .text(message)
        .addClass("alert-success")
        .css({ width: "fit-content" })
        .show();
      $(".__notification")[0].scrollIntoView({
        behavior: "smooth",
        block: "end",
      });
      setTimeout(() => {
        $(".__notification")
          .text("")
          .removeClass("alert-success")
          .hide();
      }, 10000);
    }
  },
};
let router = {
  post: (
    url,
    body,
    alwaysFnc = () => {
      console.log("done");
    }
  ) => {
    return new Promise((resolve, reject) => {
      $.post(url, body)
        .done((data) => {
          resolve(data);
        })
        .fail((error) => {
          reject(error);
        })
        .always((data, status, x) => {
          alwaysFnc();
        });
    });
  },
  get: (
    url,
    alwaysFnc = () => {
      console.log("done");
    }
  ) => {
    return new Promise((resolve, reject) => {
      $.get(url)
        .done((data) => {
          resolve(data);
        })
        .fail((error) => {
          reject(error);
        })
        .always((data, status, x) => {
          alwaysFnc();
        });
    });
  },
};
let updateUI = {
  selector: {
    all: (...args) => {
      if (args.length !== 0) {
        args.forEach((arg) => {
          let id = arg[0];
          let message = arg[1];
          if (empty(id, message).status) {
            $(id).html(message);
          }
        });
      }
    },
    apppend: (...args) => {
      if (args.length !== 0) {
        args.forEach((arg) => {
          let id = arg[0];
          let message = arg[1];
          if (empty(id, message).status) {
            $(id).append(message);
          }
        });
      }
    },
  },
  element: {
    all: (...args) => {
      if (args.length !== 0) {
        args.forEach((arg) => {
          let element = arg[0];
          let message = arg[1];
          if (empty(element, message).status) {
            element.html(message);
          }
        });
      }
    },
    append: (...args) => {
      if (args.length !== 0) {
        args.forEach((arg) => {
          let element = arg[0];
          let message = arg[1];
          if (empty(element, message).status) {
            element.append(message);
          }
        });
      }
    },
  },
};
let validate_passwords = (password1, password2, length_of_passwords = 0) => {
  if (length_of_passwords > 0) {
    if (
      password1.length < length_of_passwords ||
      password2.length < length_of_passwords
    ) {
      return {
        status: false,
        message: `Passwords must be ${length_of_passwords}-20 characters long.`,
      };
    } else {
      if (password1 === password2) {
        return {
          status: true,
        };
      } else {
        return {
          status: false,
          message: "Passwords must be the same",
        };
      }
    }
  }
};
let loading = {
  start_loading: (id, text = "Loading...") => {
    $(id).attr("value", text).attr("disabled", true).addClass("disable");
  },
  stop_loading: (id, text = "") => {
    $(id).attr("value", text).removeAttr("disabled").removeClass("disable");
  },
};

let lowercase = (...args) => {
  let lowerArr = [];
  if (args.length > 0) {
    args.forEach((arg) => {
      if (typeof arg === "string" || arg !== "") {
        lowerArr?.push(arg?.trim()?.toLowerCase());
      } else {
        lowerArr?.push(arg);
      }
    });
    return lowerArr;
  }
};

let parse_json_response = (jsonString, searchTerm="status") => {
    const regex = /{[^{}]*}/g;
    const matches = jsonString.match(regex) || [];
    let json_match = matches.filter(match => match.includes(searchTerm))
    function isValidJson(jsonString) {
      try {
        JSON.parse(jsonString);
        return true;
      } catch (error) {
        return false;
      }
    }
    if(matches?.length > 0){
      if(isValidJson(json_match[0])){
        return JSON.parse(json_match[0])
      }else{
        return []
      }
    }else{
      return []
    }
  }

let create_notification_card = (items) => {
  items = JSON.parse(items);
  console.log(items);
  let card_append_html = ``;
  if (items.length > 0) {
    items?.forEach((item) => {
      card_append_html += `
      <li>
      <a href="javascript:void(0)" style="cursor:default;">
        <div class="details">
          <div class="noti-title mb-2"><b>${(item?.TITLE)?.toUpperCase()}</b></div>
          <div class="noti-details">${item?.CONTENT}</div>
          <date class="noti-date">${new Date(item?.DATE_TIME).toLocaleDateString()}</date>
        </div>
        <span class="icon-cancel" style="cursor:pointer;" onClick="delete_notification('${item?.notification_id}')"></span>
      </a>
    </li>`;
    })
    updateUI.selector.all([".header-notifications", card_append_html])
  }
} 

let delete_notification = (id) => {
  router.post("../../../../Finance_app/API'S/USER_API's/close_notification.php", {
    notification_id:id,
  })
  .then(data => {
      data = JSON.parse(data)
      if(data?.status){
        get_notifications()
      }
  })
  .catch(err => {
      console.log(err);
  })
}
  let get_notifications = () => {
    router.get("../../../../Finance_app/API'S/USER_API's/top_five_notice.php")
    .then(data => {
        data = JSON.parse(data)
        if(data?.status){
          create_notification_card(data?.message)
        }else{
          $(".header-notifications").html(` <li>
          <a href="javascript:void(0)" style="cursor:default;">
            <div class="details">
              <div class="noti-details">No New Notification</div>
            </div>
          </a>
        </li>`)
        }
    })
    .catch(err => {
        console.log(err);
    })

    router.get("../../../../Finance_app/API'S/USER_API's/open_notification_count.php")
    .then(data => {
        data = JSON.parse(data)
        if(data?.status){
          if(data?.message < 100){
            $(".count-label").text(data?.message)
          }else{
            $(".count-label").text("99+")
          }
        }else{
          $(".count-label").text("0")
        }
    })
    .catch(err => {
        console.log(err);
    })
  }
  get_notifications()