#  welcome
<div>
  <h4>
this project has for puprpose to be a POC of APIs creation.
    </h4>
 </div>


## <code>Installation</code>
<b>to install project :</b>
Clone down this repository. 
-<b>Backend</b>
<ul>
<li>in <code>/LBI_TEST</code> run composer install</li>
<li>edit .env file to point out your database</li>
<li>run php bin/console make:migration (answer yes to everything)</li>
<li>run php bin/console d:m:m (answer yes to eveything)</li>
<li>run php bin/console server:start</li>
</ul>
-<b>Frontend</b>
<ul>
<li>in <code>/LBI_CLIENT</code> npm install</li>
</ul>

### usage
## <code>Back-end</code>
the back part of the project was created with Symfony 5 and Api-platform 2.7
the back-end is only used to manage APis access.
Read operations are public but Write operations needs an Api Key.

***To get an Api Key :***
go to <code>localhost/register</code> and fill the form to create a new user.
in your database edit the new user Api_key field to set a key.
(the password is encrypted but Api key is not)

***To get an Available Endpoints:***
go to <code>localhost/api</code>

***part 2 Posters :***
in the project poster should be got from an outside Api (imdb)
I didn't got enough time to finish the feature  be here was the stategy :
each time an User ask our Api for a movie, Api check if Poster is available in our database. if not a new call is set to IMDB to get the poster. Before to render poster to the User we save it in the database. This way each poster will be asked only once. 

## <code>Front-end</code>
the front end is used to be the client part of the project.
only one Api call was implemented but it shows how we could consume Api.(No css here )

### Tech Library used:
  <ul>
  <li>React</li>
  <li>AXIOS</li>
  <li>Vitejs</li>
  <li>Symfony</li>
  <li>ApiPLatform</li>
  <li>Docker</li>
  <li>Mysql</li>

  </ul>


### Acknowledgments
<div>
  We take all the responsiblity for every single line of code.
</div>
