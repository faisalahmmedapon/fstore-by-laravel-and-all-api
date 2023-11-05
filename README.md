<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).










****************** mail setup start from here ******************

A guide to Laravel events and listeners

Have you ever wanted to build an application that responds to user activity? Laravel events and listeners can help you achieve that. In this tutorial, you'll learn how to create events and respond to them in your Laravel applications.

Events are occurrences within a system you may be developing in which the system is notified so that your code can respond to that occurrence. It can be described as "Action begets Reaction." For example, if you are building a fintech application, a mail is sent to the admin each time a withdrawal request is made. In turn, the admin can either approve or decline the request. Basically, events notify your program that an activity has occurred and perform any associated follow-up actions.

This article extensively discusses events and listeners in Laravel. Here are a few things you'll learn:

    What are events and listeners in Laravel?
    The relationship between events and observers in Laravel
    The definition of events and listeners
    How to dispatch an event

A complete implementation of this tutorial is available on GitHub. If you have any questions or find any bugs, please feel free to open an issue.
Prerequisites

The following links will help you keep up with this tutorial:

    Composer installed globally
    Laravel 8 already installed
    Beginner knowledge of Laravel
    Postman

Events and listeners in Laravel

In Laravel, events are a straightforward means to apply the observer pattern for your application's activity. As the name suggests, listeners watch (listen) for events in your application. However, they can only listen for certain events; each listener must first be assigned to a specific event.

The ability of one event to have numerous independent listeners makes events and listeners an excellent tool for decoupling web applications. Laravel provides support with certain default functionality to handle events in an application.

It is a good tool for maintaining abstraction and prioritizing clean code standards. We often overload our classes with functionalities, which causes the functionality of many of our applications to break if the class changes. This is not a good practice, and this is when events come in handy.
The relationship between event handlers and event listeners

The terms "event handler" and "event listener" are occasionally used interchangeably. Although they work together, there is a slight difference between the two.

The listener is a class that performs event instructions. Registering an event handler means that the code is executed after an event occurs. On the other hand, the event listener waits for the event to occur before triggering the code to handle it.

Essentially, the code executed in response to an event is called a handler, while the listener keeps an eye out for when the event occurs.
Laravel observers vs. Laravel events

The observer pattern monitors the system's status and responds when it changes. Although events and listeners are a basic implementation of observer patterns, there are also Model Observers, which represent a comparative approach designed exclusively for eloquent models. The main idea behind observers is that they watch for specific things that only occur in eloquent Models (creating a record, updating a record, deleting a record, etc.). However, the use of events is not limited to models because events are general and applicable anywhere in your application. The model observer is the best option if you listen to many events in a particular eloquent model.
Laravel jobs vs. Laravel event listeners

Generally, events enable you to listen for an activity in your application and provide a follow-up reaction; jobs are scheduled classes on a queue, ready to be executed. While jobs are always explicitly called, events are on the lookout, waiting to be called. For example, a job can be a simple script to calculate the account balance every month; an event can be to send email verification to a new user immediately after a successful sign-up. Events can also be queued. However, jobs do not wait for activity in the application to be executed.
Using events and listeners in Laravel

To explore a use case, let's build a sample subscription API that shows how to use events in Laravel. After a user subscribes, a welcome email is sent to the user and a follow-up email is sent to the admin. Let's dive in🚀!

Create a Laravel Application Create a new Laravel project via the Laravel installer or the Composer command.


composer create-project laravel/laravel project_name

Connect to your database

I wrote an article that explains how to connect a Laravel Application to a MySQL database. If you have a different database, connect to it appropriately.
Set up a model and migrations

Use the following Artisan command to create a model and migration simultaneously for subscribers:

php artisan make:model Subscriber -m

This generates a migration file called xxxx_xx_xx_xxxxxx_create_subscribers_table.php in the database/migrations directory and a model file called Subscribers.php in the app/Models directory.

In the migration file, define the fields of the subscribers' table. Here, we only need the subscribers' email. Update the up() method of the migration file.

public function up()
{
Schema::create('subscribers', function (Blueprint $table) {
$table->id();
$table->string('email');
$table->timestamps();
});
}

