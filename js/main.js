window.onload = loadScript;

/**********************
 * Google Maps Scripts *
 ***********************/
var markers = [];
var infos = [];
var fbUserId;
// global variable (currently open infowindow)
function initialize() {
	var myLatlng = new google.maps.LatLng(37.5637, 126.9365037);
	var initialLocation;
	var mapOptions = {
		zoom : 11,
		center : myLatlng,
		disableDefaultUI : true
	};

	var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	(function() {/*
		 OverlappingMarkerSpiderfier
		 https://github.com/jawj/OverlappingMarkerSpiderfier
		 Copyright (c) 2011 - 2012 George MacKerron
		 Released under the MIT licence: http://opensource.org/licenses/mit-license
		 Note: The Google Maps API v3 must be included *before* this code
		 */
		var h = !0, u = null, v = !1;
		(function() {
			var A, B = {}.hasOwnProperty, C = [].slice;
			if ((( A = this.google) != u ? A.maps :
				void 0) != u)
				this.OverlappingMarkerSpiderfier = function() {
					function w(b, d) {
						var a, g, f, e, c = this;
						this.map = b;
						d == u && ( d = {});
						for (a in d)B.call(d, a) && ( g = d[a], this[a] = g);
						this.e = new this.constructor.g(this.map);
						this.n();
						this.b = {};
						e = ["click", "zoom_changed", "maptypeid_changed"];
						g = 0;
						for ( f = e.length; g < f; g++)
							a = e[g], p.addListener(this.map, a, function() {
								return c.unspiderfy();
							});
					}

					var p, s, t, q, k, c, y, z;
					c = w.prototype;
					z = [w, c];
					q = 0;
					for ( k = z.length; q < k; q++)
						t = z[q], t.VERSION = "0.3.3";
					s = google.maps;
					p = s.event;
					k = s.MapTypeId;
					y = 2 * Math.PI;
					c.keepSpiderfied = v;
					c.markersWontHide = v;
					c.markersWontMove = v;
					c.nearbyDistance = 20;
					c.circleSpiralSwitchover = 9;
					c.circleFootSeparation = 23;
					c.circleStartAngle = y / 12;
					c.spiralFootSeparation = 26;
					c.spiralLengthStart = 11;
					c.spiralLengthFactor = 4;
					c.spiderfiedZIndex = 1E3;
					c.usualLegZIndex = 10;
					c.highlightedLegZIndex = 20;
					c.legWeight = 1.5;
					c.legColors = {
						usual : {},
						highlighted : {}
					};
					q = c.legColors.usual;
					t = c.legColors.highlighted;
					q[k.HYBRID] = q[k.SATELLITE] = "#fff";
					t[k.HYBRID] = t[k.SATELLITE] = "#f00";
					q[k.TERRAIN] = q[k.ROADMAP] = "#444";
					t[k.TERRAIN] = t[k.ROADMAP] = "#f00";
					c.n = function() {
						this.a = [];
						this.j = [];
					};
					c.addMarker = function(b) {
						var d, a = this;
						if (b._oms != u)
							return this;
						b._oms = h;
						d = [p.addListener(b, "click", function(d) {
							return a.F(b, d);
						})];
						this.markersWontHide || d.push(p.addListener(b, "visible_changed", function() {
							return a.o(b, v);
						}));
						this.markersWontMove || d.push(p.addListener(b, "position_changed", function() {
							return a.o(b, h);
						}));
						this.j.push(d);
						this.a.push(b);
						return this;
					};
					c.o = function(b, d) {
						if (b._omsData != u && (d || !b.getVisible()) && !(this.s != u || this.t != u))
							return this.unspiderfy( d ? b : u);
					};
					c.getMarkers = function() {
						return this.a.slice(0);
					};
					c.removeMarker = function(b) {
						var d, a, g, f, e;
						b._omsData != u && this.unspiderfy();
						d = this.m(this.a, b);
						if (0 > d)
							return this;
						g = this.j.splice(d,1)[0];
						f = 0;
						for ( e = g.length; f < e; f++)
							a = g[f], p.removeListener(a);
						delete b._oms;
						this.a.splice(d, 1);
						return this;
					};
					c.clearMarkers = function() {
						var b, d, a, g, f, e, c, m;
						this.unspiderfy();
						m = this.a;
						b = g = 0;
						for ( e = m.length; g < e; b = ++g) {
							a = m[b];
							d = this.j[b];
							f = 0;
							for ( c = d.length; f < c; f++)
								b = d[f], p.removeListener(b);
							delete a._oms;
						}
						this.n();
						return this;
					};
					c.addListener = function(b, d) {
						var a, g;
						(( g = (a=this.b)[b]) != u ? g : a[b] = []).push(d);
						return this;
					};
					c.removeListener = function(b, d) {
						var a;
						a = this.m(this.b[b], d);
						0 > a || this.b[b].splice(a, 1);
						return this;
					};
					c.clearListeners = function(b) {
						this.b[b] = [];
						return this;
					};
					c.trigger = function() {
						var b, d, a, g, f, e;
						d = arguments[0];
						b = 2 <= arguments.length ? C.call(arguments, 1) : [];
						d = ( a = this.b[d]) != u ? a : [];
						e = [];
						g = 0;
						for ( f = d.length; g < f; g++)
							a = d[g], e.push(a.apply(u, b));
						return e;
					};
					c.u = function(b, d) {
						var a, g, f, e, c;
						f = this.circleFootSeparation * (2 + b) / y;
						g = y / b;
						c = [];
						for ( a = e = 0; 0 <= b ? e < b : e > b; a = 0 <= b ? ++e : --e)
							a = this.circleStartAngle + a * g, c.push(new s.Point(d.x + f * Math.cos(a), d.y + f * Math.sin(a)));
						return c;
					};
					c.v = function(b, d) {
						var a, g, f, e, c;
						f = this.spiralLengthStart;
						a = 0;
						c = [];
						for ( g = e = 0; 0 <= b ? e < b : e > b; g = 0 <= b ? ++e : --e)
							a += this.spiralFootSeparation / f + 5E-4 * g, g = new s.Point(d.x + f * Math.cos(a), d.y + f * Math.sin(a)), f += y * this.spiralLengthFactor / a, c.push(g);
						return c;
					};
					c.F = function(b, d) {
						var a, g, f, e, c, m, l, x, n;
						e = b._omsData != u;
						(!e || !this.keepSpiderfied) && this.unspiderfy();
						if (e || this.map.getStreetView().getVisible() || "GoogleEarthAPI" === this.map.getMapTypeId())
							return this.trigger("click", b, d);
						e = [];
						c = [];
						a = this.nearbyDistance;
						m = a * a;
						f = this.c(b.position);
						n = this.a;
						l = 0;
						for ( x = n.length; l < x; l++)
							a = n[l], a.map != u && a.getVisible() && ( g = this.c(a.position), this.f(g, f) < m ? e.push({
								A : a,
								p : g
							}) : c.push(a));
						return 1 === e.length ? this.trigger("click", b, d) : this.G(e, c);
					};
					c.markersNearMarker = function(b, d) {
						var a, g, f, e, c, m, l, x, n, p;
						d == u && ( d = v);
						if (this.e.getProjection() == u)
							throw "Must wait for 'idle' event on map before calling markersNearMarker";
						a = this.nearbyDistance;
						c = a * a;
						f = this.c(b.position);
						e = [];
						x = this.a;
						m = 0;
						for ( l = x.length; m < l; m++)
							if ( a = x[m], !(a === b || a.map == u || !a.getVisible()))
								if ( g = this.c(( n = ( p = a._omsData) != u ? p.l :
									void 0) != u ? n : a.position), this.f(g, f) < c && (e.push(a), d))
									break;
						return e;
					};
					c.markersNearAnyOtherMarker = function() {
						var b, d, a, g, c, e, r, m, l, p, n, k;
						if (this.e.getProjection() == u)
							throw "Must wait for 'idle' event on map before calling markersNearAnyOtherMarker";
						e = this.nearbyDistance;
						b = e * e;
						g = this.a;
						e = [];
						n = 0;
						for ( a = g.length; n < a; n++)
							d = g[n], e.push({
								q : this.c(( r = ( l = d._omsData) != u ? l.l :
								void 0) != u ? r : d.position),
								d : v
							});
						n = this.a;
						d = r = 0;
						for ( l = n.length; r < l; d = ++r)
							if ( a = n[d], a.map != u && a.getVisible() && ( g = e[d], !g.d)) {
								k = this.a;
								a = m = 0;
								for ( p = k.length; m < p; a = ++m)
									if ( c = k[a], a !== d && (c.map != u && c.getVisible()) && ( c = e[a], (!(a < d) || c.d) && this.f(g.q, c.q) < b)) {
										g.d = c.d = h;
										break;
									}
							}
						n = this.a;
						a = [];
						b = r = 0;
						for ( l = n.length; r < l; b = ++r)
							d = n[b], e[b].d && a.push(d);
						return a;
					};
					c.z = function(b) {
						var d = this;
						return {
							h : function() {
								return b._omsData.i.setOptions({
									strokeColor : d.legColors.highlighted[d.map.mapTypeId],
									zIndex : d.highlightedLegZIndex
								});
							},
							k : function() {
								return b._omsData.i.setOptions({
									strokeColor : d.legColors.usual[d.map.mapTypeId],
									zIndex : d.usualLegZIndex
								});
							}
						};
					};
					c.G = function(b, d) {
						var a, c, f, e, r, m, l, k, n, q;
						this.s = h;
						q = b.length;
						a = this.C( function() {
							var a, d, c;
							c = [];
							a = 0;
							for ( d = b.length; a < d; a++)
								k = b[a], c.push(k.p);
							return c;
						}());
						e = q >= this.circleSpiralSwitchover ? this.v(q, a).reverse() : this.u(q, a);
						a = function() {
							var a, d, k, q = this;
							k = [];
							a = 0;
							for ( d = e.length; a < d; a++)
								f = e[a], c = this.D(f), n = this.B(b, function(a) {
									return q.f(a.p, f);
								}), l = n.A, m = new s.Polyline({
									map : this.map,
									path : [l.position, c],
									strokeColor : this.legColors.usual[this.map.mapTypeId],
									strokeWeight : this.legWeight,
									zIndex : this.usualLegZIndex
								}), l._omsData = {
									l : l.position,
									i : m
								}, this.legColors.highlighted[this.map.mapTypeId] !== this.legColors.usual[this.map.mapTypeId] && ( r = this.z(l), l._omsData.w = {
									h : p.addListener(l, "mouseover", r.h),
									k : p.addListener(l, "mouseout", r.k)
								}), l.setPosition(c), l.setZIndex(Math.round(this.spiderfiedZIndex + f.y)), k.push(l);
							return k;
						}.call(this);
						delete this.s;
						this.r = h;
						return this.trigger("spiderfy", a, d);
					};
					c.unspiderfy = function(b) {
						var d, a, c, f, e, k, m;
						b == u && ( b = u);
						if (this.r == u)
							return this;
						this.t = h;
						f = [];
						c = [];
						m = this.a;
						e = 0;
						for ( k = m.length; e < k; e++)
							a = m[e], a._omsData != u ? (a._omsData.i.setMap(u), a !== b && a.setPosition(a._omsData.l), a.setZIndex(u), d = a._omsData.w, d != u && (p.removeListener(d.h), p.removeListener(d.k)),
							delete a._omsData, f.push(a)) : c.push(a);
						delete this.t;
						delete this.r;
						this.trigger("unspiderfy", f, c);
						return this;
					};
					c.f = function(b, d) {
						var a, c;
						a = b.x - d.x;
						c = b.y - d.y;
						return a * a + c * c;
					};
					c.C = function(b) {
						var d, a, c, f, e;
						f = a = c = 0;
						for ( e = b.length; f < e; f++)
							d = b[f], a += d.x, c += d.y;
						b = b.length;
						return new s.Point(a / b, c / b);
					};
					c.c = function(b) {
						return this.e.getProjection().fromLatLngToDivPixel(b);
					};
					c.D = function(b) {
						return this.e.getProjection().fromDivPixelToLatLng(b);
					};
					c.B = function(b, c) {
						var a, g, f, e, k, m;
						f = k = 0;
						for ( m = b.length; k < m; f = ++k)
							if ( e = b[f], e = c(e), "undefined" === typeof a || a === u || e < g)
								g = e, a = f;
						return b.splice(a,1)[0];
					};
					c.m = function(b, c) {
						var a, g, f, e;
						if (b.indexOf != u)
							return b.indexOf(c);
						a = f = 0;
						for ( e = b.length; f < e; a = ++f)
							if ( g = b[a], g === c)
								return a;
						return -1;
					};
					w.g = function(b) {
						return this.setMap(b);
					};
					w.g.prototype = new s.OverlayView;
					w.g.prototype.draw = function() {
					};
					return w;
				}();
		}).call(this);
	}).call(this);
	/* Tue 7 May 2013 14:56:02 BST */

	var oms = new OverlappingMarkerSpiderfier(map);
	//Spider for overlapping markers

	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			// When user allowed to send their location
			initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
			map.setCenter(initialLocation);
			map.setZoom(14);
			// 현재 위치를 가져와서 화면의 중심으로 만드는 단계

			var markersArray = [];

			var marker = new google.maps.Marker({
				position : initialLocation,
				map : map,
				icon : 'images/eye1.png',
				title : "Hello!",
				content : 'Current Location'
			});
			oms.addMarker(marker);
			markersArray.push(marker);
			var infowindow = new google.maps.InfoWindow();
			oms.addListener('click', function(marker, event) {
				markers[0] = marker;
				closeInfos();
				infowindow.setContent(marker.content);
				infowindow.open(map, marker);
				infos[0] = infowindow;
			});

			//Initialize a variable that the auto-size the map to whatever you are plotting
			var bounds = new google.maps.LatLngBounds();
			//Initialize the encoded string
			var encodedString;
			//Initialize the array that will hold the contents of the split string
			var stringArray = [];
			//Get the value of the encoded string from the hidden input
			encodedString = document.getElementById("encodedString").value;
			//Split the encoded string into an array the separates each location
			stringArray = encodedString.split("****");

			var limitOfX = stringArray.length;

			var Rating, ratingScore;

			for (var i = 0; i < limitOfX; i = i + 1) {
				var addressDetails = [];
				var marker;
				var info;
				//Separate each field
				addressDetails = stringArray[i].split("&&&");
				//Load the lat, long data
				var lat = new google.maps.LatLng(addressDetails[1], addressDetails[2]);
				/*
				 ratingScore = addressDetails[3] * 2;
				 if(0 <= ratingScore && ratingScore < 3) {
				 Rating = 0;
				 }
				 else if(3 <= ratingScore && ratingScore < 7){
				 Rating = 1;
				 }
				 else {
				 Rating = 2;
				 }*/
				Rating = Math.round(addressDetails[3] * 2);
				var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + PinColor(Rating), new google.maps.Size(21, 34), new google.maps.Point(0, 0), new google.maps.Point(10, 34));
				//Create a new marker and info window
				marker = new google.maps.Marker({
					map : map,
					position : lat,
					//Content is what will show up in the info window
					// title : title_variable
					content : addressDetails[0],
					icon : pinImage
				});

				oms.addMarker(marker);
				//Pushing the markers into an array so that it's easier to manage them
				markersArray.push(marker);
				info = new google.maps.InfoWindow({
					maxWidth : 240
				});

				oms.addListener('click', function(marker, event) {
					markers[0] = marker;
					closeInfos();
					info.setContent(marker.content);
					info.open(map, marker);
					infos[0] = info;
				});
				oms.addListener('spiderfy', function(markers) {
					info.close();
				});
				//Extends the boundaries of the map to include this new location
				//bounds.extend(lat);
			}
			//Takes all the lat, longs in the bounds variable and autosizes the map
			//map.fitBounds(bounds);

			//Manages the info windows
			function closeInfos() {
				if (infos.length > 0) {
					infos[0].set("marker", null);
					infos[0].close();
					infos.length = 0;
				}
			}

			function PinColor(Rating) {
				switch(Rating) {
					case 0:
						return '555';
						break;
					case 1:
						return '707070';
						break;
					case 2:
						return '898989';
						break;
					case 3:
						return 'a1a1a1';
						break;
					case 4:
						return 'b7b7b7';
						break;
					case 5:
						return 'ccc';
						break;
					case 6:
						return 'e1e1e1';
						break;
					case 7:
						return 'fff';
						break;
					case 8:
						return '70ad47';
						break;
					case 9:
						return 'ffc000';
						break;
					case 10:
						return 'ff0000';
						break;
					default:
						return 'ffc000';
						break;
				}
			}

		});

	}

	/*
	 // Create the DIV to hold the control and
	 // call the HomeControl() constructor passing
	 // in this DIV.
	 var homeControlDiv = document.createElement('div');
	 var homeControl = new HomeControl(homeControlDiv, map);

	 homeControlDiv.index = 1;
	 map.controls[google.maps.ControlPosition.TOP_RIGHT].push(homeControlDiv);*/

}

