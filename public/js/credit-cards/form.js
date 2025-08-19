const credit_card_id = $("#credit_card_id").val();
$("#btn-gravar").click(function (event) {
    event.preventDefault();

    const name_value = $("#name").val();
    console.log("324234: ",name_value);
    const final_number_value = $("#final_number").val();
    const closing_day_value = $("#closing_day").val();


    const url = credit_card_id > 0 ? "/credit-cards/update" : "/credit-cards/save";
    const method = credit_card_id > 0 ? "PUT" : "POST";
    $.ajax({
        url: url,
        method: method,
        data: JSON.stringify({
            id: credit_card_id,
            name: name_value,
            final_number: final_number_value,
            closing_day: closing_day_value,
        }),
        contentType: "application/json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (res) {
            if (res.success) {
                alert(res.success);
                window.location.href = "/credit-cards";
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
        url: `/credit-cards/${credit_card_id}`,
        method: "DELETE",
        contentType: "application/json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (res) {
            window.location.href = "/credit-cards";
        },
        error: function (xhr, status, erro) {
            console.error("Erro:", erro);
            console.error("status:", status);
            console.error("xhr:", xhr);
        },
    });
});
