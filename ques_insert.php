<div class="wrap4">	
	<form  method="post" name="f1" action="papersubmit.php">
		<table class="table set">
			<tr style="font-family: on; background-color: #196da8; ">
				<th colspan="1" style="border: 3px solid #196da8 ;"><font size="5" color="white" >Set Question for <?php echo $P_NAME?></font></th>
			</tr>
			<br>
			<br>

			<tbody>
				<tr style="font-family: on; background-color: white;">

					<td><label for="cpwd">Question No:&nbsp&nbsp&nbsp</label><input class="textboxx1" type="text" class="form-control" name="<?php echo "qno".$_SESSION['count']?>" value="<?php if($count1>0){echo $ques_no+1;}
					else{
						echo "1";
					}
					?>" required></td>

				</tr>
				<tr style="font-family: on; background-color: white;">

					<td><label for="cpwd">Question:&nbsp&nbsp&nbsp&nbsp</label><input class="textboxx2" type="text" class="form-control" name="<?php echo "ques".$_SESSION['count']?>" placeholder="Question" required></td>

				</tr>
				<tr style="font-family: on; background-color: white;">

					<td><label for="cpwd">Answer 1:&nbsp&nbsp&nbsp</label><input class="textboxx2" type="text" class="form-control" name="<?php echo "ans1".$_SESSION['count']?>" placeholder="Answer 1"required></td>

				</tr>
				<tr style="font-family: on; background-color: white;">

					<td><label for="cpwd">Answer 2:&nbsp&nbsp&nbsp</label><input class="textboxx2" type="text" class="form-control" name="<?php echo "ans2".$_SESSION['count']?>" placeholder="Answer 2" required></td>

				</tr>
				<tr style="font-family: on; background-color: white;">

					<td><label for="cpwd">Answer 3:&nbsp&nbsp&nbsp</label><input class="textboxx2" type="text" class="form-control" name="<?php echo "ans3".$_SESSION['count']?>" placeholder="Answer 3" required></td>


				</tr>
				<tr style="font-family: on; background-color: white;">

					<td><label for="cpwd">Answer 4:&nbsp&nbsp&nbsp</label><input class="textboxx2" type="text" class="form-control" name="<?php echo "ans4".$_SESSION['count']?>" placeholder="Answer 4" required></td>


				</tr>
				<tr style="font-family: on; background-color: white; border-bottom: 4px solid #196da8">

					<td><label for="cpwd">Correct Answer:&nbsp&nbsp&nbsp</label><input class="textboxx1" type="number" class="form-control" name="<?php echo "cans".$_SESSION['count']?>" placeholder="Correct Ans" required></td>

				</tr>

			</tbody>
		</table>
		<button id="btn" type="submit" class="btn btn-primary" name="<?php echo "submit".$_SESSION['count']?>">Submit</button>
		<br>
		<br>
		<br>
		<br>
	</form>
</div>