/**
 * The HomeControl adds a control to the map that simply
 * returns the user to Chicago. This constructor takes
 * the control DIV as an argument.
 * @constructor
 */
/*
 function HomeControl(controlDiv, map) {

 // Set CSS styles for the DIV containing the control
 // Setting padding to 5 px will offset the control
 // from the edge of the map
 controlDiv.style.padding = '15px';
 controlDiv.setAttribute("id", "controlDiv");

 // Set CSS for the control border
 var controlUI = document.createElement('div');
 controlUI.setAttribute("id", "signInButton");
 controlUI.style.backgroundColor = '#4285f4';
 controlUI.style.borderStyle = 'solid';
 controlUI.style.borderWidth = '0px';
 controlUI.style.borderRadius = '2pt';
 controlUI.style.cursor = 'pointer';
 controlUI.style.textAlign = 'center';
 controlUI.title = 'Click to sign in';
 controlDiv.appendChild(controlUI);

 // Set CSS for the control interior
 var controlText = document.createElement('div');
 controlText.setAttribute("id", "signInText");
 controlText.style.fontFamily = 'Arial,sans-serif';
 controlText.style.fontSize = '14px';
 controlText.style.color = 'white';
 controlText.style.paddingLeft = '12px';
 controlText.style.paddingRight = '12px';
 controlText.style.paddingTop = '7px';
 controlText.style.paddingBottom = '7px';
 controlText.innerHTML = '<b>Sign in</b>';
 controlUI.appendChild(controlText);

 // Setup the click event listeners
 google.maps.event.addDomListener(controlUI, 'click', function() {

 });

 }*/

