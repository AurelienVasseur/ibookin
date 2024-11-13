// --------- A VOIR POUR SUPPRIMER LES COINS INCURVES ! ---------------------
//  https://codes-sources.commentcamarche.net/forum/affich-1242392-supprimer-une-chaine-dans-une-chaine
//  https://www.journaldunet.fr/web-tech/developpement/1202457-comment-verifier-qu-une-chaine-contient-une-sous-chaine-en-javascript/



function bookSearch(){
	//console.log("this function run!")
	var search = document.getElementById('search').value
	document.getElementById('results').innerHTML = ""
	console.log(search)

	$.ajax({
		url: "https://www.googleapis.com/books/v1/volumes?q=" + search,
		dataType: "json",

		success: function(data) {
			//console.log(data)
			for(i=0; i<data.items.length; i++){
				results.innerHTML += "<h2>" + data.items[i].volumeInfo.title + "</h2>"

				results.innerHTML += '<h5>' + data.items[i].volumeInfo.authors + '<h5>'

				results.innerHTML += '<img id="dynamic" src=' + data.items[i].volumeInfo.imageLinks.thumbnail + '>'

				results.innerHTML +=  '<br/> <a href=' + data.items[i].volumeInfo.infoLink + ' target="blink"> <button id="imagebutton">Read More</button> </a>'
			}
		},

		type: 'GEt'
	});
}

document.getElementById('button').addEventListener('click', bookSearch, false)