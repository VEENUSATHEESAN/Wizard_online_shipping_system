const accountSid = 'YOUR_ACCOUNT_SID';
const authToken = 'YOUR_AUTH_TOKEN';
const client = axios.create({
  baseURL: `https://api.twilio.com/2010-04-01/Accounts/${accountSid}/`,
  auth: {
    username: accountSid,
    password: authToken,
  },
});

console.log('Account SID:', accountSid);
console.log('Auth Token:', authToken);
console.log('Client:', client);

document.getElementById('send-sms-button').addEventListener('click', () => {
  const phoneNumber = document.getElementById('phone-number').value;

  console.log('Phone Number:', phoneNumber);

  if (!phoneNumber) {
    console.error('Phone number is required');
    showMessage('Phone number is required', 'error');
    return;
  }

  if (!validatePhoneNumber(phoneNumber)) {
    console.error('Invalid phone number format');
    showMessage('Invalid phone number format', 'error');
    return;
  }

  client.post('Messages.json', {
    body: 'Your package has been delivered.',
    from: '+1234567890', // Twilio number
    to: phoneNumber, // User's phone number
  })
  .then(() => {
    showMessage('SMS notification sent', 'success');
  })
  .catch((error) => {
    console.error(error);
    showMessage('Error sending SMS notification', 'error');
  });
});

function validatePhoneNumber(phoneNumber) {
  const regex = /^\+\d{1,3}[-\.\s]??\d{1,4}[-\.\s]??\d{1,4}[-\.\s]??\d{1,4}$/;
  return regex.test(phoneNumber);
}

function showMessage(message, type = 'info') {
  const messageElement = document.getElementById('message');
  messageElement.textContent = message;
  messageElement.classList.remove('success', 'error', 'info');
  messageElement.classList.add(type);
}