Add the $fillable property to the top of the Subscriber class. This defines which fields on the subscribers' model are fillable.

protected $fillable = ['email'];

Now migrate these changes to your database by running this Artisan command:

php artisan migrate

Set up the mailing system

In this example, you send two emails—a follow-up to the admin and a welcome mail to the subscriber.

To create the Mailable (app/Mail/Welcome.php) and its corresponding view template (resources/views/emails/welcome.blade.php), run the following Artisan command:

php artisan make:mail Welcome --markdown=emails.welcome

php artisan make:mail AdminFollowup --markdown=emails.admin.followup

Update the Welcome mailable with the necessary action details in the mail as you desire. In this tutorial, I only update the subject of the mail.

return new Envelope(
subject: 'Welcome to this Newsletter',
);

Update the corresponding welcome file in the resources/views/emails/welcome.blade.php directory with the body contents of the welcome mail.

<x-mail::message>
# Welcome to the sample newsletter

Thanks for joining the weekly Sample Newsletter. Each issue is sent every Sunday at 8 AM EST and includes links to all the latest happenings in the Sample world and elsewhere. I attempt to curate the best items so you can quickly scan and find things that are useful and interesting. It's the best way of quickly remaining up-to-date.


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

Update the Admin mailable with the necessary action details of the mail.

return new Envelope(
subject: 'New Subscriber: Admin Follow up',
);

Update the corresponding followup file in the resources/views/emails/admin/followup.blade.php directory with the body contents of the follow-up mail.

<x-mail::message>
# You have a new subscriber
You have a new user subscribed to your newsletter. Here is a quick reminder to perform the necessary follow up and categorize your subscriber so they can have a smooth experience with your newsletter.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

    This is merely a sample tutorial. Explore and be as descriptive as possible with your email contents.

To know more about sending emails in Laravel , visit the official documentation.

Lastly, set up the mail environment variables in the .env file. Use the credentials that match the mail configurations you are using for your application.

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=xxxxx
MAIL_PASSWORD=xxxxx
MAIL_ENCRYPTION=xxxx
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

Create events and listeners

Approaching the core aspect of this tutorial, manually create an event, and corresponding listeners, for when a user registers.

    Note: You can either create events and listeners manually and register them on the EventServiceProvider or first define them and generate them from the EventServiceProvider using php artisan event:generate.

To create a new event, run the following Artisan command:

php artisan make:event UserRegistered

This command generates a new file called UserRegistered.php with an event class in the app/Events directory. An event class serves as a data container for event-related data. Update the event class with an instance of all the data required for this event.

public $email;
/**
* Create a new event instance.
*
* @return void
  */
  public function __construct($email)
  {
  $this->email         = $email;
  }

Create two listeners for the UserRegistered event—one to send a welcome mail to the user and another to send the admin a follow-up mail.

You can use the --event flag to define which event should be responded to by the listener you create.

php artisan make:listener SendWelcomeMail --event=UserRegistered

php artisan make:listener SendAdminMail --event=UserRegistered

This command generates two listener classes, as specified in the app/Listeners directory. You can perform all necessary responses to the event that are part of the listener's handle method.

Update the handle() method of the SendWelcomeMail listener to send a welcome email to the new user.

public function handle(UserRegistered $event)
{
//perfom more actions(if need be)
Mail::to('user-email-address')->send(new Welcome());
}

Update the handle() method of the SendAdminMail listener to send a follow-up prompt to the admin.

public function handle(UserRegistered $event)
{
//perfom more actions(if need be)
Mail::to('user-email-address')->send(new AdminFollowup());
}

    Remember to import the necessary mail classes at the beginning of the file.

Update the event service provider

The EventServiceProvider.php is located in the app/Providers directory. It allows you to register your application's event listeners in one place. All events (keys) and listeners(values) are listed in an array through the listen-to property. Update the $listen array of the event service provider in the following manner:

protected $listen = [
Registered::class => [
SendEmailVerificationNotification::class,
],
UserRegistered::class => [
SendWelcomeMail::class,
SendAdminMail::class
]
];

    Remember to import the classes where necessary.

Set up the controller

