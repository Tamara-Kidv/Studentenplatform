<div id="faqMain">
	<div id="faqUserSearchBox">
		<div>
			<input type="text" id="search" placeholder="Search..." class="searchbarbutton">
        	<input type="button" class="searchButton" name="search" value="Go" onclick="search(document.getElementById('search').value)">
        	<input type="button" class="searchButton" name="reset" value="Reset" onclick="document.location.href='?FAQ'">
        </div>	        
</div>
	<div id="faqQuestions">
		<?php 	
			$questions_array = [
				[
					"title" => "How is NHL Stenden handling the situation around Covid-19 virus?",
					"description" => "On 19 May, the Dutch government announced a gradual relaxation of the corona measures. However, a number of measures are still very much in effect so as to prevent the further spread of the virus. For instance, because a cold, a cough or a fever may be the first symptoms of coronavirus, people with these symptoms are being asked to stay at home and avoid social contacts as much as possible. The Dutch National Institute for Public Health and the Environment have issued a number of guidelines for everyone to follow. See  <a href='https://www.rivm.nl/en/novel-coronavirus-covid-19'>https://www.rivm.nl/en/novel-coronavirus-covid-19)</a>. Amongst these guidelines are that schools, colleges, universities of applied sciences and universities have all closed their buildings, and travel abroad is severely restricted. </br></br>
						In addition, as NHL Stenden, we have urged our staff and students currently working and studying abroad to return to the Netherlands as soon as possible. With the gradual relaxation of the measures, we are able to provide some forms of face-to-face education with the focus being on those students due to graduate, students with a handicap and students needing to catch up on practicals. After the summer of 2020, the focus will be on connecting with our new first-year students. We will of course be adhering closely to the restrictions and measures then in place. More information about the measures in the Netherlands to prevent the spread of the coronavirus can be found at government.nl."
				],
				[
					"title" => "Where can I order my books?",
					"description" => "The list of books you will need for your study you can find on: <a href='www.studystore.nl'>www.studystore.nl</a>."
				],
				[
					"title" => "How can I see my shedule?",
					"description" => "Through this link you can find your shedule: <a href='https://sa-nhlstenden.xedule.nl/'>https://sa-nhlstenden.xedule.nl/</a></br></br>
					The schedules can vary per week (in terms of day / time and / or classroom). Due to circumstances, the schedule may change after publication. Therefore, check the online timetable regularly. In the top right-hand corner of your timetable it will be stated when the last update took place. Note: College and Test Schedules must be chosen separately."
				],
				[
					"title" => "What do the abbreviations on my schedule mean?",
					"description" => "The first 5 letters indicate the Academy and Education. The class code is determined by the study program and differs per study program.
					The rooms of all buildings of the NHL Stenden Leeuwarden location are shown in the grids as follows:
					<li>The first letter stands for which building.</li>
					<li>The 2nd letter, if present, stands for the zone.</li>
					<li>The first number represents the floor.</li>
					<li>The other numbers after that for the room number.</li>
					<li>Optionally in brackets the type of space + capacity. (no rights can be derived from this)</li>"
				],
				[
					"title" => "How can I securely share large files?",
					"description" => "If you want to share a large file, such as extensive research data or a video, please use Surf filesender. It enables you to send large files securely and encrypted. <a href='https://www.surf.nl/en/surffilesender-send-large-files-securely-and-encrypted'>Visit the Surf filesender website </a>for more information and to send your files."
				]

			];

			$page = "FAQ";

			// Displays the questions
			echo "<div id='searchResult'></div>";

			echo "<div id='FAQ'>";
			foreach ($questions_array as $key => $value) {
				echo "<details class='detailsFAQ'>
							<summary>$value[title]</summary>
							<p>$value[description]</p>
						</details>";
			}
			echo "</div>";
		?>
	</div>
	<script>
		function search(string){
			var content = document.getElementsByClassName("detailsFAQ");
			var searchValue = string;
			var canvas = document.getElementById("searchResult");
	  		
			for(var i = 0; i < content.length; i++){
			  	if(content[i].innerHTML.indexOf(searchValue) > -1){
			  		canvas.appendChild(content[i]);
			  	}
			}
			document.getElementById("FAQ").style.cssText = 'visibility: hidden';
		}
	</script>
</div>
