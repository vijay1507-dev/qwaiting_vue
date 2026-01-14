<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Qwaiting - Enquiry Received</title>
</head>

<body style="margin:0; padding:0; font-family:Arial, sans-serif; background-color:#fff9e6;">

  <!-- Outer Wrapper -->
  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:#f8f9fa;">
    <tr>
      <td align="center">

        <!-- Main Container -->
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600"
          style="max-width:600px; background:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.1);">

          <!-- Header -->
          <tr>
            <td align="center" style="background:#ffffff; padding:20px 0;">
              <img src="https://qwaiting.com/images/qwaiting_logo.png" alt="Qwaiting Logo" width="180"
                style="display:block;">
            </td>
          </tr>

          <!-- Content -->
          <tr>
            <td style="padding:0px 25px 30px 25px; color:#333333; line-height:1.6;">

              <!-- Banner -->
              <div style="padding:30px; background-color:#f4f1ff; text-align:center; border-radius:12px;">
                <h2 style="color:#000; font-size:22px; font-weight:600; margin:0;">
                  Your Enquiry Has Been Successfully Submitted
                </h2>
              </div>

              <!-- Greeting -->
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0"
                style="background:#f9f9f9; border-radius:8px; margin:15px 0; padding:25px;">
                <tr>
                  <td align="center"
                    style="color:#6648e6; font-weight:bold; font-size:20px;">
                    Hello {{ $enquiry->full_name }},
                  </td>
                </tr>
                <tr>
                  <td align="center"
                    style="color:#333333; font-size:16px; line-height:1.6; padding-top:10px;">
                    Thank you for reaching out to us regarding upgrading your package.<br>
                    We’ve received your enquiry and our team will get back to you within
                    <strong>24 working hours</strong>.
                  </td>
                </tr>
              </table>

              <!-- Enquiry Details -->
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0"
                style="border-radius:8px; border:1px solid #eee; padding:20px; margin-top:15px;">
                <tr>
                  <td style="font-size:16px; font-weight:bold; color:#000; padding-bottom:10px;">
                    Your Enquiry Details
                  </td>
                </tr>
                <tr>
                  <td style="font-size:14px; color:#333;">
                    <ul style="padding-left:18px; margin:0;">
                      <li><strong>Interested Package:</strong> {{ $enquiry->interested_package }}</li>
                      <li><strong>Expected Start Date:</strong> {{ $enquiry->expected_start_date->format('d M, Y') }}</li>
                    </ul>
                  </td>
                </tr>
              </table>

              <!-- Closing -->
              <p style="margin-top:25px; text-align:center; font-size:14px; color:#333;">
                <strong>Best Regards,<br>The Qwaiting Team</strong>
              </p>

            </td>
          </tr>

          <!-- Footer Social -->
          <tr>
            <td align="center" style="background:#f4f1ff; padding:15px 0 0 0; font-size:13px; color:#777;">
              <strong>Connect with us on:</strong><br>
              <div style="margin-top:15px;">
                <a href="https://www.instagram.com/qwaitingsystem/" target="_blank"
                  style="display:inline-block; margin:0 4px; padding:5px; background:#fff; border-radius:5px;">
                  <img src="https://qwaiting.com/frontimg/instagram.png" width="20" height="20" alt="Instagram">
                </a>
                <a href="https://www.linkedin.com/company/qwaiting" target="_blank"
                  style="display:inline-block; margin:0 4px; padding:5px; background:#fff; border-radius:5px;">
                  <img src="https://qwaiting.com/images/linkedin-icon.png" width="20" height="20" alt="LinkedIn">
                </a>
                <a href="https://www.facebook.com/qwaiting/" target="_blank"
                  style="display:inline-block; margin:0 4px; padding:5px; background:#fff; border-radius:5px;">
                  <img src="https://qwaiting.com/frontimg/facebook.png" width="20" height="20" alt="Facebook">
                </a>
                <a href="https://x.com/" target="_blank"
                  style="display:inline-block; margin:0 4px; padding:5px; background:#fff; border-radius:5px;">
                  <img src="https://qwaiting.com/frontimg/twitter.png" width="20" height="20" alt="Twitter">
                </a>
              </div>
            </td>
          </tr>

          <!-- Footer Copyright -->
          <tr>
            <td align="center" style="background:#f4f1ff; font-size:13px; color:#777; padding-bottom:15px;">
              <p style="margin:15px 0;">Copyright 2025 © Qwaiting. All rights reserved.</p>
            </td>
          </tr>

        </table>

      </td>
    </tr>
  </table>

</body>
</html>
