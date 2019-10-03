<?php
session_start(); 
?>
<html>
<title>Welcome to Go Green Travel</title>
<head><link rel="stylesheet"  href="flightcs.css">
	<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <meta charset="utf-8">
<link rel="stylesheet" href="css/newstyle.css" type="text/css" media="all">
</head>

<BODY >
	<div id="response">
   <nav>
      <ul id="menu">
        <li id="menu_active"><a href="index.html"><span><span>Home</span></span></a></li>
        <li id="menu_active"><a href="update.php"><span><span>View Profile and Update details</span></span></a></li>
        <li class="menu_active"><a href="contacts.html"><span><span>Contacts</span></span></a></li>
        <li> <a href="index.html?logout='1'";>logout</a> </li>
      </ul>
    </nav>
      <?php  if (isset($_SESSION['username'])) : ?>
      <li><p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p></li>
    <?php endif ?>
    
    <form action="flight2.php" method="post">
<div class="booking-form-box">
	<div class="radio-btn">
		<input type="radio"class="btn" name="check" checked="checked">
		<span>Roundtrip</span>
		<input type="radio" class="btn" name="check"><span>One Way</span>
<input type="radio"class="btn" name="check"><span>Multi-City</span>
<div class="booking-form">
<div class="form-group">
  <label class="control-label">Depature</label>
  <input id="autocomplete" class="autocomplete-airport" type="text" name="valueToSearch" />
</div>

<div class="form-group">
  <label class="control-label">Destination</label>
  <input id="autocomplete2" class="autocomplete-airport" type="text" name="valueToSearch"></div><br>
<div class="form-group">
<label class=control-label>Depature Date:</label>
<input id="date" type="date" value="2019-06-01">
</div>

	<div class="input-grp">
		<label>Adults</label>
		<input type="number" class="form-control" value="1">

	</div>
	<div class="input-grp">
		<label>Children</label>
		<input type="number" class="form-control" value="0">

	</div>
	<div class="input-grp">
		<label>Class</label>
		<select class="custom-select">
		<option value="1">Economy</option>
		<option value="2">Business</option>
		<option value="3">First Class</option>
</select>
	</div>
	<div class="input-grp">
		<button type="submit" class="btn btn-primary flights" name="search">Show Flights</button>
    
	</div>
	
</div>
	</div>
	</div>

</div>
</div>
</form>
<script>var dateControl = document.querySelector('input[type="date"]');
dateControl.value = '2017-06-01';</script>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.16.1/lodash.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://unpkg.com/fuse.js@2.5.0/src/fuse.min.js'></script>
<script src='https://screenfeedcontent.blob.core.windows.net/html/airports.js'></script>
<script id="rendered-js">
     var options = {
  shouldSort: true,
  threshold: 0.4,
  maxPatternLength: 32,
  keys: [{
    name: 'iata',
    weight: 0.5
  }, {
    name: 'name',
    weight: 0.3
  }, {
    name: 'city',
    weight: 0.2
  }]
};

var fuse = new Fuse(airports, options)

$('.autocomplete-airport').each(function() {
  var ac = $(this);
  
   ac.on('click', function(e) {
    e.stopPropagation();
  })
  .on('focus keyup', search)
  .on('keydown', onKeyDown);
  
  var wrap = $('<div>')
    .addClass('autocomplete-wrapper')
    .insertBefore(ac)
    .append(ac);
  
    var list = $('<div>')
      .addClass('autocomplete-results troll')
      .on('click', '.autocomplete-result', function(e) {
        e.preventDefault();
        e.stopPropagation();
        selectIndex($(this).data('index'), ac);
    })
    .appendTo(wrap);
  
 var counter = 0;
  counter++;
   $(".autocomplete-wrapper").addClass("_" + counter);
  
  // $(".autocomplete-airport").click(function(){
$(".autocomplete-airport").focus(function(){
    $(ac ).toggleClass("yes");
  // $(this).addClass(".autoyes");
  $(".autocomplete-result").closest(".autocomplete-results").addClass("in");
});

});

$(document)
  .on('mouseover', '.autocomplete-result', function(e) {
    var index = parseInt($(this).data('index'), 10);
    if (!isNaN(index)) {
      $(this).attr('data-highlight', index);
    }
  })
  .on('click', clearResults);

function clearResults() {
  results = [];
  numResults = 0;
  $('.autocomplete-results').empty();
}

function selectIndex(index, autoinput) {
  if (results.length >= index + 1) {
    autoinput.val(results[index].iata + " - " + results[index].name + " - " + results[index].city);
    clearResults();
  }  
}

var results = [];
var numResults = 0;
var selectedIndex = -1;

function search(e) {
  if (e.which === 38 || e.which === 13 || e.which === 40) {
    return;
  }
  var ac = $(e.target);
  var list = ac.next();
  if (ac.val().length > 0) {
    results = _.take(fuse.search(ac.val()), 7);
    numResults = results.length;
    
    var divs = results.map(function(r, i) {
        return '<div class="autocomplete-result" data-index="'+ i +'">'
             + '<div><b>'+ r.iata +'</b> - '+ r.name +'</div>'
             + '<div class="autocomplete-location">'+ r.city +', '+ r.country +'</div>'
             + '</div>';
     });
    
    selectedIndex = -1;
    list.html(divs.join(''))
      .attr('data-highlight', selectedIndex);

  } else {
    numResults = 0;
    list.empty();
  }
}

function onKeyDown(e) {
  var ac = $(e.currentTarget);
  var list = ac.next();
  switch(e.which) {
    case 38: // up
      selectedIndex--;
      if (selectedIndex <= -1) {
        selectedIndex = -1;
      }
      list.attr('data-highlight', selectedIndex);
      break;
    case 13: // enter
      selectIndex(selectedIndex, ac);
      break;
    case 9: // enter
      selectIndex(selectedIndex, ac);
      e.stopPropagation();
      return;
    case 40: // down
      selectedIndex++;
      if (selectedIndex >= numResults) {
        selectedIndex = numResults-1;
      }
      list.attr('data-highlight', selectedIndex);
      break;

    default: return; // exit this handler for other keys
  }
  e.stopPropagation();
  e.preventDefault(); // prevent the default action (scroll / move caret)
}

var counter = 0;
$(".autocomplete-wrapper").each(function () {
    counter++;
    var self = $(this);
    self.addClass("row_" + counter);
    var tdCounter = 0;
    self.find('.autocomplete-results').each(function (index) {
      $( ".autocomplete-wrapper" ).find( ".autocomplete-results" ).addClass("intro");
    //     tdCounter++;
    //     if (index == 0) {
    //         $(this).css({ "margin-left": 30,'float': 'left'});
    //     }
    //     $(this).addClass("row_" + counter + tdCounter);
    //   // $("button").click(function(){
    // $(this).addClass("intro");
// });
    });
});
    </script>



</BODY>

</html>