<h4>{$my_module_name}</h4>

<p>Date: {$my_module_date}</p>

<form method="post">

{foreach $my_module_criterias as $criteria}
  {$criteria}
{/foreach}

<button type="submit" name="search">Search</button>
</form>

<p>Search: {$my_module_search}</p>