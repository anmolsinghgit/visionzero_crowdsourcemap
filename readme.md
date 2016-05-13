
####P4
## Boston Safety Application 

### Live URL
<http://p4.loosine.com>

### Description
These are locations where cyclists, pedestrians, motorists and  were “nearly missed” by motor vehicles. 

Description
Users with CRUD interactions are able to input locations of dangerous intersections in Boston using a form. Guests will be able to view all incidents, but only registered users will be able to create, edit, or delete incidents. Users can also search for address and view intersection in the google map to the right of the view. Users can also input data from the map directly. 

The latitude and longitude values of the locations will be used (in the future) to create new markers on the map with tooltips showing details about the “nearly missed” locations given by the user. 


### Demo
<http://screencast.com/t/x7PBy1Bq4Eo>

### Details for teaching team
 [Updated P4 Planning Doc](https://docs.google.com/document/d/1YRT9EuURJryZS46m-99nlrVMbIKe5mEvlHv5yHDzEoQ/edit#)
 
Project adheres to the requirements of the course, but I will continue to work on it in the upcoming weeks. Following the course, I will work to connect to Microsoft SQL server to input data into a database and then parse data to map points. Data from ArcGIS Map Service in json format<http://loosine.com/data>


### Outside code
###Laracast Utilities 
Did testing to explore interaction between php data parsing and mapping using this package.
<https://packagist.org/packages/laracasts/utilities>

Bootstrap
<http://getbootstrap.com/>

Google Maps API
<https://developers.google.com/maps/>

Data from Boston Transportation in ArcGIS ESRI Rest Service
<map01.cityofboston.gov:6080/arcgis/rest/services/BTD/VZSafety/MapServer/0/query>


### License
The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