function facebookLogin() {
	FB.login(function(response) {
		var fbname;
		var accessToken = response.authResponse.accessToken;
	}, {
		scope : 'publish_stream'
	});
}

function loadScript() {

	var script = document.createElement('script');
	script.type = 'text/javascript';
	script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
	document.body.appendChild(script);

	document.getElementById("controlDiv").style.display = 'block';
}

/***************************
 * Facebook Sign in Scripts *
 ****************************/
// This is called with the results from from FB.getLoginStatus().
function statusChangeCallback(response) {
	console.log('statusChangeCallback');
	console.log(response);
	// The response object is returned with a status field that lets the
	// app know the current login status of the person.
	// Full docs on the response object can be found in the documentation
	// for FB.getLoginStatus().s
	if (response.status === 'connected') {
		// Logged into your app and Facebook.
		afterFBLogin();
	} else if (response.status === 'not_authorized') {
		// The person is logged into Facebook, but not your app.
		//document.getElementById('status').innerHTML = 'Please log ' + 'into this app.';
	} else {
		// The person is not logged into Facebook, so we're not sure if
		// they are logged into this app or not.
		//document.getElementById('status').innerHTML = 'Please log ' + 'into Facebook.';
	}
}

// This function is called when someone finishes with the Login
// Button.  See the onlogin handler attached to it in the sample
// code below.
function checkLoginState() {
	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
}

