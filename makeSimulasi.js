var n= 1;
var k=Array(0,0,0,0,0,0,0,0,0,0);
var str="";
var str2=Array("","","","","","","","","","");
function addItem(){
	n++;
	if (n<=10) {
	str = str + "<div class='langkah'><form action='' method='post' name='makemateri' enctype='multipart/form-data'><table class='tab'>"+
			"<tr>"+
			  "<td> Langkah-"+n+" </td>"+
			"</tr>"+
			"<tr>"+
			   "<td>"+
				"<label>Masukkan Bahan : </label>"+
			   "</td>"+
			   "<td>"+
				"<input type='file' name='bahan' />"+
			   "</td>"+
			"</tr>"+
		   "<tr>"+
			   "<td>"+
					"<label>Alat yang digunakan : </label>"+
				"</td>"+
				"<td>"+ 
					"<input type='file' name='alat' />"+
				"</td>"+
			"</tr>"+
		   "<tr>"+
			   "<td>"+ 
				"<label>Time :</label>"+
			   "</td>"+
			   "<td>"+
				"<input type='number' name='time'> second</input>"+
			   "</td>"+
		   "<tr/>"+
			"<tr>"+
			"</tr>"+
		"</table><div id='lanjut"+n+"'></div> </form><button onClick='lanjut("+n+")'>Tambah Langkah Lanjutan</button></div><br/>";

		document.getElementById('content').innerHTML = str;
	}else{
		alert("Data telah full ");
	}
}


function lanjut(id){
	k[id-1]++;
	if (k[id-1]<=5) {
	str2[id-1] = str2[id-1] + "<table><tr>"+
	              "<td>"+
					"<label>Alat yang digunakan : </label>"+
				"</td>"+
				"<td>"+ 
					"<input type='file' name='alat' />"+
				"</td>"+
					   "<tr>"+
			   "<td>"+ 
				"<label>Time :</label>"+
			   "</td>"+
			   "<td>"+
				"<input type='number' name='time'> second</input>"+
			   "</td>"+
		   "<tr/>"+
				"</tr></table>";

		document.getElementById('lanjut'+id).innerHTML = str2[id-1];
	}else{
		alert("Data telah full ");
	}
}