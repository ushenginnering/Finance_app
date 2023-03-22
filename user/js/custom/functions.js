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
        .text(message)
        .addClass("alert-warning alert-dismissible fade show")
        .css({ width: "fit-content" })
        .show();

      setTimeout(() => {
        $(".__notification")
          .hide()
          .text("")
          .removeClass("alert-warning alert-dismissible fade show");
      }, 10000);
    }
  },
  danger: (message) => {
    if ($(".__notification")) {
      $(".__notification")
        .text(message)
        .addClass("alert-danger alert-dismissible fade show")
        .css({ width: "fit-content" })
        .show();

      setTimeout(() => {
        $(".__notification")
          .text("")
          .removeClass("alert-danger alert-dismissible fade show")
          .hide();
      }, 10000);
    }
  },
  success: (message) => {
    if ($(".__notification")) {
      $(".__notification")
        .text(message)
        .addClass("alert-success alert-dismissible fade show")
        .css({ width: "fit-content" })
        .show();

      setTimeout(() => {
        $(".__notification")
          .text("")
          .removeClass("alert-success alert-dismissible fade show")
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
        message: "Passwords must be 8-20 characters long.",
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
