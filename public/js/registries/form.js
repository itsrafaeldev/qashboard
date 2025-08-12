const registry_id = $("#registry_id").val();
console.log("registry_id: ", registry_id);
$("#btn-gravar").click(function (event) {
    event.preventDefault();

    const registry_name_value = $("#registry_name").val();
    const description_value = $("#description").val();
    const status_value = $("#status").val();
    const registry_date_value = $("#registry_date").val();
    const amount_value = $("#amount").val();
    const transaction_id_value = $("#transaction_id").val();
    const category_id_value = $("#category_id").val();
    const quantity_installment_value = $("#quantity_installment").val();


    $.ajax({
        url: "/registries/save",
        method: "POST",
        data: JSON.stringify({
            id: registry_id,
            registry_name: registry_name_value,
            description: description_value,
            status: status_value,
            registry_date: registry_date_value,
            amount: amount_value,
            quantity_installment: quantity_installment_value,
            transaction_id: transaction_id_value,
            category_id: category_id_value,
        }),
        contentType: "application/json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (res) {
            if (res.success) {
                alert(res.success);
                window.location.href = "/registries";
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
        url: `/registries/${registry_id}`,
        method: "DELETE",
        contentType: "application/json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (res) {
            window.location.href = "/registries";
        },
        error: function (xhr, status, erro) {
            console.error("Erro:", erro);
            console.error("status:", status);
            console.error("xhr:", xhr);
        },
    });
});
