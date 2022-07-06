<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <title>Admin Forget Password</title>
  <style>
    table, td, div, h1, p {font-family: Arial, sans-serif;}
  </style>
</head>
<body style="margin:0;padding:0;text-align: center;">
  <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
    <tr>
      <td style="text-align: center;padding:0;">
        <table role="presentation" style="width:602px;display: inline-block;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
          <tr>
            <td  style="text-align: center;padding:0px 0 0px 0;background:#70bbd9;">
              <img src="{{asset('assets/images/email.png')}}" alt="" width="100%" style="height:auto;display:block;" />
            </td>
          </tr>
          <tr>
            <td style="padding:36px 30px 42px 30px;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                <tr>
                  <td style="padding:0 0 36px 0;color:#153643;">
                    <h3 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif">Dear Partner</h3>
                    <h2 style="font-size:24px;margin:0 0 30px 0;font-family:Arial,sans-serif;color: #6C5BF7">Thank you for signing up in our website.</h2>
                    <p style="margin:0 0 20px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">To take the last step before you start your journey with moon lab solutions, please click on the link below, to reset your password.</p>
                    <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="http://www.moonlabsolutions.com" style="color:#6C5BF7;text-decoration:none;border-radius: 5px; border: 2px solid #6C5BF7;padding:0.5rem 2rem;">Moon Lab Solutions Home</a></p>                
                    <div style="margin-top:2rem">
                        Code : {{$data['code']}}  <br>
                        Link : <a href="{{$data['link']}}" style="color:#6C5BF7;">{{$data['link']}}</a> <br>
                        Thank you
                    </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
