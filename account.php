<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/bootstrap.php';
checkUserSession('user', '.');
$User = new \App\User\User;
?>

<!DOCTYPE html>
<html>

<?php
$TITLE_LOCATION = $_SESSION['full-name'];
require "components/user/head.php";
?>

<body class="bg-color">

    <?php require "components/user/nav.php"; ?>

    <main class="white-text">
        <div class="fluid-container">
            <div class="row">
                <form id="update-user-details" class="col s12 m6 l4">
                    <div class="card grey darken-4 p-3">
                        <div class="row">
                            <div class="col s12">
                                <label for="full-name">Full name *</label>
                                <input type="text" id="full-name" value="<?php echo $_SESSION['full-name']; ?>" class="browser-default text-input" required>
                                <small class="helper-text red-text" id="full-name-error"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="email">Email *</label>
                                <input type="email" id="email" value="<?php echo $_SESSION['email']; ?>" class="browser-default text-input" required>
                                <small class="helper-text red-text" id="email-error"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="ukn">UKN</label>
                                <input type="text" id="ukn" class="browser-default text-input" value="<?php echo $User -> getColumn("ukn", $_SESSION['fingerprint']); ?>">
                                <small class="helper-text red-text" id="ukn-error"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="uis">UIS</label>
                                <input type="text" id="uis" class="browser-default text-input" value="<?php echo $User -> getColumn("uis", $_SESSION['fingerprint']); ?>">
                                <small class="helper-text red-text" id="uis-error"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="cdc-relation-no">CDC Relation Number</label>
                                <input type="text" id="cdc-relation-no" class="browser-default text-input" value="<?php echo $User -> getColumn("cdc_relation_number", $_SESSION['fingerprint']); ?>">
                                <small class="helper-text red-text" id="cdc-relation-no-error"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="uis">CDC Account Number</label>
                                <input type="text" id="cdc-account-no" class="browser-default text-input" value="<?php echo $User -> getColumn("cdc_account_number", $_SESSION['fingerprint']); ?>">
                                <small class="helper-text red-text" id="cdc-account-no-error"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="clearing-member-id">Clearing Member ID</label>
                                <input type="text" id="clearing-member-id" class="browser-default text-input" value="<?php echo $User -> getColumn("clearing_member_id", $_SESSION['fingerprint']); ?>">
                                <small class="helper-text red-text" id="clearing-member-id-error"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="client-code">Client Code</label>
                                <input type="text" id="client-code" class="browser-default text-input" value="<?php echo $User -> getColumn("client_code", $_SESSION['fingerprint']); ?>">
                                <small class="helper-text red-text" id="client-code-error"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="current-password">Current Password *</label>
                                <input type="password" id="current-password" class="browser-default text-input" required>
                                <small class="helper-text red-text" id="current-password-error"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <input type="submit" value="update" id="register-btn" class="center-align btn-small waves-light blue darken-3 button-input">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col s12 m6 l4">
                    <div class="card grey darken-4 p-3">
                        <h5>Funds: 0</h5>   
                    </div>
                </div>
            </div>
        </div>
    </main>



    <?php require "components/user/scripts.html"; ?>
    <script src="assets/js/ajax/update-user.js"></script>
</body>

</html>