<!DOCTYPE html>
<html style="overflow-y: scroll;">
<head>
    <title>SpanishDefine - Define & Conjugate Lists of Spanish Verbs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <body style="background:radial-gradient(at top, rgba(255, 207, 43, 0.4), rgba(241, 241, 241, 0.25)), url(<?php header ('Content-type: text/html; charset=utf-8'); echo "resources/images/beach_ocean.jpg" ?>);no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
background-attachment:fixed;">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>
$(document).ready(function() {
    $('#form').submit(function(e) {
        e.preventDefault();
        var val = $("input[type='submit'][clicked=true]").val();
        var urlfetch;
        if (val == "Define") urlfetch = "fetch_definitions.php";
        if (val == "Conjugate") urlfetch = "fetch_conjugations.php";

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(val+"dReplace").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST",urlfetch,true);
        xmlhttp.send(new FormData(document.getElementById("form")));
        openTab(val+"d");
    });
    $("form input[type=submit]").click(function() {
        $("input[type=submit]", $(this).parents("form")).removeAttr("clicked");
        $(this).attr("clicked", "true");
    });
});
</script>

</head>

<body style="font-family:Verdana;color:#aaaaaa;">
    <div class="header">
        <img src="resources/logo/spanishdefine_logo_header.png" style="width:20%;min-width:200px;"/>
    </div>
    <br>

    <div>
        <div class="left">
        </div>

        <div class="main">
            <div class="tabbed_area">
                    <!-- Tab links -->
                    <div class="tab">
                        <button class="tablinks" name="HomeButton" onclick="openTab('Home')">Home</button>
                        <button class="tablinks" name="DefinedButton" onclick="openTab('Defined')">Defined</button>
                        <button class="tablinks" name="ConjugatedButton" onclick="openTab('Conjugated')">Conjugated</button>
                        <button class="tablinks" name="How to useButton" onclick="openTab('How to use')">How to use</button>
                        <button class="tablinks" name="AboutButton" onclick="openTab('About')">About</button>
                    </div>

                    <!-- Tab content -->
                    <div id="Home" class="tabcontent">
                        <div class="text">
                        <div class="formDiv">
                        <form id="form">
                            <br>
                            <p style="margin:2px;margin-bottom:10px;padding:0px;font-weight:bold;">Enter word list below:</p>
                            <textarea id="inputTextArea" name="inputTextArea" placeholder="Trabajar, ser, comer, ir, saber..."></textarea>
                            <br>

                            <table class="tg"><tbody>
                            <tr><th class="tg-0pky" colspan="2" style="background-color: rgba(250, 182, 56, .2);">
                            <div>
                                <label><input type="checkbox" name="conjugations[]" value="gerund"><span>Present Participle</span></label>
                                <label><input type="checkbox" name="conjugations[]" value="pastparticiple"><span>Past Participle</span></label>
                            </div>
                            </th></tr>
                            <tr><td class="tg-0pky" style="background-color: rgba(56, 182, 250, .2);font-size:17px;">
                            INDICATIVE
                            </td><td class="tg-0pky" style="background-color: rgba(250, 56, 182, .2);font-size:17px;">
                            PERFECT
                            </td></tr>
                            <tr><td class="tg-0pky" style="background-color: rgba(56, 182, 250, .2);">
                            <div>
                                <label><input type="checkbox" name="conjugations[]" value="present"><span>Present</span></label>
                                <label><input type="checkbox" name="conjugations[]" value="preterite"><span>Preterite</span></label>
                            </div>
                            <div>
                                <label><input type="checkbox" name="conjugations[]" value="imperfect"><span>Imperfect</span></label>
                                <label><input type="checkbox" name="conjugations[]" value="conditional"><span>Conditional</span></label>
                            </div>
                            <div>
                                <label><input type="checkbox" name="conjugations[]" value="future"><span>Future</span></label>
                            </div>
                            </td>
                            <td class="tg-0pky" style="background-color: rgba(250, 56, 182, .2);">
                            <div>
                                <label><input type="checkbox" name="conjugations[]" value="perfect_present"><span>Present</span></label>
                                <label><input type="checkbox" name="conjugations[]" value="perfect_preterite"><span>Preterite</span></label>
                            </div>
                            <div>
                                <label><input type="checkbox" name="conjugations[]" value="perfect_past"><span>Past</span></label>
                                <label><input type="checkbox" name="conjugations[]" value="perfect_conditional"><span>Conditional</span></label>
                            </div>
                            <div>
                                <label><input type="checkbox" name="conjugations[]" value="perfect_future"><span>Future</span></label>
                            </div>
                            </td></tr>
                            <tr><td class="tg-0pky" style="background-color: rgba(56, 182, 250, .2);font-size:15px;">
                            Regular Subjunctive
                            </td><td class="tg-0pky" style="background-color: rgba(250, 56, 182, .2);font-size:15px;">
                            Perfect Subjunctive
                            </td></tr>
                            <tr><td class="tg-0pky" style="background-color: rgba(56, 182, 250, .2);">
                            <div>
                                <label><input type="checkbox" name="conjugations[]" value="subj_present"><span>Present</span></label>
                                <label><input type="checkbox" name="conjugations[]" value="subj_imperfect"><span>Imperfect</span></label>
                            </div>
                            <div>
                                <label><input type="checkbox" name="conjugations[]" value="subj_future"><span>Future</span></label>
                            </div>
                            </td>
                            <td class="tg-0pky" style="background-color: rgba(250, 56, 182, .2);">
                            <div>
                                <label><input type="checkbox" name="conjugations[]" value="subj_perfect_present"><span>Perfect</span></label>
                                <label><input type="checkbox" name="conjugations[]" value="subj_perfect_past"><span>Past</span></label>
                            </div>
                            <div>
                                <label><input type="checkbox" name="conjugations[]" value="subj_perfect_future"><span>Future</span></label>
                            </div>
                            </td></tr>
                            <tr><td class="tg-0pky" colspan="2" style="background-color: rgba(250, 182, 56, .2);font-size:17px;">
                            IMPERATIVE (Command form)
                            </td>
                            <tr><th  class="tg-0pky" colspan="2" style="background-color: rgba(250, 182, 56, .2);">
                            <div>
                                <label><input type="checkbox" name="conjugations[]" value="imperative_affirmative"><span>Affirmative</span></label>
                                <label><input type="checkbox" name="conjugations[]" value="imperative_negative"><span>Negative</span></label>
                            </div>
                            </th></tr>
                            </tbody></table>
                            <div class="submitDiv">
                                <input type="submit" name="define" value="Define"/>
                                <input type="submit" name="conjugate" value="Conjugate"/>
                            </div>
                        </form>
                        <br>
                        </div>
                        </div>
                    </div>

                    <div id="Defined" class="tabcontent">
                        <div id="DefinedReplace">
                        <br><table class="tg"><tr><td><br><h3>Click "Define" to see word definitions</h3><br></td></tr></table><br>
                        </div>
                    </div>
                    <div id="Conjugated" class="tabcontent">
                        <div id="ConjugatedReplace">
                        <br><table class="tg"><tr><td><br><h3>Click "Conjugate" to see verb conjugations</h3><br></td></tr></table><br>
                        </div>
                    </div>

                    <div id="How to use" class="tabcontent">
                        <div class="text" style="text-align:left;">
                            <h3>How to use</h3>
                            <p>To define or conjugate Spanish words, enter your list seperated by commas or new lines.<br><br>
                            trabajar<br>saber<br>hacer<br>jugar<br><br>
                            Or, alternatively,<br><br>
                            trabajar, saber, hacer, jugar<br><br>
                            To define, click "Define", to conjugate, select all conjugation forms that are wanted and click "Conjugate"</p>
                        </div>
                    </div>

                    <div id="About" class="tabcontent">
                        <div class="text" style="text-align:left;">
                            <h3>About SpanishDefine</h3>
                            <p style="margin-bottom:5px;">SpanishDefine was developed by Vasil Zhigilei to solve the inconvenience of manually looking up definitions and conjugations for Spanish verbs. This website allows the user to effortlessly define and/or conjugate lists of verbs in seconds, allowing the user to learn more in less time.
                            This tool uses verb conjugations by <a href="https://users.ipfw.edu/jehle/" target="_blank">Fred F. Jehle</a>, of Purdue University, compiled into a database format by <a href="https://twitter.com/ghidinelli" target="_blank">Brian Ghidinelli</a>.</p>
                            <p style="padding-top:0px;margin-top:0px;">Further questions? Please email support@spanishdefine.com</p>
                            <h3>About the Developer</h3>
                            <p>SpanishDefine is created and maintained by <a href="http://zhigilei.com" target="_blank">Vasil Zhigilei</a>, a second year student at the Engineering School of the Univeristy of Virginia.</p>
                            <h3>Changelog</h3>
                            <p>For the changelog, please visit the corresponding <a href="https://github.com/vasilzhigilei/SpanishDefine" target="_blank">GitHub</a> page.</p>
                            <br> <!-- extra space before bottom -->
                        </div>
                    </div>

                    <script src="tabswitch.js"></script>
                <?php 
                echo "<script type='text/javascript'>openTab('Home')</script>";
                ?>
            </div>
        </div>
        
        <div class="right">
        </div>
    </div>

<div class="footer">
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_donations" />
        <input type="hidden" name="business" value="HD2QVNFPEW9EL" />
        <input type="hidden" name="currency_code" value="USD" />
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
        <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
    </form>
    <br>
    © 2020 <b>Vasil Zhigilei</b> All rights reserved.
</div>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>
