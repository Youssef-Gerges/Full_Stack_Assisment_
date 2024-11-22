# Secure Modular Document Storage

Easy Api to save txt files as encrypted files on host with laravel

# Ensuring Data Security:
by using `aes-128-cbc` different keys for Header and Body and all keys encrypted before entering database by Crypt facade then encoded as base64 and when retrieve data first decode it to the encrypted text then decrypt the text to plain encryption key then decrypt the file all this steps are internal the app without any sharing of data or keys over requests

## How to run app:
- Clone repository
- Rename .env.example to .env
- Run command ` php artisan key:generate ` to generate app key
- Add database configuration to .env file
- Run all migrations by command `php artisan migrate`


## How to migrate a Module:

By using endpoint POST: `{{base_url}}/modules/migrate` and body 
```json
{
    "module": "motors"  // can be general | jobs | motors
}
```

## How to upload document:
By login first to get auth token by POST: ` {{base_url}}/auth/login ` and body

```json
{
    "email": "general@user.com", // general@user.com | motors@user.com | jobs@user.com
    "password": "123456789"
}
```

By using endpoint POST: `{{base_url}}/{{module}}/documents` and body 
```json
Header: Header FIle,
Body: Body File,
meta_title: File Meta Title
```

## How to show all files
By using endpoint GET: `{{base_url}}/{{module}}/documents` and will return meta_title and combined file

## How to show file by id
By using endpoint GET: ` {{base_url}}/{{module}}/documents/{{id}} ` and will return meta_title and combined file
