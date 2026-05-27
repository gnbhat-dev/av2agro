{{-- ============================================================ --}}
{{-- resources/views/emails/contact.blade.php --}}
{{-- ============================================================ --}}
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <style>
    body { font-family: Arial, sans-serif; color: #333; background: #f5f5f5; margin:0; padding:0; }
    .email-wrap { max-width: 580px; margin: 30px auto; background:#fff; border-radius:10px; overflow:hidden; }
    .email-header { background: #6a3013; color: #fff; padding: 24px 30px; }
    .email-header h2 { margin:0; font-size:18px; }
    .email-body { padding: 30px; }
    .field { margin-bottom: 16px; }
    .field label { font-size:12px; color:#999; text-transform:uppercase; letter-spacing:.5px; }
    .field p { margin:4px 0 0; font-size:15px; }
    .email-footer { background:#f9f9f9; border-top:1px solid #eee; padding:16px 30px; font-size:12px; color:#aaa; }
  </style>
</head>
<body>
  <div class="email-wrap">
    <div class="email-header">
      <h2>📬 New Contact Form Submission</h2>
    </div>
    <div class="email-body">
      <div class="field">
        <label>Name</label>
        <p>{{ $contactMessage->name }}</p>
      </div>
      <div class="field">
        <label>Email</label>
        <p>{{ $contactMessage->email }}</p>
      </div>
      <div class="field">
        <label>Mobile</label>
        <p>{{ $contactMessage->mobile ?? '—' }}</p>
      </div>
      <div class="field">
        <label>Message</label>
        <p style="white-space:pre-line">{{ $contactMessage->message }}</p>
      </div>
      <div class="field">
        <label>Received</label>
        <p>{{ $contactMessage->created_at->format('d M Y, h:i A') }}</p>
      </div>
    </div>
    <div class="email-footer">
      This message was sent via the Av2 Agro website contact form.
      <a href="{{ route('admin.messages.index') }}" style="color:#6a3013">View in Admin Panel</a>
    </div>
  </div>
</body>
</html>
