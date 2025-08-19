$(document).ready(() => {
    $.ajax({
        url: "/dashboards/data",
        method: "GET",
        contentType: "application/json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (res) {
            console.log(res)
        },
        error: function (xhr, status, erro) {
            console.error("Erro:", erro);
            console.error("status:", status);
            // console.error("xhr:", xhr);
        },
    });
});
