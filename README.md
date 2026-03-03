# Event Registration System with WhatsApp Integration using PHP

## Features
- Student registration via Google Form (embedded in index.html)
- Responses managed in Google Sheets
- (Legacy) WhatsApp confirmation via Twilio API

## Setup Instructions
1. Create your Google Form for event registration.
   - Include fields: Name, Email, Phone, College, Event Name, etc.
   - Set up dropdowns for Event Name, Number of Attendees, Payment Method.
2. Get the Google Form embed link.
3. Replace the iframe src in `index.html` with your Google Form embed URL.
4. Open `index.html` in your browser to access the registration form.

## File Structure
- index.html: Google Form embedded for registration
- register.php: Redirects to index.html (legacy)
- send_whatsapp.php: WhatsApp Integration (legacy)
- vendor/: Twilio SDK (legacy)

## Additional Features (Optional)
- Admin panel, Excel export, QR code, email confirmation, payment gateway

## Documentation Structure
- Introduction
- Existing System
- Proposed System
- System Architecture
- Database Design
- Module Description
- Screenshots
- Conclusion

---
For any issues, check PHP error logs and Twilio dashboard for message status.