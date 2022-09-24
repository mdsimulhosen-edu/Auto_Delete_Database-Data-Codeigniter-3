<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') or define('SHOW_DEBUG_BACKTRACE', TRUE);
defined('VIDEOJS')  or define('VIDEOJS', [
    '9z1x9ww3u9j83Mijr5Z6omAzEq9JWE',
    'pa4KPwI6zusqY22jnjlSptYLthGLMG',
    'g7YI52pEtl8cqyfUy65TuHw2gYWA94',
    'aBdosM7q47uHtfQfm3OAC87n9N7GIU',
    'DxAFVahqrL80shQU0xGb3LYrKmQp4Y',
    'epct57JVFDdCKgYQQ30euHKhJxFLws',
    'bBhyBHuka5kglC8XpV7f5xhpnDUcFz',
    'HzV3f0p6MRcv1g7ulRHSBLuEgbdH55',
    'zHtj7KCB50OsOfkDHnjJuUvFMkxnoA',
    'XSG4y4akNLpZVKARUKEJZtoet91875',
    'MhTFsBBjKARgIQtiGoJXbqtE6w2WvP',
    '0smfAD5L0Oy586X9iQaTeo30JvNsHR'
]);
defined('STREAMJS')  or define('STREAMJS', [
    '43GQwOGFJEPHQal1Y4UInQohJry8Wb',
    'bV98mKcLFF0aCHFwTOW1hCSXMaJuVV',
    'ios5CAKz07dKiLyp1F8b0vEQp5t9kR',
    'iNHQx5iCSiEu2BbcBWsV3Ad1N3f5eE',
    'wfx0O6rNztttxw4iT680kPgRuuQK4A',
    'j303VVkkVX9SSNgzWPjGHQ24M0HWVV',
    '6J5ulTvzMHCyk1mh7bDuuBi6BkMqAV',
    'pAtB83IyeiMO9QpS1E9bF4J5Pg5mpu',
    'dh4W4wVDXVzwFvVDf1RWGrJXj5jRAv',
    'hxONxsIvtLAdvFBg7Rmfeo5ZPAqzeG',
    'zB6JZAmBVYIVMeCj07OpBPGmMvpJHi',
    'iv5xtogvgnY0HUbD1ntIJ6gg9i4pgy'
]);
defined('SCRYPT')  or define('SCRYPT', [
    'n1Rg042PCwgtTPJyyHt3D9D9cp02K5',
    'h9HtEvWOzYH7Bd31yylJxtmCXoKoil',
    'CMfzR8rJD2UXIgHba4fNgOxzP97V3v',
    '41lNWNO2KYb3AsQlW324Urie3CjBrK',
    'UvaSpwqjh3N13JILh8rtbjGqwvHXmQ',
    'CfxatlN4hfgC9eXacDaECeGgjWqpGG',
    'tKGnkl7NanoUnR0IVkfEyIpaGvxTpo',
    'VqtXkbqNHFkTFy7bgPql6K6G6MyoF4',
    'aTtETdQO2dvLsga0EGEIFFTspurHZC',
    '5mb09ihdfkAd0y6MAqHPlcL9ZluhPs',
    'fGIcmvy3NetiC5S2Hws4OPtjymzgpN',
    '0gCiXW3yxtbZonI3sryplSyuYv8AK6',
]);
/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  or define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') or define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   or define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  or define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           or define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     or define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       or define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  or define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   or define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              or define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            or define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       or define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        or define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          or define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         or define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   or define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  or define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') or define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     or define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       or define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      or define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      or define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code
