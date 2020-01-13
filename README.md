# Technical Assessment Summary
this application is created for E-Blocks as an assessment for Jacques Artgraven and focusses on demonstrating competince in a number of technologies

#backend
the backend is written in python with django and django-rest-framework. 
this needs better security but i am just demonstrating compitence here so please let me know if i need to demonstrate better security 
i did a nosql database here and the only reason i would have for using this would be working with unstructured data

please insure you follow django standards and
run and activate a virtual wrapper
then run the migrations
the user should be in the nosql db but for your own ease use the django createsuperuser function
sorry i am assuming python and django experience here. please confirm if you need proper documentation or i will make some over time

#frontend
the backend is in symfony 5 with vuejs for its display
i havent gotten far but essentially it will login to the api and write the token to a session then
here again knowledge of vuejs and symfony is assumed but a few core commands will be
insure composer install and yarn install has been run unless your an npm guy or girl
then you can kick off the symfony built in server and run the dynamic build with 

yarn encore dev-server --hot
symfony server:start 

i dont do a database here because the assessment only wanted a nosql so i decided to demonstrate compitence in python, php, nosql, vuejs and rest.

given more time i can make this rock with proper layout and crud but unfortunantly my current time only allowed me a single day to work on this.

please let me know what you would like to see more of and ps i am still writing unit tests. the initials are setup here so long but the api communication i still need to finish but i plan to do that as i would test driven style when i made the crud

right now if you have created a django user and insured that user has an access token you can use both the django admin or the api to do crud and in the vuejs part you can login and call tables with read data

and yes i would love to refactor and clean this up more so will be doing so as time allows
