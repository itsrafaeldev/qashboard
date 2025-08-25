const registry_id = $("#registry_id").val();
console.log("registry_id: ", registry_id);
$("#btn-gravar").click(function (event) {
    event.preventDefault();

    const registry_name_value = $("#registry_name").val();
    const description_value = $("#description").val();
    const status_value = $("#status").val();
    const registry_date_value = $("#registry_date").val();
    const amount_value = $("#amount").val();
    const transaction_id_value = $("#transaction_id").val() == 'RECEITA' ? 1 : 2;
    const category_id_value = $("#category_id").val();
    const quantity_installment_value = $("#quantity_installment").val();
    const is_credit_card_value = $("#is_credit_card").val() == 1 ? true : false;
    const credit_card_id_value = $("#credit_cards").val();

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
            is_credit_card: is_credit_card_value,
            credit_card_id: credit_card_id_value
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

$(document).ready(function () {
    if (registry_id > 0) {
        $("#amount").prop("disabled", true).css("cursor", "not-allowed");
        $("#quantity_installment")
            .prop("disabled", true)
            .css("cursor", "not-allowed");
    }
    $("#quantity_installment").prop("disabled", true);

});

$("#is_credit_card, #for_credit_card").click(() => {
    // $isMarked = $("#is_credit_card").val();
    if ($("#is_credit_card").prop("checked")) {
        $("#credit_cards").prop("hidden", false);
        $("#for_credit_card").prop("hidden", false);
        $("#quantity_installment").prop("disabled", false);

    } else {
        $("#is_credit_card").prop("value", 0);
        $("#credit_cards").prop("hidden", true);
        $("#for_credit_card").prop("hidden", true);
        $("#quantity_installment").prop("disabled", true);


    }
});
