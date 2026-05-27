<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>New contact message</title>
</head>
<body style="font-family:Segoe UI,Roboto,Helvetica,Arial,sans-serif;line-height:1.6;color:#333;">
  <p>You have a new contact form submission on <strong>{{ config('app.name') }}</strong>.</p>

  <table cellpadding="8" cellspacing="0" style="border-collapse:collapse;max-width:560px;">
    <tr>
      <td style="font-weight:bold;border-bottom:1px solid #eee;">Name</td>
      <td style="border-bottom:1px solid #eee;">{{ $contactMessage->name }}</td>
    </tr>
    <tr>
      <td style="font-weight:bold;border-bottom:1px solid #eee;">Email</td>
      <td style="border-bottom:1px solid #eee;"><a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email }}</a></td>
    </tr>
    <tr>
      <td style="font-weight:bold;border-bottom:1px solid #eee;">Mobile</td>
      <td style="border-bottom:1px solid #eee;">{{ $contactMessage->mobile ?: '—' }}</td>
    </tr>
    <tr>
      <td colspan="2" style="font-weight:bold;padding-top:16px;">Message</td>
    </tr>
    <tr>
      <td colspan="2" style="white-space:pre-wrap;">{{ $contactMessage->message }}</td>
    </tr>
  </table>

  <p style="margin-top:24px;font-size:12px;color:#888;">Sent at {{ $contactMessage->created_at->timezone(config('app.timezone'))->toDayDateTimeString() }}</p>
</body>
</html>