The controller includes all the logic that enables users to subscribe to the newsletter and define every other follow-up action. To create a new controller, run the following Artisan command:

php artisan make:controller SubscriberController

This will create a new file called Subscriber.php in the app/Http/Controllers directory. After creating the file, add the following import statements to import the required classes:

use App\Events\UserRegistered;
use App\Models\Subscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

Now, define a method that includes the logic for users to subscribe to the newsletter.

public function subscribe(Request $request){

    //validate the request data
    $validator = Validator::make($request->all(), [
        'email'  =>  'required|email',
    ]);

    if ($validator->fails()) {
        return new JsonResponse(['success' => false, 'message' => $validator->errors()], 422);
    }

    // subscribe to the newsletter
    Subscriber::create([
        'email'=> $request->email
    ]);

// call the event
event(new UserRegistered($request->email));

    return new JsonResponse(['success' => true, 'message' => "Thank you for subscribing to the Sample newsletter!"], 200);
}

In the snippet above, first, you validate the data to ensure that the email address is valid. Visit the Laravel official documentation to know more about form request validation. Proceed to create a new subscriber, and then dispatch the event. To dispatch the event, simply send the event class object to the event() method. The event looks out for its respective listener(s) in the EventServiceProvider and executes its logic.
Set up the routes

You need one route for users to subscribe to your newsletter.

To define this route, add the following code to routes/api.php.

Route::post('/subscribe', [SubscriberController::class, 'subscribe']);

Then, add the import statement to the top of the file.

use App\Http\Controllers\SubscriberController;

Following this pattern implies that if there is more logic to perform after a user subscribes, you do not need to edit the subscribe() method in the controller. Instead, you create a new listener and map it to that event. In this manner, the subscribe() method handles the creation of a subscriber and dispatches an event, while the listener(s) handle(s) the other associated responsibilities.



****************** mail setup done from here ******************




****************** pusher real time chat application from here ******************


Laravel pusher real time chat application build with javaScript jQuery

In this tutorial we will build a live chat application using laravel 9.3 and php 8.1.5, javascript, jquery and pusher. After complete the chat app development we will see a live example how two users chat each other in real time. For building this app we have to follow bellow steps.


I'm using the following versions:



Laravel 9.3 ( You can use any other versions)

PHP 8.1.5



1. Install a fresh laravel project
2. Create pusher account and app
3. Configure .env with pusher app credentials (driver pusher)
4. Create event
5. Add Request Response and Event in web.php
6. Create chat page (welcome.php)
7. Link app.css and app.js file in chat page from resource
8. Install npm, pusher js and pusher server
9. Make changes in bootstrap.js
10. Chat js code in app.js
11. BroadcastServiceProvider
12. Test app






Step-1: Install a fresh laravel project



let's Install a fresh laravel project using composer or laravel installer.

/* using laravel installer*/
laravel new laravel-chat-application

/* using composer*/
composer create-project laravel/laravel laravel-chat-application







Step-2: Create pusher account and app



Create  an account in pusher official website and create an app







Step-3: Configure .env with pusher app credentials (driver pusher)



Now we set pusher credentials in .env file and also change BROADCAST DRIVER log to pusher


BROADCAST_DRIVER=pusher

PUSHER_APP_ID=your-pusher-app-id
PUSHER_APP_KEY=your-pusher-key
PUSHER_APP_SECRET=your-pusher-secret
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=your-pusher-cluster







Step-4: Ceate event and make changes in event file.



Now we have to create an event. You can make an event with any name by artisand command. Let's run bellow command to create an event with the name Message.


php artisan make:event Message



See our event file is successfully created in app\Events\Message.php  which is located at app directory. Now open event file Message.php and make required changes. See the example code bellow class Message implements ShouldBroadcast and now we create a channel name like chat and also change the channel PrivateChannel to Channel in broascastOn() method. Keep in mind you are free to give a channel name. Next we have to create  a method like broadcastAs() in which we return our event name message.



<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Message implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $username;
    public $message;

    public function __construct($username,$message)
    {
        $this->username = $username;
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new Channel('chat');
    }

    public function broadcastAs()
    {
        return 'message';
    }
}

 

 

 

Step-5: Add Request Response and Event in web.php

 

