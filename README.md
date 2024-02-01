>This is my first ***effort*** readme. I am sorry for any mistakes and would gladly accept any/all suggestions.

# Welcome

This is an anonymous messaging website. The concept is nothing new but I just wanted to create something using my web development skills and this is the result.

The website was live on the domain ```sharemsg.me``` for about a year and thus you will find a lot of reference to it throughout the project.

I started this project in Jan 2023. However i accidently pushed some sensitive information (nothing fatal though) on the previous repository, so i created this new repository.

# Tools used

- HTML
- CSS
- JS
- Jquery
- PHP

# Setup process

- Clone the repo to the desired location using ```git clone https://github.com/sanjeev-san/anonymous.git```

- Replace ```http://localhost/anonymous``` with the location of the project in your case. This replacement should across the entire project. I used XAMPP and my project was inside the htdocs folder.

- Go to ``config/sharemsg.sql`` .  Copy the content of this and run it in your database sql interface. This will create required tables alongwith testing data.

- Setup the database configurations in ```config/db.php``` file.

# OneSignal setup (optional)

- Create your onesignal account and do the necessary setup there. Follow the there guid (or any other that you prefer) for the web integration of their API.

- The ```js/``` folder has the *service worker for onesignal* provided Onesginal. They keep updating their API , so make sure file is up to date.
>The service worker for/of onesignal is kept in a different path because it conflicted with the service worker in root path required for PWA.

- [This line](https://github.com/sanjeev-san/anonymous/blob/main/inbox.php#L44) is the subscription button to Onesignal's notification API for a user. You can remove/edit as per your use case. 

- The ```config/notify.php``` contains code to send users a notifcation if they have unread messages in last 48 hours. You will need ```app_id template_id auth_secret``` to use the feature. You can use your own logic or any other method than mine.

# PWA

- ```manifest.json``` and ```sw.js``` together make the PWA function. The setup is folowing standard and basic procedures , nothing fancy.

- I made a custom PWA signup/user-approval function. It works on the home page ```/home.php``` only.

# Some things that you might want to know

- ```config/todo.html``` is just a todo list that i did or was supposed to do. Also ```TODO``` is marked throughout the files as well.
- ``.htaccess`` contains redirect rules.
- ``config/function.php`` contains various and all functions used throught the php files.
