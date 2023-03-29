let load_data = () => {
    router.get("http://localhost/finance_app/API'S/USER_API's/referrals.php")
    .then(data => {
        data = JSON.parse(data)
        if(data?.status){
            update_referrals(data?.message)
        }
    }).catch(err => {

    })
}
let update_referrals = (details) => {
    if(details){
        updateUI.selector.all(
            ["#referral-bonus", Number(parseInt(details?.referral_bonus)) || 0], 
            ["#total-referrals", Number(parseInt(details?.total_referrals?.total_referrals)) || 0],
        )
        console.log(details)
        $("#p1").attr("href", details?.referral_link).text(details?.referral_link)
    }
}

$(function(){
load_data()
})