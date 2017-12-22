<?php /* Template Name: Registration Page FIN*/ ?>
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

if ($_POST) {
    if ($_POST['contactName'] && $_POST['contactEmail'] && $_POST['contactTel']) {
        $names = explode(' ',$_POST['contactName'],2);
        $password = get_randStr(16);
        if (!$_POST['erpSystem']) {
            $erp = "Uus";
        }
        else {
            $erp = $_POST['erpSystem'];
        }
        $parameters = array(
            'partnerKey' => 'Adoi3idS32288487cW3dT32AA',
            'companyName' => $_POST['companyName'],
            'firstName' => $names[0],
            'lastName' => $names[1],
            'phone' => $_POST['contactTel'],
            'website' => '-',
            'email' => $_POST['contactEmail'],
            'countryCode' => 'FI',
            // region (State identifier (for US, CA and AU))
            'defaultLanguage' => 'fin',
            'addressLine1' => '-',
            'addressLine2' => '-',
            'addressPostCode' => '-',
            'addressCountry' => 'Finland',
            'reseller' => 'Kassajarjestelma',
            'username' => $_POST['contactEmail'],
            'password' => $password,
            'ipAddress' => get_ip(),
            'branding' => 'kassajarjestelma.erply.com',
            // context
            // customerID
            // planName
            // planPrice
            // sendEmail
            // doNotCreateUser
            // salonModules
        );

        session_start();
        include('EAPI.class.php');
        $api = new EAPI();
        $api->clientCode = 'eng';
        $api->username = 'demo';
        $api->password = 'demouser';
        $api->url = "https://".$api->clientCode.".erply.com/api/";

        $response = json_decode($api->sendRequest('createInstallation',$parameters),true);

        mail(
            'fred.korts@erply.com',
            'kassajarjestelma.erply.com - Kassajarjestelma Sign-Up',
            print_r(
                array(
                    '$_POST'=>$_POST,
                    '$parameters'=>$parameters,
                    '$response'=>$response
                ),
                true),
            'From: noreply@erply.com'."\r\n".'Content-Type:text/plain; charset=UTF-8'
        );

        if ($response['status']['responseStatus']=='ok' && $response['records']['0']['clientCode']) {
            mail(
                $_POST['contactEmail'],
                'ERPLY-tili',
                'Hei, '.$names[0].'!'."\n\n".
                'Kiitos, että olet kirjautunut ERPLY:n käyttäjäksi.'."\n\n".
                'Kirjaudu sisälle käyttämällä seuraavaa osoitetta: https://erply.com/login/'."\n\n".
                'Käyttäjätunnus: '.$response['records']['0']['username']."\n".
                'Asiakastunnus: '.$response['records']['0']['clientCode']."\n".
                'Salasana: '.$response['records']['0']['password']."\n\n".
                'Jos olet unohtanut salasanasi, voit muuttaa sitä täällä: '."\n".
                'https://reg.erply.com/password_reminder/'."\n\n".
                'Jos käytön aikana tulee kysymyksiä, niin voit kääntyä Erply asiakastukeen.. '."\n".
                'Puhelin: +358 50 5061591'."\n".
                'Sähköposti: apu@erply.com'."\n\n".
                'Sujuvaa käyttöä!'."\n\n".
                'ERPLY:n tiimi',
                'From: noreply@erply.ee'."\r\n".'Content-Type:text/plain; charset=UTF-8'
            );
            $parameters['password'] = '################';
            mail(
                'fred.korts@erply.com',
                'Uus konto on registreeritud '.$response['records']['0']['clientCode'],
                'Kontaktisiku nimi: '.$_POST['name']."\n\n".
                'E-post: '.$_POST['contactEmail']."\n\n".
                'Ettevõtte nimi: '.$_POST['companyName']."\n\n".
                'Telefon: '.$_POST['contactTel']."\n\n".
                'Firmas töölisi: '.$_POST['employeeRadio']."\n\n".
                'Kontaktisiku roll: '.$_POST['roleName']."\n\n".
                'Praegune ERP: '.$erp."\n\n".
                'Tööstuse kategooria: '.$_POST['industryName']."\n\n".
                'Aadress:'."\n".
                $_POST['address1']."\n".
                $_POST['address2']."\n".
                $_POST['postcode'],
                'From: noreply@erply.com'."\r\n".'Content-Type:text/plain; charset=UTF-8'
            );
            $htm = '<div class="container"><div class="row"><div class="col-md-12"><div style="margin-top:100px;text-align:center;"><h2>Kiitos, että olet kirjautunut ERPLY:n käyttäjäksi. Asiakastunnuksesi ja salasanasi on lähetetty sähköpostiisi</h2></div></div></div></div>';
            header( "refresh:5;url=".$response['records']['0']['clientUrl']."" );
        } else {
            $htm = '<div class="container"><div class="row"><div class="col-md-12"><div style="margin-top:100px;text-align:center;"><h1>Tilin luominen epäonnistui. Punaisella merkityt kentät ovat pakollisia.</h1></div></div></div><div class="row"><div class="col-md-12" style="text-align:center;margin-top:2em;"><a href="/registration" class="bttn">Yritä uudelleen</a></div></div></div>';
        }
    } else {
        $htm = '<div class="container"><div class="row"><div class="col-md-12"><div style="margin-top:100px;text-align:center;"><h1>Tilin luominen epäonnistui. Punaisella merkityt kentät ovat pakollisia.</h1></div></div></div><div class="row"><div class="col-md-12" style="text-align:center;margin-top:2em;"><a href="/registration" class="bttn">Yritä uudelleen</a></div></div></div>';
    }
} else {
    $htm = '
        <form name="signupform" id="registration-form-wrapper" class="registration" method="post">

            <input type="hidden" name="FmK09z37T1tLm548" value="8bjSSHM1700m6F95">
            <input type="hidden" name="businessCountry" value="FI" id="businessCountry" />
            <input type="hidden" name="sendvars" id="sendvars" />
            <input type="hidden" name="ZrkSP6T7ecR53DYA" value="8gtx5IJhqjLx86SR" id="sendvars" />

            <div class="registration-panel" id="first-panel">
                <div class="alert alert-danger required-alert" style="width:355px;">
                    <strong>Huomio!</strong> Täytäthän kaikki kentät!
                </div>
                <div class="form-group registration-field">
                    <span class="sliding-span required-span">Etu- ja sukunimi</span>
                    <input type="text" id="nameInput" class="registration-input" name="contactName"/>
                </div>
                <div class="form-group registration-field">
                    <span class="sliding-span required-span">Sähköpostiosoite</span>
                    <input type="email"  id="emailInput" class="registration-input" name="contactEmail"/>
                </div>
                <div class="form-group registration-field">
                    <span class="sliding-span required-span">Puhelinnumero</span>
                    <input type="text"  id="contactInput" class="registration-input" name="contactTel"/>
                </div>
                <div class="form-group next-button">
                    <input type="button" id="firstNext" class="bttn-next" value="Seuraava >"/>
                </div>
            </div>
            <div class="registration-panel" id="second-panel">
                <div class="form-group registration-field">
                    <span class="sliding-span">Yrityksen nimi</span>
                    <input type="text" class="registration-input" name="companyName"/>
                </div>
                <div class="form-group registration-field">
                    <h4>Työntekijöiden määrä</h4>
                </div>
                <div class="form-group select-wrapper">
                    <label class="radio-container">
                        <input type="radio" name="employeeRadio" checked="checked" value="1-15">
                        <span class="checkmark">1-15</span>
                    </label>

                    <label class="radio-container">
                        <input type="radio" name="employeeRadio" value="15-50">
                        <span class="checkmark">15-50</span>
                    </label>

                    <label class="radio-container">
                        <input type="radio" name="employeeRadio" value="50-150">
                        <span class="checkmark">50-150</span>
                    </label>

                    <label class="radio-container">
                        <input type="radio" name="employeeRadio" value="150+">
                        <span class="checkmark">150+</span>
                    </label>
                </div>
                <div class="form-group registration-field">
                    <h4>Rooli</h4>
                </div>
                <div class="form-group select">
                    <select name="roleName">
                        <option value="Muu/mikä" selected>Muu/mikä</option>
                        <option value="Omistaja">Omistaja</option>
                        <option value="Toimitusjohtaja">Toimitusjohtaja</option>
                        <option value="Myyntipäällikkö">Myyntipäällikkö</option>
                    </select>
                </div>
                <div class="form-group next-button">
                    <input type="button" id="secondNext" class="bttn-next" value="Seuraava >"/>
                </div>
            </div>
            <div class="registration-panel" id="third-panel">
                <div class="form-group registration-field">
                    <h4>Uus ERP/Praegune süsteem</h4>
                </div>
                <div class="form-group select-wrapper">
                    <label class="radio-container">
                        <input type="radio" name="erpRadio" value="new">
                        <span class="checkmark">Uusi ERP:lle</span>
                    </label>

                    <label class="radio-container">
                        <input type="radio" name="erpRadio" value="current">
                        <span class="checkmark current-erp">Nykyinen järjestelmä</span>
                    </label>
                </div>
                <div class="form-group registration-field erp-system">
                    <span class="sliding-span">Nykyinen järjestelmä</span>
                    <input type="text" class="registration-input" name="erpSystem"/>
                </div>
                <div class="form-group registration-field">
                    <h4>Toimiala</h4>
                </div>
                <div class="form-group select">
                    <select name="industryName">
                        <option value="Muu toimiala" selected>Muu toimiala</option>
                        <option value="Tukku- ja vähittäiskauppa">Tukku- ja vähittäiskauppa</option>
                        <option value="Palvelut">Palvelut</option>
                        <option value="Valmistava teollisuus">Valmistava teollisuus</option>
                    </select>
                </div>

                <div class="form-group submit-button">
                    <input type="submit" class="bttn-submit" value="Rekisteröidy"/>
                </div>
            </div>

        </form>
    ';
}

function get_randStr($length) {
    $str = "";
    for ($i=0; $i<$length; $i++) {
        $d=rand(1,3);
        if ($d==1) $str.= chr(rand(48,57));
        if ($d==2) $str.= chr(rand(65,90));
        if ($d==3) $str.= chr(rand(97,122));
    }
    return $str;
}

function get_ip() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

?>
<div class="container">
    <div class="col-md-5 col-sm-12 registration-area">
        <div class="main-box">
            <?php echo $htm; ?>
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
