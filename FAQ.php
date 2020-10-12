<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>FAQ</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    	<header>
    		<h1>FAQ</h1>
    	</header>
    	<main id="faqMain">
    		<section id="faqUserSearchBox">	        
    			<form>
		        	<input type="text" name="search" class="searchBar" placeholder="Search...">
		        	<button type="submit"><li class="glyphicon glyphicon-search"></li></button>
		        </form>
		        <select id="faqSelect">
		        	<option>Geen idee</option>
		        </select>
			</section>

			<section id="faqQuestions">
				<?php 	
					$questions_array = [
						[
							"icon" => "glyphicon glyphicon-plus",
							"title" => "How is NHL Stenden handeling the situation around Covid-19 virus?",
							"description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
							"opened" => true
						],
						[
							"icon" => "glyphicon glyphicon-minus",
							"title" => "Where can I order my books?",
							"description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
							"opened" => false
						],
						[
							"icon" => "glyphicon glyphicon-minus",
							"title" => "How can I see my shedule?",
							"description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
							"opened" => false
						],
					];

					// Checks if user clicked on a title
					// Hier zit nog een fout in! opent soms wel soms niet 
					for ($i=0; $i < count($questions_array); $i++) { 
						if (isset($_GET['question'. $i])) {
							$questions_array[$i]['opened'] = !$questions_array[$i]['opened'];
							if ($questions_array[$i]['opened'] === true) {
								echo "true";
								$questions_array[$i]['icon'] = "glyphicon glyphicon-minus";	
							} else {
								$questions_array[$i]['icon'] = "glyphicon glyphicon-plus";
							}
						}
					}


					// Displays the questions
					echo "<ul>";
					foreach ($questions_array as $key => $value) {
						if ($value['opened'] === false) {
							echo "<li class='faqQuestionsItem'>
									<li class='$value[icon]'></li>
									<a name='question$key' href='FAQ.php?question$key'>" . $value['title'] . "</a>
								</li>";
						} else {
							echo "<li class='faqQuestionsItem'>
									<li class='$value[icon]'></li>
									<a name='question$key' href='FAQ.php?question$key'>" . $value['title'] . "</a>
									<p>" . $value['description'] . "</p>
								</li>";
						}
					}
					echo "</ul>";
				?>
			</section>
    	</main>
    	<footer></footer>
    </body>
</html>
