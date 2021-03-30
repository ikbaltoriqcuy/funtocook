<?php 
$jml = $_GET['jumlah'];
$str  = '';
$str  = $s
echo "<table>
			<tr>
			  <td> Langkah-$jml </td>
			</tr>
			<tr>
			   <td>
				<label>Masukkan Bahan : </label>
			   </td>
			   <td>
				<input type='file' name='bahan' />
			   </td>
			</tr>
		   <tr>
			   <td>
					<label>Alat yang digunakan : </label>
				</td>
				<td> 
					<input type='file' name='alat' />
				</td>
			</tr>
		   <tr>
			   <td> 
				<label>Time :</label>
			   </td>
			   <td>
				<input type='number' name='time'> second</input>
			   </td>
		   <tr/>
		<div id='content'> 
		</div>
			<tr>
			</tr>
		</table> <br/>";
?>