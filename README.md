# Testing My Knowledge

This app is built using a sail image. Either clone the repo to your local machine or download the zip file to your machine.

### Build and run the application 
To run in terminal cd in to the working directory, type `./vendor/bin/sail up` this will then build and run the application on the first `sail up`. 

### Open the bash for the application
Once the application is running, type `./vendor/bin/sail shell` this will open the bash for the application. When open run `npm install`, this will install the dependancies that are used within the application. Once complete run `npm run dev` or `npm run watch`.

### Get That Database Going
Within the bash/shell run the following command `php artisan migrate`, this will create the database. 
Database login details are simple using the laravel database log in.

`Server Host : localhost`
`port : 3306`
`database : testingknowledge`
`username : root`
`password : `

### Seeing the application
Open browser, Chromes always a good one. open [localhost](http://localhost). 

The app is a little bare at the moment, maybe log in and create some images and have a little voting fun.

### Register and Login
The site does use bootstrap ui auth framework for user registration and login for the application. 
Click on the register button in the top right had corner, register so you can have some fun.
Once you have registered this will log you into the application. 

Please upload any of your own images, or you can use the images provided within the
