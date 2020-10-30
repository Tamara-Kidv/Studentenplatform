<div id="faqMain">
	<section id="faqUserSearchBox">
		<div>
			<input type="text" id="search" placeholder="Search..." class="searchBarButton">
        	<input type="button" class="searchButton" name="search" value="Go" onclick="search(document.getElementById('search').value)">
        	<input type="button" class="searchButton" name="reset" value="Reset" onclick="document.location.href='template.php?FAQ'">
        </div>	        
	</section>
	<section id="faqQuestions">
		<?php 	
			$questions_array = [
				[
					"title" => "How is NHL Stenden handeling the situation around Covid-19 virus?",
					"description" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)."
				],
				[
					"title" => "Where can I order my books?",
					"description" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)."
				],
				[
					"title" => "How can I see my shedule?",
					"description" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)."
				],
				[
					"title" => "How can I contact my teacher?",
					"description" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)."
				],
				[
					"title" => "What do I need to do when I'm sick?",
					"description" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)."
				]

			];

			$page = "FAQ";

			// Displays the questions
			echo "<div id='searchResults'></div>";

			echo "<div id='FAQ'>";
			foreach ($questions_array as $key => $value) {
				echo "<details class='detailsFAQ'>
							<summary>$value[title]</summary>
							<p>$value[description]</p>
						</details>";
			}
			echo "</div>";
		?>
	</section>
	<script type="text/javascript">
		function search(string){
			var content = document.getElementsByClassName("detailsFAQ");
			var searchValue = string;
			var canvas = document.getElementById("searchResults");
	  		
			for(var i = 0; i < content.length; i++){
			  	if(content[i].innerHTML.indexOf(searchValue) > -1){
			  		canvas.appendChild(content[i]);
			  	}
			}
			document.getElementById("FAQ").style.cssText = 'visibility: hidden';
		}
	</script>
</div>
