const category_id = $("#category_id").val();
$("#btn-gravar").click(function (event) {
    event.preventDefault();

    const category_name_value = $("#category_name").val();
    const description_value = $("#description").val();

    const url = category_id > 0 ? '/categories/update' : "/categories/save"
    const method = category_id > 0 ? "PUT" : "POST";
    $.ajax({
        url: url,
        method: method,
        data: JSON.stringify({
            id: category_id,
            category_name: category_name_value,
            description: description_value,
        }),
        contentType: "application/json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (res) {
            if (res.success) {
                alert(res.success);
                window.location.href = "/categories";
            }
        },
        error: function (xhr, status, erro) {
            console.error("Erro:", erro);
            console.error("status:", status);
            console.error("xhr:", xhr);
        },
    });
});

$("#btn-delete").click(function () {
    $.ajax({
        url: `/categories/${category_id}`,
        method: "DELETE",
        contentType: "application/json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (res) {
            window.location.href = "/categories";
        },
        error: function (xhr, status, erro) {
            console.error("Erro:", erro);
            console.error("status:", status);
            console.error("xhr:", xhr);
        },
    });
});