In this step we have to open web.php file and add request response and event.

Note: Don't forget to import Message and Request at the beginning of the file.

<?php

use App\Events\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::post('send-message',function (Request $request){
    event(new Message($request->username, $request->message));
    return ['success' => true];
});

 

 

 

Step-6: Create chat page welcome.php

 

It's time to create our chat page. Just create a blade file in views directory or you can convert your welcome page into chat page. I'm designing the welcome.blade.php file  with the chat design markup. Bellow our chat markup code. 

Note: Don't forget to add app.css and app.js also bootstrap and jquery link.

 

welcome.php

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite(['resources/css/app.css' , 'resources/js/app.js'])
    <title>Live Chat</title>
</head>
<body>
<div class="app">
    <div class="row">

        <div class="col-sm-6 offset-sm-3 my-2">
            <input type="text" class="form-control" name="username" id="username" placeholder="Enter a user ..........">
        </div>

        <div class="col-sm-6 offset-sm-3">
            <div class="box box-primary direct-chat direct-chat-primary">

                <div class="box-body">
                    <div class="direct-chat-messages" id="messages"></div>
                </div>

                <div class="box-footer">
                    <form action="#" method="post" id="message_form">
                        <div class="input-group">
                            <input type="text" name="message" id="message" placeholder="Type Message ..." class="form-control">
                            <span class="input-group-btn">
                                <button type="submit" id="send_message"  class="btn btn-primary btn-flat">Send</button>
                          </span>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>

 

 

 

 

Step-7: Add required css for chat page in app.css file

 

Now we need to add some css code in app.css for our chat design so that the markup looks much better. In app.css file paste the following code.

body{
    margin-top:20px;
    background:#eee;
}
.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
}
.box.box-primary {
    border-top-color: #3c8dbc;
}

.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;
}

.direct-chat .box-body {
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    position: relative;
    overflow-x: hidden;
    padding: 0;
}
.direct-chat-messages {
    padding: 10px;
    height: 150px;
    overflow: auto;
}

 

 

 

Step-8: Install npm, pusher js and pusher server

 

This part is the most important because we are going to install required packages for real time chat. At first we have to install npm secondly compile our js file thirdly pusher js and finally install pusher server. Let's run bellow command.

Note: While install pusher-php-server (4th command) must stop artisan server (php artisan serve) otherwise get errors.


npm install
npm run dev
npm install --save laravel-echo pusher-js
composer require pusher/pusher-php-server


 

 

 

Step-9: Make changes in bootstrap.js

 

Once Echo is installed, we are ready to create a fresh Echo instance in our application's JavaScript. We can do this is at the bottom of the resources/js/bootstrap.js file that is included with the Laravel framework. By default, an example Echo configuration is already included in this file -  we can simply uncomment it or add the following code bottom of the file.

 

resources/js/bootstrap.js

import _ from 'lodash';
window._ = _;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });


import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true
});

 

 

 

Step-10: Chat js code in app.js

 

Well, we do everything except some mini task. Now we need to write our js code in resources/js/app.js. Simply add the bellow code in your app.js file.

 

resources/js/app.js

import './bootstrap';

$(document).ready(function(){

    $(document).on('click','#send_message',function (e){
        e.preventDefault();

        let username = $('#username').val();
        let message = $('#message').val();

        if(username == '' || message == ''){
            alert('Please enter both username and message')
            return false;
        }

        $.ajax({
            method:'post',
            url:'/send-message',
            data:{username:username, message:message},
            success:function(res){
                //
            }
        });

    });
});

window.Echo.channel('chat')
    .listen('.message',(e)=>{
        $('#messages').append('<p><strong>'+e.username+'</strong>'+ ': ' + e.message+'</p>');
        $('#message').val('');
    });

 

 

 

Step-11: Finaly uncomment BroadcastServiceProvider from config/app.php

 

config/app.php

'providers' => [

         App\Providers\BroadcastServiceProvider::class,

    ],

 

 

 

Step-12: Test app

 

Once you have uncommented and adjusted the Echo configuration according to your needs, you may compile your application's assets:

php artisan serve
npm run dev

****************** pusher real time chat application from here ******************
