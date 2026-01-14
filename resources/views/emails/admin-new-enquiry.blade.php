<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Qwaiting - New Package Enquiry Received</title>
</head>

<body style="margin:0; padding:0; font-family:Arial, sans-serif; background-color:#fff9e6;">

  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color:#f8f9fa;">
    <tr>
      <td align="center">

        <!-- Main Container -->
        <table role="presentation" width="600" cellspacing="0" cellpadding="0" border="0"
          style="max-width:600px; background:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.1);">

          <!-- Header -->
          <tr>
            <td align="center" style="padding:20px 0;">
              <img src="https://qwaiting.com/images/qwaiting_logo.png" alt="Qwaiting Logo" width="180">
            </td>
          </tr>

          <!-- Content -->
          <tr>
            <td style="padding:0 25px 30px 25px; color:#333; line-height:1.6;">

              <!-- Banner -->
              <div style="padding:30px; background:#f4f1ff; text-align:center; border-radius:12px;">
                <h2 style="margin:0; font-size:22px; font-weight:600; color:#000;">
                  New Package Enquiry Received
                </h2>
              </div>

              <!-- Customer Info -->
              <table width="100%" cellpadding="0" cellspacing="0"
                style="background:#f9f9f9; border-radius:8px; margin:15px 0; padding:20px;">
                <tr>
                  <td style="font-size:16px; font-weight:bold; color:#6648e6;">
                    Customer Details
                  </td>
                </tr>
                <tr>
                  <td style="padding-top:10px; font-size:14px;">
                    <strong>Name:</strong> {{ $enquiry->full_name }}<br>
                    <strong>Company:</strong> {{ $enquiry->company_name }}<br>
                    <strong>Email:</strong> {{ $enquiry->email }}<br>
                    <strong>Mobile:</strong> {{ $enquiry->mobile_number }}
                  </td>
                </tr>
              </table>

              <!-- Enquiry Details -->
              <table width="100%" cellpadding="0" cellspacing="0"
                style="border:1px solid #eee; border-radius:8px; padding:20px; margin-bottom:15px;">
                <tr>
                  <td style="font-size:16px; font-weight:bold; color:#000;">
                    Enquiry Details
                  </td>
                </tr>
                <tr>
                  <td style="padding-top:10px; font-size:14px;">
                    <ul style="padding-left:18px; margin:0;">
                      <li><strong>Interested Package:</strong> {{ $enquiry->interested_package }}</li>
                      <li><strong>Billing Cycle:</strong> {{ $enquiry->billing_cycle }}</li> 
                    </ul>
                  </td>
                </tr>
              </table>


              <!-- CTA -->
              <a href="https://betaqwaiting.thevistiq.com/package-enquiries" target="_blank"
                style="display:block; max-width:250px; margin:25px auto 0; background:#6648e6; color:#fff; text-decoration:none; text-align:center; font-weight:600; padding:12px 0; border-radius:5px;">
                View in CRM
              </a>

            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td align="center" style="background:#f4f1ff; padding:15px 0; font-size:13px; color:#777;">
              © 2025 Qwaiting. All rights reserved.
            </td>
          </tr>

        </table>

      </td>
    </tr>
  </table>

</body>
</html>