window.fbAsyncInit = function() {
	FB.init({
		appId : '664834296899835',
		cookie : true, // enable cookies to allow the server to access
		// the session
		xfbml : true, // parse social plugins on this page
		version : 'v2.0' // use version 2.0
	});

	// Now that we've initialized the JavaScript SDK, we call
	// FB.getLoginStatus().  This function gets the state of the
	// person visiting this page and can return one of three states to
	// the callback you provide.  They can be:
	//
	// 1. Logged into your app ('connected')
	// 2. Logged into Facebook, but not your app ('not_authorized')
	// 3. Not logged into Facebook and can't tell if they are logged into
	//    your app or not.
	//
	// These three cases are handled in the callback function.

	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});

	FB.Event.subscribe('auth.login', function(response) {
		document.location.reload();
	});

};

// Load the SDK asynchronously
( function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id))
			return;
		js = d.createElement(s);
		js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

// Here we run a very simple test of the Graph API after login is
// successful.  See statusChangeCallback() for when this call is made.
function afterFBLogin() {
	//window.alert('hello');
	//document.getElementById("signInText").innerHTML = 'Sign Out';

	//controlDiv.removeChild(controlUI);

	console.log('Welcome!  Fetching your information.... ');
	FB.api('/me', function(response) {
		console.log('Successful login for: ' + response.name);
		//document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.name + '!';
		document.getElementById("signInButton").style.display = 'none';
		document.getElementById("postButton").style.display = '';
		if (response) {
			var image = document.getElementById('userImage');
			image.src = 'http://graph.facebook.com/' + response.id + '/picture';
			fbUserId = response.id;
			/*
			 var name = document.getElementById('name');
			 name.innerHTML = response.name
			 var id = document.getElementById('id');
			 id.innerHTML = response.id*/

		}

	});
	//var controlDiv = document.getElementById("controlDiv");

}

