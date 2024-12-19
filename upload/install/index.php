<?php
if ($_GET['passed']) {
    include("finalize.php");
    exit();
}
function checkSetting($current, $required, $type = 'version')
{
    if ($type === 'version') {
        $currentVersion = explode('-', $current)[0];
        return version_compare($currentVersion, $required, '>=');
    } else {

        return clearOnOrOff($current) === clearOnOrOff($required);
    }
}

function checkExtension($extensionName)
{


    if ($extensionName === 'WebP') {
        return checkWebPSupport();
    }

    return extension_loaded($extensionName);
}

function checkWebPSupport()
{
    $info = gd_info();

    return $info['WebP Support'];
}
function checkStorageAccess()
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $this_site = $_SERVER['HTTP_HOST'];

    $url = "$protocol://$this_site/system/storage/download/";

    // Get the content of the URL
    $content = @file_get_contents($url);

    // If file_get_contents fails, return false (indicating access is blocked)
    if ($content === false) {
        return true;
    }

    // Check if "44220" is present in the content
    return strpos($content, "44220") === false;
}
// PHP Settings
$phpSettings = [
    ['PHP Version', phpversion(), '8.1+', 'version'],
    // ['Register Globals', ini_get('register_globals'), 'Off', 'n'],  The 'Register Globals' feature was deprecated in PHP 5.3.0 and removed in PHP 5.4.0
    // ['Magic Quotes GPC', ini_get('magic_quotes_gpc'), 'Off', 'n'], Magic Quotes GPC was deprecated in PHP 5.3.0 and completely removed in PHP 5.4.0.
    ['File Uploads', ini_get('file_uploads'), 'On', 'n'],
    ['Session Auto Start', ini_get('session.auto_start'), 'Off', 'n'],
    ['Restrict Storage Dir Access', checkStorageAccess(), true, true],
];

// PHP Extensions
$phpExtensions = [
    ['Database', 'mysqli'],
    ['GD', 'gd'],
    ['cURL', 'curl'],
    ['OpenSSL', 'openssl'],
    ['ZLIB', 'zlib'],
    ['ZIP', 'zip'],
    ['WebP Support', 'WebP', 'On'], // WebP support using the GD extension
];

// Initialize $allSatisfied to true
$allSatisfied = true;
function clearOnOrOff($setting)
{
    if ($setting === 1)
        return true;
    if ($setting === 0)
        return false;
    if ($setting === 'On')
        return true;
    if ($setting === 'Off')
        return false;
    if (!$setting)
        return false;
    if ($setting)
        return true;
    return $setting;
}
// HTML output
?>
<?php if ($_GET['passed'] != 1): ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>VentoCart Installation</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
            crossorigin="anonymous">

    </head>

    <body>
        <style>
            .table-container {

                margin: auto;
                /* Center the table */
            }

            /* Example: Adjust the font size of the table */
            .table-container table {
                font-size: 12px !important;
                /* Adjust the value as needed */
            }

            /* Example: Reduce the padding of table cells */
            .table-container td,
            .table-container th {
                padding: 8px;
                /* Adjust the value as needed */
            }

            /* Example: Reduce the size of headers (optional) */
            .table-container th {
                font-size: 12px;
                /* Adjust the value as needed */
            }
        </style>
        <div class="container table-container  mt-7">

            <div class="row justify-content-center">

                <div class="col-md-7">
                    <div class="card">

                        <div class="card-header ">
                            <img src="/image/catalog/text3158.png" alt="VentoCart">
                            <!-- PHP Settings Table -->
                            <h2>PHP Settings</h2>
                            <table class="table table-bordered table-hover table-striped">
                                <tr>
                                    <th>Setting</th>
                                    <th>Current Setting</th>
                                    <th>Required Setting</th>
                                    <th>Status</th>
                                </tr>
                                <?php foreach ($phpSettings as $setting): ?>
                                    <tr>
                                        <td><?= $setting[0] ?></td>
                                        <td><?= clearOnOrOff($setting[1]) ? "On" : "Off" ?></td>
                                        <td><?= $setting[2] ?></td>
                                        <?php
                                        $status = checkSetting($setting[1], $setting[2], $setting[3]);
                                        $allSatisfied = $allSatisfied && $status; // Update $allSatisfied
                                        ?>
                                        <td>

                                            <?php if ($status): ?>
                                                <i class="fas fa-check-circle fa-2x text-success"></i>
                                            <?php else: ?>
                                                <i class="fas fa-times-circle fa-2x text-danger"></i>
                                            <?php endif; ?>


                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>

                            <!-- PHP Extensions Table -->
                            <h2>PHP Extensions</h2>
                            <table class="table table-bordered table-hover table-striped">
                                <tr>
                                    <th>Extension</th>
                                    <th>Current Setting</th>
                                    <th>Required Setting</th>
                                    <th>Status</th>
                                </tr>
                                <?php foreach ($phpExtensions as $extension): ?>
                                    <tr>
                                        <td><?= $extension[0] ?></td>
                                        <td><?= checkExtension($extension[1]) ? 'On' : 'Off' ?></td>
                                        <td><?= $extension[1] ?? 'N/A' ?></td>
                                        <?php
                                        $status = checkExtension($extension[1]);
                                        $allSatisfied = $allSatisfied && $status; // Update $allSatisfied
                                        ?>
                                        <td>

                                            <?php if ($status): ?>
                                                <i class="fas fa-check-circle fa-2x text-success"></i>
                                            <?php else: ?>
                                                <i class="fas fa-times-circle fa-2x text-danger"></i>
                                            <?php endif; ?>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>

                            <?php

                            $alertClass = $allSatisfied ? 'alert-success' : 'alert-danger';
                            $message = $allSatisfied ? 'All checks passed. You can proceed.' : 'Some checks failed. Please review the settings and extensions.';
                            ?>

                            <div class="alert <?= $alertClass ?> mt-3" role="alert">
                                <?= $message ?>

                                <?php if ($allSatisfied): ?>
                                    <br>
                                    <a style="width:100%" href="<?= $_SERVER['PHP_SELF'] ?>?passed=1"
                                        class="btn btn-primary mt-2">Proceed</a>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>
<?php endif; ?>