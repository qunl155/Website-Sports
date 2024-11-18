$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function removeRow(id, url) {
    if (
        confirm(
            "Bạn có chắc chắn muốn xoá không (Hành động này không thể khôi phục)"
        )
    ) {
        $.ajax({
            type: "DELETE",
            datatype: "JSON",
            data: { id },
            url: url,
            success: function (result) {
                if (result.check == true) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert("Xoá lỗi vui lòng thử lại!");
                }
            },
        });
    }
}

// Upload file
$("#upload").change(function () {
    const form = new FormData();
    form.append("file", $(this)[0].files[0]);
    $.ajax({
        processData: false,
        contentType: false,
        type: "POST",
        datatype: "JSON",
        data: form,
        url: "/admin/upload/services",
        success: function (results) {
            if (results.error == false) {
                $("#image_show").html(
                    '<a href="' +
                        results.url +
                        '"target="_blank">' +
                        '<img src="' +
                        results.url +
                        '"width="100px"></a>'
                );

                $("#thumb").val(results.url);
            } else {
                alert("Upload File hình lỗi");
            }
        },
    });
});