// Rate function
// show submit button and submits
var doNotCheckTwice = [];
function rate(id, rating) {
	var ratingSubmit = document.getElementById("ratingSubmit");
	if (doNotCheckTwice[id] != true) {
		$.ajax({
			url : '../php/didRate.php',
			data : {
				contentId : id,
				user : fbUserId
			},
			type : 'post',
			success : function(output) {
				if (output == '1') {// already rated
					ratingSubmit.setAttribute("onclick", "");
					ratingSubmit.style.display = 'none';
					var oldContent = markers[0].content;
					var newContent = oldContent.replace(/(px;. class=.rating-default.\>\<\/div\>)/, 'px; z-index: 7\' class=\'rating-default\'></div>');
					newContent = newContent.replace(/(\<div class=.rating-default-bg.\>\<\/div\>)/, '<div style="z-index: 6;" class="rating-default-bg"></div>');
					newContent = newContent.replace(/(onclick=.rate\(.*?\).)/g, 'onclick="alert(\'You already voted this cast!\')"');
					markers[0].content = newContent;
					infos[0].setContent(newContent);
					alert("You already voted this cast!");
				} else {
					document.getElementById("ratingResult").style.display = 'none';
					ratingSubmit.style.display = 'inline';
					ratingSubmit.setAttribute("onclick", "submitRate(" + id + "," + rating + ", " + fbUserId + ");");
				}
			}
		});
		doNotCheckTwice[id] = true;
	} else {
		document.getElementById("ratingResult").style.display = 'none';
		ratingSubmit.style.display = 'inline';
		ratingSubmit.setAttribute("onclick", "submitRate(" + id + "," + rating + ", " + fbUserId + ");");
	}
}

