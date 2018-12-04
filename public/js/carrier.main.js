$("#screener").click(function () {
    if (!$(".screener").hasClass("d-none")) {
        if (confirm("Are you sure that yo want to edit personal inforamtion?"))
            $(".screener").addClass("d-none");
    }
});