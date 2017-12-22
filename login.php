<?php /* Template Name: Login page FIN*/ ?>
<?php
/**
 * Registration template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
?>
<?php
if ($_GET['r']=='ee') {
    $langvars = array(
        'login' => 'Logi sisse',
        'login_user' => 'Kasutajanimi',
        'login_password' => 'Parool',
        'login_code' => 'Kliendi kood',
        'login_forgotcode' => 'Unustasid kliendi koodi? Taasta see siin.',
        'login_forgotpassword' => 'Kui unustasid parooli, muuda see siin.',
        'login_helpdesk' => '<b>Klienditeenindus</b>:<br><a href="mailto:abi@erply.com">abi@erply.com</a><br>+372 628 0020',
        'login_error' => 'Palun täida kõik väljad.'
    );
} else {
    $langvars = array(
        'login' => 'Login',
        'login_user' => 'Username',
        'login_password' => 'Password',
        'login_code' => 'Customer code',
        'login_forgotcode' => 'Forgot your Customer Code? Restore it here.',
        'login_forgotpassword' => 'If you have forgotten your password, change it here.',
        'login_helpdesk' => '<b>Helpdesk</b>:<br><a href="mailto:support@erply.com">support@erply.com</a><br>+1 (917) 210-1251 United States<br>+61 8 7200 0577	&nbsp;Australia<br>+44 (20) 8133 7331 Europe',
        'login_error' => 'Please fill in all fields.'
    );
}
?>

<script type="text/javascript">
    function sbmt_login() {
        var username = document.form_login.username.value;
        var password = document.form_login.password.value;
        var code = document.form_login.code.value;
        if (username.length<2 || password.length<2 || code.length<2 || username=='<?php echo $langvars['login_user'];  ?>>' || password=='<?php echo $langvars['login_password'];  ?>' || code=='<?php echo $langvars['login_code'];  ?>') {
            err_login('<?php echo $langvars['login_error']; ?>');
            return false;
        }
        jQuery.get(
            "https://erply.com/login/customerLocation/index.php",
            {"a": code},
            function (response) {
                if (response) {
                    var server = 'https://' + response + '/';
                    document.form_login.action =  server + code + '/';
                    document.form_login.submit();
                } else {
                    err_login('The login service is currently unavailable.');
                }
            }
        );
        return false;
    }
    function err_login(message) {
        document.getElementById("alertbox").style.display = 'block';
        document.getElementById("alertbox").className = 'alertbox-error-login';
        document.getElementById("alertbox").innerHTML = message;
    }
</script>

<div class="container">
    <div class="col-md-5 col-sm-12 registration-area">
        <div class="main-box">
            <div class="login-wrapper" style="flex-direction: column;">
                <div class="row">
                    <div id="alertbox" class="alertbox" style="display:none;"></div>
                </div>
                <div class="row">
                    <form method="post" name="form_login">
                        <div class="login-panel">
                            <div class="form-group registration-field">
                                <span class="sliding-span required">Käyttäjätunnus</span>
                                <input type="text" class="registration-input" name="username"/>
                            </div>
                            <div class="form-group registration-field">
                                <span class="sliding-span required">Salasana</span>
                                <input type="text" class="registration-input" name="password"/>
                            </div>
                            <div class="form-group registration-field">
                                <span class="sliding-span required">Client code</span>
                                <input type="text" class="registration-input" name="code"/>
                            </div>
                            <div class="form-group submit-button">
                                <a href="#" onClick="sbmt_login();return false;" style="font-weight:600;">Log-in!</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="https://reg.erply.com/account_reminder/" rel="nofollow">Unohditko asiakastunnuksesi? Klikkaa tästä.</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="https://reg.erply.com/password_reminder/" rel="nofollow">Unohditko salasanasi? Muuta salasanasi tästä.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7 distraction" id="signupformarea">
        <div class="registration-panel image-panel" id="first-image">
            <div class="image-container" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/collage4.jpg);background-size:cover;"></div>
        </div>
        <div class="registration-panel image-panel" id="second-image">
            <div class="image-container" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/banner_optimized.jpg);background-size:cover;"></div>
        </div>
        <div class="registration-panel image-panel" id="third-image">
            <div class="image-container" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/restaurant.jpg);background-size:cover;"></div>
        </div>
    </div>
</div>


