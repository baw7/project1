<?php
// Create a table from a csv file 
echo "<html><body><table>\n\n";
$f = fopen("so-csv.csv", "r");
while (($line = fgetcsv($f)) !== false) {
        $row = $line[0];    // We need to get the actual row (it is the first
	element in a 1-element array)
	        $cells = explode(";",$row);
		        echo "<tr>";
			        foreach ($cells as $cell) {
				            echo "<td>" .
					    htmlspecialchars($cell) . "</td>";
					            }
						            echo "</tr>\n";
							    }
							    fclose($f);
							    echo
							    "\n</table></body></html>";
							    ?>
