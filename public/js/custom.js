$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});


$(document).ready(function () {
    $(".addToCartBtn").click(function (e) {
        e.preventDefault();

        var product_id = $(this)
            .closest(".product_data")
            .find(".prod_id")
            .val();

        $.ajax({
            method: "POST",
            url: "add-to-cart",
            data: {
                product_id: product_id,
                product_qty: 1,
            },
            success: function (response) {
                if (response) {
                    $(".alert-toast")
                        .show()
                        .text(`${response.status}`)
                        .fadeOut(2500, function () {});
                         window.setTimeout(function () {
                             location.reload();
                         }, 2600);
                }
            },
        });
    });

    $(".increment-btn").click(function (e) {
        e.preventDefault();
        var inc_value = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();
        var value = parseInt(inc_value);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest(".product_data").find(".qty-input").val(value);
        }
    });
    $(".decrement-btn").click(function (e) {
        e.preventDefault();
        var dec_value = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();
        var value = parseInt(dec_value);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest(".product_data").find(".qty-input").val(value);
        }
    });

    $(".remove-cart-item").click(function (e) {
        e.preventDefault();
        var prod_id = $(this).closest(".product_data").find(".prod_id").val();

        $.ajax({
            method: "POST",
            url: "remove-cart-item",
            data: {
                prod_id: prod_id,
            },
            success: function () {
                window.location.reload();
            },
        });
    });

    $(".changeQuantity").click(function (e) {
        e.preventDefault();
        var prod_id = $(this).closest(".product_data").find(".prod_id").val();
        var qty = $(this).closest(".product_data").find(".qty-input").val();

        data = {
            prod_id: prod_id,
            prod_qty: qty,
        };

        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                window.location.reload();
            },
        });
    });

    $(".alert").fadeOut(3500, function () {
        $(this).remove();
    });
});
