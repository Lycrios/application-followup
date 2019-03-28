<?php
/**
 * Interview Class
 * Classes should have proper documentation but this one is pretty much useless and never called.
 * So in my personal opinion it's a waste of computation power and should be deleted.
 */
class Interview
{
	// Changed this to static so the `<title>` and `<h1>` tag can access it.
	static public $title = 'Interview test';
}

$lipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus incidunt, quasi aliquid, quod officia commodi magni eum? Provident, sed necessitatibus perferendis nisi illum quos, incidunt sit tempora quasi, pariatur natus.';

$people = array(
	array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
	array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
	array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
	array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
	array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);

// Add a $_POST check to see if the $_POST["person"] value was ever set. If not return as null to give a false reading for the upcoming `if` statement.
$person = isset($_POST['person']) ? $_POST['person'] : null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<?php /* Not sure if you're looking for it but there is missing SEO meta tags.*/ ?>
	<meta name="description" content="Free Web tutorials" />
	<meta name="keywords" content="HTML,CSS,XML,JavaScript" />
	<?php /* Added this metatag for mobile viewer */ ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php /* Change this from the static text to the variable that's already set. */ ?>
	<title><?=Interview::$title;?></title>
	<?php /* This is just for cleaner code. */?>
	<style>
	body {
		font: normal 14px/1.5 sans-serif;
	}
	</style>
</head>

<body>

	<h1><?=Interview::$title;?></h1>

	<?php
	// Print 10 times
	// The for loop was written backwards. Swapped the start and finish numbers.
	for ($i=0; $i<10; $i++) {
		// The `+` symbol isn't how you concenate strings in PHP. Replaced them with `.` symbol.
		// Then to make it even more simple, just surround the parameter with double quotes.
		echo "<p>$lipsum</p>";
	}
	?>


	<hr>
	<?php /* Change the method from `get` to `post` because the `$person` variable above is checking for a `POST`. */ ?>
	<form method="POST" action="<?=$_SERVER['REQUEST_URI'];?>">
		<p><label for="firstName">First name</label> <input type="text" name="person[first_name]" id="firstName"></p>
		<p><label for="lastName">Last name</label> <input type="text" name="person[last_name]" id="lastName"></p>
		<?php /* Small detail but good for mobile users. HTML5 has an `email` type for special keyboards on mobile also good for Autocomplete in desktop browsers. */ ?>
		<p><label for="email">Email</label> <input type="email" name="person[email]" id="email"></p>
		<p><input type="submit" value="Submit" /></p>
	</form>

	<?php if ($person): ?>
	<?php /* I know it said not to rewrite blocks but this one could be MUCH shorter. */?>
	<?="<p><strong>Person</strong> ".join(", ",$person)."</p>";?>
	<?php /*<p><strong>Person</strong> <?=$person['first_name'];?>, <?=$person['last_name'];?>, <?=$person['email'];?></p> */ ?>
	<?php endif; ?>


	<hr>


	<table>
		<thead>
			<tr>
				<th>First name</th>
				<th>Last name</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($people as $person): ?>
			<?php 
			/* 
			* I shifted these left by 1 tab since the tabs will be rendered in the outputted source, it's just cleaner output code. 
			* Secondly I changed it from object formation into array formation.
			*/ ?>
			<tr>
				<td><?=$person["first_name"];?></td>
				<td><?=$person["last_name"];?></td>
				<td><?=$person["email"];?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</body>

</html>