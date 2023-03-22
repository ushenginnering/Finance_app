let load_data = () => {
  router
    .get("../../../tabadmin/test.php")
    .then((data) => {
      console.log(data);
      if (data?.status) {
        update_overview(data?.message);
      }
    })
    .catch((err) => {
      console.log(err);
    });
};

let update_overview = (details) => {
  updateUI.selector.all();
};

$(function () {
  load_data();
});
