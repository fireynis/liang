<?php
App::bind('Nav', function()
{
   return new Liang\Nav\Navigation;
});

App::bind('SearchDB', function () 
{
	return new Liang\Search\SearchDB;
});