# OnePay
OnePay is a payment system that allows you to pay for services and products in a single click.

## Structure
**OnePay implements a modular architecture using "Laravel Modules" package** (we'll see some feature later, don't worry), offering benefits such as improved maintainability, scalability, and organization.

## Installation

We're assuming you have already configured your github ssh key, if you didn't please follow the next documentation: https://docs.github.com/en/authentication/connecting-to-github-with-ssh/adding-a-new-ssh-key-to-your-github-account

Clone the repository & install dependencies:

```sh
git clone git@github.com:onepayai/backend.git
cd backend
cp .env.example .env
composer install
npm install
```
In this proccess you may have to put some usernames & passwords, please contact your partner to get this information.

## Running the Project
You can set up the project in your local environment using some features that Laravel offers, please follow the documentation.
- Up with Herd (Only for MacOS & Windows): https://herd.laravel.com/
- Up with Valet: https://laravel.com/docs/11.x/valet

Dont forget to see Laravel installation documentation: https://laravel.com/docs/11.x/installation

## FAQ

#### How to create a module
Creating a module is simple and straightforward. Run the following command to create a module.

``` bash
php artisan module:make <module-name>
```

Replace `<module-name>` by your desired name.

It is also possible to create multiple modules in one command.

``` bash
php artisan module:make Payment User Auth
```

By default when you create a new module, the command will add some resources like a controller, seed class, service provider, etc. automatically. If you don't want these, you can add `--plain` flag, to generate a plain module.

``` bash
php artisan module:make Payment --plain
# or
php artisan module:make Payment -p
```

#### How to name controller

- Use singular name for controller
- Use at first model name.
  - Use the second object name if the controller is not related to the model.
- Use the action name if the controller is not related to the model.
  - GET
  - CREATE
  - UPDATE
  - DELETE
  - LIST
- Example: `UserCreateController`, `UserUpdateController`, `CustomerCardsController`
- Foldering
  - Use the model name for the folder name.
- Example: `User/UserCreateController`

#### How to Test event and listener connection

- Example: 
  - `test('assert that events are listening', function () {
    Event::fake();
    Event::assertListening(PaymentApprovedEvent::class, PaymentApprovedListener::class);
    });`

#### How to run pint

``` bash
./vendor/bin/pint
# with type coverage
./vendor/bin/pest --type-coverage
```

#### How to run php stan

``` bash
./vendor/bin/phpstan analyse
```

#### How to run test

``` bash
./vendor/bin/pest
# or specific group
./vendor/bin/pint --group "payment-service"
# or specific test
./vendor/bin/pest --filter "payment paid for non subscription/bill"
```

## Packages

This project is currently extended with the following packages.

| Plugin | README |
| ------ | ------ |
| Laravel Modules | [https://nwidart.com/laravel-modules/v6/introduction/] |
| Laravel Wallet  | [https://bavix.github.io/laravel-wallet/guide/introduction/] |
| Laravel Excel   | [https://docs.laravel-excel.com/3.1/getting-started/] |
| Filament        | [https://filamentphp.com/] |
| Livewire        | [https://laravel-livewire.com/] |
| DomPDF          | [https://github.com/dompdf/dompdf/] |
| Pint            | [https://laravel.com/docs/11.x/pint && https://cs.symfony.com/doc/rules/index.html] |
| Pest            | [https://pestphp.com/docs] |
=======
### Helper functions
#### is_test_mode:
- In a productive environment, if a user or company is not logged in, it will always return true.
