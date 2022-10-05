## About the project

As a team of 5, we had the opportunity to test everything we learnt during the Full Stack Web Development course by <a href="https://boolean.careers/">Boolean</a>.
Our task consisted in mimicking some of the functionalities of <a href="https://deliveroo.it/it/">deliveroo.it</a>

##  Front End

We built our Front End around the Vue.js framework, using the Vue Router library.
An unregistered user can filter by categories through the various restaurants, which are fetched through Axios calls from our MySql database. The guest can then choose one of the restaurants from which to order and proceed to a simulation of payment, managed through a sandbox offered by Braintree.

## Back End

A restaurant owner can register and have the opportunity to manage the restaurant dishes and the clients orders. 
This part was created using Laravel and the LaravelUI package. The user can also find a graph summarizing the orders trend through the year, which uses the Chart.js library.