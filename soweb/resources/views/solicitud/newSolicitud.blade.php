<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Notificacion</title>
    <style type="text/css">
        @import url(http://fonts.googleapis.com/css?family=Droid+Sans);
        img {
            max-width: 600px;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        a {
            text-decoration: none;
            border: 0;
            outline: none;
            color: #bbbbbb;
        }

        a img {
            border: none;
        }

        /* General styling */

        td, h1, h2, h3  {
            font-family: Helvetica, Arial, sans-serif;
            font-weight: 400;
        }

        td {
            text-align: center;
        }

        body {
            -webkit-font-smoothing:antialiased;
            -webkit-text-size-adjust:none;
            width: 100%;
            height: 100%;
            color: #37302d;
            background: #ffffff;
            font-size: 16px;
        }

        table {
            border-collapse: collapse !important;
        }

        .headline {
            color: #ffffff;
            font-size: 36px;
        }

        .force-full-width {
            width: 100% !important;
        }

        .force-width-80 {
            width: 80% !important;
        }
    </style>

    <style type="text/css" media="screen">
        @media screen {
            /*Thanks Outlook 2013! http://goo.gl/XLxpyl*/
            td, h1, h2, h3 {
                font-family: 'Droid Sans', 'Helvetica Neue', 'Arial', 'sans-serif' !important;
            }
        }
    </style>

    <style type="text/css" media="only screen and (max-width: 480px)">
        /* Mobile styles */
        @media only screen and (max-width: 480px) {

            table[class="w320"] {
                width: 320px !important;
            }

            td[class="mobile-block"] {
                width: 100% !important;
                display: block !important;
            }


        }
    </style>
</head>
<body class="body" style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none" bgcolor="#ffffff">
<table align="center" cellpadding="0" cellspacing="0" class="force-full-width" height="100%" >
    <tr>
        <td align="center" valign="top" bgcolor="#ffffff"  width="100%">
            <center>
                <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" width="600" class="w320">
                    <tr>
                        <td align="center" valign="top">

                            <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" class="force-full-width" style="margin:0 auto;">
                                <tr>
                                    <td style="font-size: 30px; text-align:center;">
                                        <br>

                                        <br>
                                        <br>
                                    </td>
                                </tr>
                            </table>

                            <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" class="force-full-width" bgcolor="#9dc8c8">
                                <tr>
                                    <td>
                                        <br>
                                        <h1 class="log" style="color: #006838; font-size: 60pt;" width="241" height="57"><b style="color: #8dc63f;">So</b>Web</h1>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="headline">
                                        ¡Nueva Solicitud!
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <center>
                                            <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" width="60%">
                                                <tr>
                                                    <td style="color:#187272;">
                                                        <br>
                                                        {{$asesor->nombre}} Se te  Asignó la Solicitud del Contacto {{$contacto->nombre}}.
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                    </td>
                                                </tr>
                                            </table>
                                        </center>

                                    </td>
                                </tr>

                            </table>

                            <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" class="force-full-width" bgcolor="#414141" style="margin: 0 auto">

                                <tr>
                                    <td style="color:#bbbbbb; font-size:12px;">
                                        <br>
                                        <br>
                                        © SeeSoft-Costa Rica
                                        <br>
                                        <br>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </center>
        </td>
    </tr>
</table>
</body>
</html>