function submitRate(id, rating, userid) {
	$.ajax({
		url : '../php/rate.php',
		data : {
			contentId : id,
			contentRating : rating,
			userId : userid
		},
		type : 'post',
		success : function(output) {
			ratingSubmit.setAttribute("onclick", "");
			ratingSubmit.style.display = 'none';
			var oldContent = markers[0].content;
			var contentArr = oldContent.split(/(\<h5 id=.ratingResult. style=.display: .{4,6}; margin: 0 0 0 -9px; color: #9e0b0f.\>)/);
			contentArr = contentArr[2].split(' ');
			var oldRating = parseFloat(contentArr[0]);
			contentArr = contentArr[1].split('(');
			contentArr = contentArr[1].split(')');
			var oldRatNum = parseInt(contentArr[0]);
			var newRatNum = oldRatNum + 1;
			var newRating = (oldRating * oldRatNum + rating / 2) / newRatNum;
			newRating = newRating.toFixed(2);
			var newContent = oldContent.replace(/(\<h5 id=.ratingResult. style=.display: .{4,6}; margin: 0 0 0 -9px; color: #9e0b0f.\>.*\<\/h5\>\<h5)/, '<h5 id="ratingResult" style="display: inline; margin: 0 0 0 -9px; color: #9e0b0f">' + newRating + ' (' + newRatNum + ')</h5><h5');
			newContent = newContent.replace(/(\<div style=.width: .{1,6}px;. class=.rating-default.\>\<\/div\>)/, '<div style="width: ' + 2 * 8 * newRating + 'px; z-index: 7;" class="rating-default"></div>');
			newContent = newContent.replace(/(\<div class=.rating-default-bg.\>\<\/div\>)/, '<div style="z-index: 6;" class="rating-default-bg"></div>');
			newContent = newContent.replace(/(onclick=.rate\(.*?\).)/g, 'onclick="alert(\'You already voted this cast!\')"');
			markers[0].content = newContent;
			infos[0].setContent(newContent);
			alert(output);
		}
	});
}