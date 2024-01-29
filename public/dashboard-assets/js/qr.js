"use strict";

const device_id = $("#device_id").val();
const base_url = $("#base_url").val();
const device_status = $("#device_status").val();
var attampt = 0;
var session_attampt = 0;

checkSession();

//create session request for this device
function createSession() {
    attampt++;

    if (attampt == 6) {
        clearInterval(sessionMake);
        const image = `<img src="${base_url}/assets/img/waiting.jpg" class="w-50">`;
        $(".qr-area").html(image);
        location.reload();
        return false;
    }
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    //sending ajax request
    $.ajax({
        type: "POST",
        url: base_url + "/create-session/" + device_id,
        dataType: "json",
        success: function (response) {
            const image = `<img src="${response.qr}" class="w-90">`;
            $(".qr-area").html(image);
            $(".server_disconnect").addClass("d-none");
            $(".progress").removeClass("d-none");
        },
        error: function (xhr, status, error) {
            const image = `<img src="${base_url}/assets/img/disconnect.webp" class="w-50"><br>`;
            $(".qr-area").html(image);
            $(".server_disconnect").removeClass("d-none");
            setTimeout(() => {
                location.reload();
            }, 2000);

            if (xhr.status == 500) {
                clearInterval(checkSessionRecurr);
                clearInterval(sessionMake);
            }
        },
    });
}

//check is device logged in
function checkSession() {
    session_attampt++;
    if (session_attampt >= 10) {
        clearInterval(checkSessionRecurr);
        return false;
    }

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "POST",
        url: base_url + "/check-session/" + device_id,
        dataType: "json",
        success: function (response) {
            if (response.connected === true) {
                clearInterval(checkSessionRecurr);
                clearInterval(sessionMake);

                toastr.success(response.message);
                $(".loggout_area").removeClass("d-none");

                const image = `<img src="${base_url}/assets/img/connected.png" class="w-50"><br>`;
                $(".qr-area").html(image);

                setTimeout(() => {
                    location.href = "../devices";
                }, 2000);

                $(".logged-alert").removeClass("d-none");
                $(".progress").addClass("d-none");
                $(".helper-box").removeClass("d-none");

                device_status == "0" ? congratulations() : "";
            } else {
                session_attampt == 1 ? createSession() : "";
            }
        },
        error: function (xhr, status, error) {
            if (xhr.status == 500) {
                clearInterval(checkSessionRecurr);
                clearInterval(sessionMake);
                const image = `<img src="${base_url}/assets/img/disconnect.webp" class="w-50"><br>`;
                $(".qr-area").html(image);
                $(".server_disconnect").removeClass("d-none");
                setTimeout(() => {
                    location.reload();
                }, 2000);
            }
        },
    });
}

//if click logout button
$(".logout-btn").on("click", function () {
    let previous_btn = $(".logout-btn").html();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "POST",
        url: base_url + "/logout-session/" + device_id,
        dataType: "json",
        beforeSend: function () {
            $(".logout-btn").html(
                '<i class="bx bx-loader bx-spin font-size-16 align-middle mr-2"></i> يرجى الانتظار ...'
            );
            $(".logout-btn").attr("disabled", "");
        },
        success: function (response) {
            toastr.success(response.message);
            $(".logout-btn").html(previous_btn);
            $(".logout-btn").addClass("d-none");
            $(".logout-btn").removeAttr("disabled");

            location.reload();
        },
        error: function (xhr, status, error) {
            toastr.error(xhr.responseJSON.message);
            $(".logout-btn").html(previous_btn);
            $(".logout-btn").removeAttr("disabled");
        },
    });
});

const sessionMake = setInterval(function () {
    createSession();
}, 12000);

const checkSessionRecurr = setInterval(function () {
    checkSession();
}, 5000);
