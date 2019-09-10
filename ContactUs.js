function myMap() {
var mapProp= {
  center:new google.maps.LatLng(-36.848461, 174.763336),
  zoom:10,

};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

    
var marker = new google.maps.Marker({
    position: new google.maps.LatLng(-36.8496507,174.7609214),
    map: map,
    title:"MGV"
  });
    
//marker.setMap(map);
    
/*var infowindow = new google.maps.InfoWindow({
  content:"Hello World!"
});

infowindow.open(map,marker);
}*/
    
 var content = '<div id="iw-container" class="container-fluid">' +
                    '<div class="iw-title">MGV</div>' +
                    '<div class="iw-content container-fluid">' +
                      '<div class="iw-subTitle">History</div>' +
                        '<p>MGV is a company which provides the service of car rental. MGV was established in the beginning of 2012 with 3 employees. The development team have decided to develop an online booking application which allows customers to make an online request to rent a car.</p>' +
                        '<div class="resp-container">' +
                            '<iframe class="resp-iframe" src="https://www.youtube.com/embed/-gxpLGIKGB4" width="260" height="160" frameborder="0" gesture="media"  allow="encrypted-media" allowfullscreen></object>' +
                       '</div>' +
                    '</div>' +
                  '</div>';
    
google.maps.event.addListener(marker, 'click', function() {
     map.setZoom(14);
  map.setCenter(marker.getPosition());
    infowindow.open(map,marker);
  });
    
var infowindow = new google.maps.InfoWindow({
    content: content,

    // Assign a maximum value for the width of the infowindow allows
    // greater control over the various content elements
    maxWidth: 350,
  });
    
google.maps.event.addListener(map, 'click', function() {
    infowindow.close();
  });

}