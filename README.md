# Flapit-WHMCS Integration

## Description
This PHP script retrieves the number of active support tickets from WHMCS and displays them in real-time on a Flapit device.

## Prerequisites
- WHMCS Installation
- Flapit Device
- PHP with cURL support

## Configuration

### WHMCS API Credentials
1. Obtain your WHMCS API credentials:
   - Go to Setup > Staff Management > API Credentials
   - Create a new API user with appropriate permissions

### Flapit Device
1. Create a Flapit device
2. Note down your:
   - Device ID
   - Token

### Script Configuration
Replace the following placeholders in the script:
- `'https://yourDomainNameWHMCS/includes/api.php'`: Your WHMCS API endpoint
- `'yourApiKeyUsername'`: Your WHMCS API username
- `'yourApiKeyPasswor'`: Your WHMCS API password
- `'yourFlapitDeviceId'`: Your Flapit device ID
- `'yourToken'`: Your Flapit device token

## Installation

1. Place the PHP script on your server
2. Set up a cron job or server-side scheduler to run the script every 60 seconds

### Example Cron Job
```bash
*/1 * * * * php /path/to/your/script.php
```

## Features
- Retrieves total number of active tickets from WHMCS
- Sends ticket count to Flapit device in real-time
- Prefix "SAV_" added to ticket count for easy identification

## Security Recommendations
- Keep API credentials confidential
- Use HTTPS for all API communications
- Implement proper server-side security measures

## Troubleshooting
- Ensure cURL is enabled in your PHP configuration
- Verify API credentials and endpoints
- Check server logs for any connection errors

## Contributing
Contributions are welcome. Please open an issue or submit a pull request.
