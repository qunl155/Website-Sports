$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
function loadMore() {
    // const load = $("#load").val();
    // $.ajax({
    //     type: "POST",
    //     dataType: "JSON",
    //     data: { load },
    //     url: "/services/load-product",
    //     success: function (result) {
    //         console.log(result);
    //     },
    // });
    console.log(1);
}
