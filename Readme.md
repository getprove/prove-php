
# Prove PHP Wrapper

Here's a quick example of integration:

1. Clone the repository into your PHP application.

    ```bash
    git clone https://github.com/getprove/prove-php
    ```

2. Load the PHP library (API wrapper) for Prove at the top of your script.

    ```php
    require_once('/path/to/prove-php/lib/Prove.php');
    ```

3. Use the Prove API wrapper to get a list of verifications:

    ```php
    Prove::setApiKey('some-api-key');
    $verifications = Prove_Verification::list();
    echo $verifications
    ```


# API

Prove_Verification::all(); - return all verifications
Prove_Verification::create( array('tel' => 1234567890) ); - post and return a new verification

TODO:
Prove_verification::pin(id, pin) - Verify a pin
Prove_verification::retrieve(id) - Retrieve single verification