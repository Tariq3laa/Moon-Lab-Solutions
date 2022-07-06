<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title>Verify your email address</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');

        table, td, div, h1, p {
            font-family: Arial, sans-serif;
        }

        * {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body style="margin:0;padding:0">
<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#eeeded;">
    <tr>
        <td align="center" style="padding:0;">
            <table role="presentation" style="width:600px;border-collapse:collapse;text-align:left;">
                <tr>
                    <td style="padding:20px 15px 20px 0;">
                        <div style="display: block;">
                            <div>
                                <img style="padding-left: 1rem;" src="{{url('public/assets/images/logo.png')}}" alt="">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding:30px 0 20px 0; background-color: white;">
                        <img src="{{url('public/assets/images/mail.png')}}" alt="" style="width:auto;height:auto;display:block;margin: auto;"/>
                    </td>
                </tr>
                <tr>
                    <td style="padding:0px 30px 20px 30px;background-color: white;">
                        <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                            <tr>
                                <td style="padding:0 0 3px 0;color:#153643;">
                                    <h1 style="font-size:24px;margin:0 0 20px 0;font-family: 'Montserrat', sans-serif;text-align: center;color: black;font-weight: bold;"> Verify your email address </h1>
                                    <a href="{{$data['redirect_link']}}" style="background-color:#154ED5;display: block;text-align: center;margin: auto;justify-content: center;
                                            width: 100%;height: 42px;color: white;padding-top: 1rem;text-decoration: none;border-radius: 8px;font-family: 'Montserrat', sans-serif;font-size: 18px;">
                                        Verify Email Address
                                    </a>
                                    <p style="text-align: center;">If you didn’t sign up for this account you can ignore this email and the account will be deleted</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><p></p></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
