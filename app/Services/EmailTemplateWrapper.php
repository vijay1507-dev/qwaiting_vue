<?php

namespace App\Services;

class EmailTemplateWrapper
{
    /**
     * Wrap email content with the standard email template wrapper.
     */
    public function wrap(string $bodyContent): string
    {
        // Get logo URL from config or use default
        $logoUrl = config('mail.logo_url', 'https://beta.qwaiting.com/storage/logo/3/80/kI7GpiPMhzY3zP0xPrkWqXUL5cGoYbzSK85eaEFw.png');

        // Get footer content from config and replace year placeholder
        $footerContent = config('mail.footer_content', 'Copyright {{year}} © Qwaiting Inc. All Rights Reserved.');
        $currentYear = now()->year;
        $footerContent = str_replace('{{year}}', (string) $currentYear, $footerContent);

        return '<div style="background:#e8e8e8;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,sans-serif;font-size:13px;line-height:1.4;padding:2% 7%">
            <img id="Qwaiting" src="'.$logoUrl.'" alt="logo" class="CToWUd" style="vertical-align:middle;" width="100">
            <div style="background:#fff;border-top-color:#6e8cce;border-top-style:solid;border-top-width:4px;margin:25px auto;border-radius: 8px;">
                <div style="border-color:#e5e5e5;border-style:none solid solid;border-width:2px;padding:7%">
                    <div>
                        '.$bodyContent.'
                    </div>
                </div>
            </div>
            <div style="text-align:center" align="center">
                <p style="color:#999;font-size:11px;line-height:1.4;margin:5px 0">'.$footerContent.'</p>
            </div>
        </div>';
    }
}
