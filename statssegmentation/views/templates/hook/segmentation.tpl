<div class="config-container">
	<div class="header">
		<h4>Welcome to the configuration tab</h4>
		<span>Here you can select the different criteria you need to segment your client base :</span>
	</div>

	<form method="post">

	    <div class="roll-container">
	        <div class="profile" onclick="displayDiv('profile')">
	            <p>Profile</p>
	        </div>
	        <div class="hidden-div" id="profile">
							<table>
								{foreach $segmentation_profile_criterias as $criterias}
									{$criterias}
								{/foreach}
							</table>
	        </div>
	    </div>

	    <div class="roll-container2">
	        <div class="behaviour" onclick="displayDiv('behaviour')">
	            <p>Behaviour</p>
	        </div>
	        <div class="hidden-div under-hidden" id="behaviour">
	            <div onclick="displayDiv('activity')" class="category-border">
	                <p>Activity</p>
	            </div>
	                <div id="activity" class="detail-under-div">
	                    <table>
	                		    {foreach $segmentation_activity_criterias as $criterias}
									{$criterias}
								{/foreach}
	                    </table>
	                </div>
	            <div onclick="displayDiv('purchases')" class="category-border">
	                <p>Specific purchases & amounts</p>
	            </div>
	                <div id="purchases" class="detail-under-div">
	                    <table>
	                   			{foreach $segmentation_purchases_criterias as $criterias}
									{$criterias}
								{/foreach}
	                    </table>
	                </div>
	            <div onclick="displayDiv('abandoned')" class="category-border">
	                <p>Abandoned carts</p>
	            </div>
	                <div id="abandoned" class="detail-under-div">
	                    <table>
								{foreach $segmentation_abandoned_criterias as $criterias}
									{$criterias}
								{/foreach}
	                    </table>
	                </div>
	            <div onclick="displayDiv('habits')" class="category-border">
	                <p>Habits</p>
	            </div>
	                <div id="habits" class="detail-under-div">
	                    <table>
								{foreach $segmentation_habits_criterias as $criterias}
									{$criterias}
								{/foreach}
	                    </table>
	                </div>
	        </div>
	    </div>

		<div class="search-container">
			<button class="button-search" type="submit" name="search">Search</button>
		</div>

		<div class="option-buttons">
			<div class="list" onclick="displayListResult()">
				Show list
			</div>

			<div class="csv" onclick="exportCSV()">
		    	Export in CSV
	 		</div>
	 	</div>

	 	<div class="container-result">
			<p class="result-text">{$segmentation_result} results available with the selected criteria.</p>
		</div>

	</form>
	<!--<p style="background-color: #CEF6D8;">{$segmentation_query}</p-->

	<div id="displayList" style="display: none;">
		<table>
			<tr>
				<th>First Name</th>
				<th>Name</th>
				<th>Gender</th>
				<th>Email</th>
				<th>Adresse 1</th>
				<th>Adresse 2</th>
				<th>City</th>
				<th>Poste Code/State</th>
				<th>Country</th>
				<th>Phone Number</th>
				<th>Language</th>
				<th>Age</th>
			</tr>
			{foreach $segmentation_customers as $customer}
			<tr>
				<td>{$customer['firstname']}</td>
				<td>{$customer['lastname']}</td>
				<td>{$customer['gender']}</td>
				<td>{$customer['email']}</td>
				<td>{$customer['addr1']}</td>
				<td>{$customer['addr2']}</td>
				<td>{$customer['city']}</td>
				<td>{$customer['postcode']}</td>
				<td>{$customer['country']}</td>
				<td>{$customer['phone']}</td>
				<td>{$customer['id_lang']}</td>
				<td>{$customer['birthday']}</td>
			</tr>
			{/foreach}
		</table>
	</div>
</div>

<script type="text/javascript">

var data = {$segmentation_json};

function displayDiv(div) {
	if (document.getElementById(div).style.display == 'none') {
		document.getElementById(div).style.display = 'block';
	} else {
		document.getElementById(div).style.display = 'none';
	}
}

function displayResult() {
	document.getElementById("resulttext").style.display = 'block';
}

var expanded = false;

function showCheckboxes(name) {
	var checkboxes = document.getElementById(name);
	if (!expanded) {
		checkboxes.style.display = "block";
		expanded = true;
	} else {
		checkboxes.style.display = "none";
		expanded = false;
	}
}

function displayListResult() {
	if (document.getElementById("displayList").style.display == 'none') {
		document.getElementById("displayList").style.display = 'block';
		document.getElementById("displayList").style.overflow = 'scroll';
	} else {
		document.getElementById("displayList").style.display = 'none';
	}
}

function exportCSV() {
	var csvContent = "data:text/csv;charset=utf-8,";
	console.log(data);
	data.forEach(function(index){
		for(var i = 0; i < arguments.length; ++i)
		{
			console.log(arguments[i]);
 			data.push(arguments[i]);
		}
		var dataString = data.join(',');
   		csvContent += index < data.length ? dataString+ "\n" : dataString;
	});

	var encodedUri = encodeURI(csvContent);
	var link = document.createElement("a");
	link.setAttribute("href", encodedUri);
	link.setAttribute("download", "customers_list.csv");
	document.body.appendChild(link); // Required for FF

	link.click(); // This will download the data file named "my_data.csv".
}

$("input:checkbox").on('click', function() {
		// in the handler, 'this' refers to the box clicked on
		var $box = $(this);
		if ($box.is(":checked")) {
		// the name of the box is retrieved using the .attr() method
		// as it is assumed and expected to be immutable
		var group = "input:checkbox[name='" + $box.attr("name") + "']";
		// the checked state of the group/box on the other hand will change
		// and the current value is retrieved using .prop() method
		$(group).prop("checked", false);
		$box.prop("checked", true);
		} else {
		$box.prop("checked", false);
		}
		});
</script>
