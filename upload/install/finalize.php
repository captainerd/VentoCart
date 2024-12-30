<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>VentoCart Installation</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">VentoCart Installation</h3>
                    </div>
                    <div class="alert alert-warning" role="alert">Warning:
                        <ul>
                            <li> Install directory will be automatically removed on a successful installation</li>
                            <li> All database tables for chosen perfix will be droped</li>
                            <li> Admin directory will be renamed to the chosen value</li>

                        </ul>



                    </div>
                    <div class="card-body">
                        <div class="container mt-5">
                            <div id="finished" class="alert alert-success d-none" role="alert">
                                <h4 class="alert-heading">Installation of VentoCart has been finished!</h4>
                                <p>You can now visit the <a href="#" id="frontLink" class="alert-link">front</a> or <a
                                        href="#" id="adminLink" class="alert-link">admin panel</a>.</p>
                                <p><strong>Remember</strong> you can access admin by the url: /<span style="color: red"
                                        id="adminAcess"></span>.</p>
                                <p>Thank you for trying VentoCart.</p>

                            </div>
                        </div>
                        <form id="installForm" class="needs-validation">
                            <div id="formContainer">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="dbhost" class="form-label">Database Host:</label>
                                            <input type="text" value="localhost" class="form-control" id="dbhost"
                                                name="dbhost" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="dbname" class="form-label">Database Name:</label>
                                            <input type="text" class="form-control" id="dbname" name="dbname" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="dbuser" class="form-label">Database User:</label>
                                            <input type="text" class="form-control" id="dbuser" name="dbuser" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="dbpassword" class="form-label">Database Password:</label>
                                            <input type="password" class="form-control" id="dbpassword"
                                                name="dbpassword">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="dbprefix" class="form-label">Database Prefix:</label>
                                            <input type="text" class="form-control" value="ve" id="dbprefix"
                                                name="dbprefix" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="adminUsername" class="form-label">Admin
                                                Username:</label>
                                            <input type="text" class="form-control" id="adminUsername"
                                                name="adminUsername" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="adminPassword" class="form-label">Admin Password:</label>
                                            <input type="password" class="form-control" id="adminPassword"
                                                name="adminPassword" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="adminPasswordconfirm" class="form-label">Admin Password
                                                Confirm:</label>
                                            <input type="password" class="form-control" id="adminPasswordconfirm"
                                                name="adminPasswordconfirm" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="adminEmail" class="form-label">Your
                                                E-mail:</label>
                                            <input type="text" class="form-control" id="adminEmail" name="adminEmail"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="weburl" class="form-label">Your WebSite URL:</label>
                                            <input type="text" value="https://" class="form-control" id="weburl"
                                                name="weburl" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="admindir" class="form-label">Admin Directory:</label>
                                            <input type="text" value="" class="form-control" id="admindir"
                                                name="admindir" required>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary" id="installBtn">Install</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3" id="progressContainer">
                                        <div class="progress mt-2">
                                            <div class="progress-bar" role="progressbar" style="width: 0%;"
                                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Error alert container, hidden by default -->
                        <div id="errorContainer" class="alert alert-danger alert-dismissible fade show" role="alert"
                            style="display: none;">
                            <strong>Error!</strong> <span id="errorMessage"></span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        $(document).ready(function () {
            var adminUsernameField = $("#adminUsername");
            var adminDirField = $("#admindir");

            adminUsernameField.on("input", function () {
                // Check for valid characters (allow only alphanumeric, underscore, and hyphen)
                var validRegex = /^[a-zA-Z0-9_-]+$/;
                if (adminUsernameField.val().toLowerCase() == 'admin') {
                    adminUsernameField.val('');
                    adminDirField.val('');
                    alert("You can not use admin as a username for security reasons");
                    return;
                }
                var adminUsernameValue = adminUsernameField.val();

                if (!validRegex.test(adminUsernameValue)) {
                    // If invalid characters are entered, prevent typing
                    adminUsernameField.val(adminUsernameValue.slice(0, -1));
                }

                // Update #admindir with the same value as #adminUsername
                adminDirField.val('cp-' + adminUsernameValue);
            });

            var currentUrl = window.location.href;

            // Remove the "/install" part
            var baseUrl = currentUrl.replace('install/index.php?passed=1', '');

            $("#weburl").val(baseUrl)
            $("#installBtn").click(function (event) {
                //$("#installBtn").attr('disabled', true);

                install(1);
            });
        });

        function install(page) {

            var formData = {
                ajax: true,
                host: $("#dbhost").val(),
                user: $("#dbuser").val(),
                password: $("#dbpassword").val(),
                database: $("#dbname").val(),
                prefix: $("#dbprefix").val(),
                adminDir: $("#admindir").val(),
                adminUsername: $("#adminUsername").val(),
                adminPassword: $("#adminPassword").val(),
                adminPasswordconfirm: $("#adminPasswordconfirm").val(),
                adminEmail: $("#adminEmail").val(),
                weburl: $("#weburl").val(),
                // Add other form fields as needed
            };

            var form = document.getElementById("installForm");
            // Check if the form is valid using Bootstrap's .was-validated class
            if (form.checkValidity(event) === false) {
                event.preventDefault();
                event.stopPropagation();
                alert('Please fill the form correctly');
                return;
            }
            //form.classList.add("was-validated");

            // Hide the form container and show the progress container
            $("#formContainer").hide();
            $("#progressContainer").show();

            $.ajax({
                type: "POST",
                url: "install.php?page=" + page,
                data: formData,
                dataType: "json",
                success: function (response) {
                    // Handle different status responses

                    switch (response.status) {

                        case "Failed":
                            // Handle installation failure

                            $(".progress-bar").css("width", "0%").attr("aria-valuenow", 0).text("0%");
                            alert(response.message);

                            $("#progressContainer").hide();
                            $("#formContainer").show();

                            //  $("#installBtn").attr('disabled', false);
                            break;
                        case 'installing':
                            var progress = (response.page / response.total) * 100;

                            // Update the progress bar
                            $(".progress-bar")
                                .css("width", progress + "%")
                                .attr("aria-valuenow", progress)
                                .text(Math.round(progress) + "%");
                            if (progress < 100) {

                                install(parseInt(response.page) + 1)


                            } else {
                                setTimeout(() => {
                                    $(".progress-bar").css("width", "100%").attr("aria-valuenow", 100).text("100%");
                                    $('#finished').removeClass('d-none');
                                    alert('Installation Finished!');

                                    $("#progressContainer").hide();
                                    var weburlInput = $("#weburl");

                                    // Get the URL value
                                    var weburl = weburlInput.val();

                                    // Set the front link
                                    $("#frontLink").attr("href", weburl);
                                    fetch(weburl, {
                                        method: 'GET',
                                        mode: 'no-cors' // Use no-cors if the URL is on a different domain and doesn't allow CORS
                                    }).then(response => {
                                        console.log('URL preloaded successfully:', weburl);
                                    }).catch(error => {
                                        console.error('Error preloading the URL:', error);
                                    });
                                    // Set the admin panel link
                                    $("#adminAcess").text($("#admindir").val())
                                    $("#adminLink").attr("href", weburl + $("#admindir").val());
                                    $('#finished').show();
                                }, 2000);
                            }
                    }
                },
                error: function (xhr, status, error) {
                    // Handle AJAX request errors
                    $(".progress-bar").css("width", "0%").attr("aria-valuenow", 0).text("0%");
                    var serverResponse = xhr.responseText;
                    alert("AJAX request failed: " + status + "\nError: " + error);
                    $("#errorContainer").html(serverResponse);
                    $("#errorContainer").show();

                    $("#formContainer").show();
                    clearInterval(interval);
                    $(".progress-bar").css("width", 0 + "%").attr("aria-valuenow", 0).text(0 + "%");
                    $("#installBtn").attr('disabled', false);

                }
            });

        }
    </script>

</body>

</html>