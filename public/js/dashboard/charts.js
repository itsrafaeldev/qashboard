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
            registriesPercentPerCategories(res)
            kpiRevenues(res)
            kpiExpenses(res)
            kpiBalance(res)
            kpiRegistriesPaid(res)
        },
        error: function (xhr, status, erro) {
            console.error("Erro:", erro);
            console.error("status:", status);
            // console.error("xhr:", xhr);
        },
    });
});

function kpiRevenues(res) {
    console.log("KPI REVENUES: ", res.revenues);
}

function kpiExpenses(res) {
    console.log("KPI EXPENSES: ", res.expenses);
}
function kpiBalance(res) {
    console.log("KPI BALANCE: ", res.balance);
}
function kpiRegistriesPaid(res) {
    console.log(
        "KPI REGISTRIES PAID IN COMPETENCE 2025-08:  ",
        res.quantityRegistriesPaid.registriesPaid
    );
    console.log(
        "KPI TOTAL REGISTRIES IN COMPETENCE 2025-08: ",
        res.quantityRegistriesPaid.registriesTotal
    );

    console.log(
        "KPI REGISTRIES PAID PERCENT IN COMPETENCE 2025-08: ",
        res.quantityRegistriesPaid.registriesPaidPercent
    );

}

function registriesPercentPerCategories(res) {
    console.log("PIZZA REGISTRIES PER CATEGORIES (%): ", res.registriesPerCategories);
}

