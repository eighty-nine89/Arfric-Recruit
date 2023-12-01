<?php


// importing necessary files
require_once(realpath(__DIR__ . "/config.php"));


/**
 * function to has a password, applies the password_hash function on the password
 * @param string $password password to hash
 * @return string hashed password
 */
function hashPassword($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}

/**
 * function to verify password
 * @param string $password password to verify
 * @param string $hash hashed password to verify
 * @return bool true if match, false otherwise
 */
function validatePassword($password, $hash)
{
    return password_verify($password, $hash);
}

/**
 * function to create csrf_token
 * @return string csrf_token
 */
function createCsrfToken()
{
    $seed = random_bytes(8);
    $session_id = session_id();
    $time = time();

    $hash = hash_hmac("sha256", $seed . $session_id . $time, CSRF_TOKEN_KEY, true);

    return urlSafeEncode($hash . SEPARATOR . $seed . SEPARATOR . $time);
}

/**
 * function to validate url token
 * @param string $token the token to validate
 * @return bool
 */
function validateCsrfToken($token)
{
    $decoded_token = urlSafeDecode($token);
    $parts = explode(SEPARATOR, $decoded_token);
    $hash = $parts[0];
    $seed = $parts[1];
    $time = $parts[2];
    $session_id = session_id();

    $generatedHash = hash_hmac("sha256", $seed . $session_id . $time, CSRF_TOKEN_KEY, true);

    return hash_equals($hash, $generatedHash);
}


/**
 * function to make a string safe to pass in url
 * @return string url safe string
 */
function urlSafeEncode(string $string)
{
    return rtrim(strtr(base64_encode($string), "+/", "_-"), "=");
}

/**
 * function to decode a url safe string
 * @param string $string the string to decode
 * @return string url-safe decoded string
 */
function urlSafeDecode($string)
{
    return base64_decode(strtr($string, "_-", "+/"));
}

/**
 * function to get the domain name of an email
 * @param string $email
 * @return string domain name of email
 */
function getEmailDomain($email)
{
    $email_len = strlen($email);
    $at_pos = strpos($email, "@");
    $domain = substr($email, $at_pos + 1, $email_len);
    return $domain;
}

/**
 * function to validate password format
 * @param string $password
 * @return bool true if password format is valid, false otherwise
 */
function validatePasswordFormat($password)
{
    $pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[~\\-\\s=+_!@#$%\\^,.\\\])(?=.{8,})/";
    return preg_match($pattern, $password);
}
