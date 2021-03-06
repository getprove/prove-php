
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
```php
Prove_Verification::all(); - return all entries
Prove_Verification::create( array('tel'=>1234567890) ); - post and return a new entry
Prove_verification::pin(array('id'=>id,'pin'=>pin)) - Verify an entry matching id using pin
Prove_verification::retrieve(id) - Return a single entry matching id
```

# Values

- tel 		string		-> phone number
- updated 	timestamp	-> last update
- created	timestamp	-> created
- test		bool		-> using testApi
- verified	bool		-> pin has been entered
- call		bool
- text		bool
