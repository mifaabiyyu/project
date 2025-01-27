/**
 * checkout.js
 * Xendit Checkout Demo
 * This file contains the logic behind demo store page
 */

(async () => {
    var options = {
        closeButton: false,
        debug: false,
        newestOnTop: false,
        progressBar: false,
        positionClass: "toast-top-right",
        preventDuplicates: false,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    };
    // "use strict";

    let integration;
    let invoiceUrl;
    let displayedCartDetails;

    // configuration form elements
    const selectIntegration = document.getElementById("select-integration");
    const selectCountry = document.getElementById("select-country");
    const buttonStartDemo = document.getElementById("button-start-demo");
    const formConfigure = document.getElementById(
        "kt_ecommerce_add_quote_submit"
    );

    // modal elements
    const modal = document.querySelector(".modal-popup");
    const modalCloseTrigger = document.querySelector(
        ".modal-popup__icon-close"
    );
    const bodyBlackout = document.querySelector(".modal-background");
    const iframe = document.getElementById("iframe-invoice");

    // event listeners
    // selectIntegration.addEventListener("change", () => {
    //     setupIntegration();
    // });

    // selectCountry.addEventListener("change", () => {
    //     setupCart();
    // });

    formConfigure.addEventListener("click", (event) => {
        event.preventDefault();
        startDemo();
    });

    // handles invoice creation upon checkout demo launch
    const startDemo = async () => {
        // loadingDemoLaunch();

        if (!invoiceUrl) {
            // setup invoice data

            // create an invoice for store checkout
            try {
                const url = window.location.href;
                const array = url.split("/");
                const addForm = document.getElementById("postData");

                var formData = new FormData(addForm);

                const lastsegment = array[array.length - 1];

                const response = await fetch("/api/invoice", {
                    method: "POST",
                    headers: {},
                    body: formData,
                });

                const data = await response.json();

                if (
                    response.status >= 200 &&
                    response.status <= 299 &&
                    typeof data.invoice_url !== "undefined"
                )
                    invoiceUrl = data.invoice_url;
                else alert(data.message);
            } catch (error) {
                toastr.error("Opps, something error", options);
            }
        }

        if (invoiceUrl) window.location.href = invoiceUrl;

        // loadingDemoLaunch();
    };

    // handles pop-up dialog option
    const launchModal = () => {
        $("#checkoutModal").modal("show");
        iframe.src = invoiceUrl;
    };

    // handles redirection option
    const redirectToInvoice = () => {
        window.location.href = invoiceUrl;
    };

    // handles button behaviour upon demo launch
    const loadingDemoLaunch = () => {
        buttonStartDemo.disabled = !buttonStartDemo.disabled;
    };

    // initial setup
    // setupIntegration();
    // setupCart();

    // avoid animation during page load
    document.body.classList.remove("preload");
})();
