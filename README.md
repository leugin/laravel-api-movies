# Api movies

Template for testing new libraries and factures on php , also content many practices examples for good practices 

## Comenzando 🚀

Download the project from github

Show **Deployment** for know how start the proyect with docker


### Pre-requisitos 📋

* docker 
* docker composer

### Install Linux 🔧

location in te folder of project
```
cd {project}/docker
```
copy de demo config file
```
cp .env.example .env
```
Run
```
docker-composer up
```
Run
```
cd ..
```
Grant permission
```
sudo chmod -R 777 storage
```
Grant permission
```
sudo chmod -R 777 bootstrap/cache
```
copy de demo config file
```
cp .env.example .env
```
Install 
```
php artisan app:install
```



#### Routes

| route        | description           | method |required token  |
| -------------|:---------------------:| ---------------:| ----: |
|/api/v1/auth/login   |login |GET| NO |
| api/v1/movies    | list of movies |GET |YES|
| api/v1/movies   | store movie |POST|YES|
| api/v1/movies/{id}   | update movie |PUT|YES|
| api/v1/movies/{id}   | delete movie |DELETE|YES|
| api/v1/movies/{id}   | show movie |GET|YES|
 



