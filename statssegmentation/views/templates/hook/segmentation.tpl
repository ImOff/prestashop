<div class="config-container">
	<div class="header">
		<h4>Welcome to the configuration tab</h4>
		<span>Here you can select the different criteria you need to segment your client base :</span>
	</div>

	<form method="post">

		{foreach $my_module_criterias as $criteria}
			{$criteria}
		{/foreach}

		<div class="search-container">
			<button class="button-search" type="submit" name="search">Search</button>
		</div>
	</form>

	<p>{$my_module_search} results available with the selected criteria.</p>
</div>

<script type="text/javascript">

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

function exportCSV() {
	var data = [["name1", "city1", "some other info"], ["name2", "city2", "more info"]];
	var csvContent = "data:text/csv;charset=utf-8,";
	data.forEach(function(infoArray, index){
			dataString = infoArray.join(",");
			csvContent += index < data.length ? dataString+ "\n" : dataString;
			})
	var encodedUri = encodeURI(csvContent);
	window.open(encodedUri);
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
