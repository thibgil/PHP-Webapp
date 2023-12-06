/**
 * On a une fonction pour récupérer le JSON des messages et
 * les afficher correctement à l'écran
 */
function getMessages(){
    //créer une requete AJAX pour se co au serveur et au fichier loadMessages.php
    const requeteAjax = new XMLHttpRequest();
    //parametrage avant envoie (type de requete, fichier visé)
    requeteAjax.open("GET", "messagerie.scripts/loadMessages.php");

    //quand les données sont reçues, il faut les traiter en exploitant
    //le JSON et en les affichant en HTML
    requeteAjax.onload = function(){ //lorsque que le serveur communique
        const resultat = JSON.parse(requeteAjax.responseText); //réponse du serveur retransmis en JSON
        
        //affichage des données receuillies en HTML
        const html = resultat.reverse().map(function(message){
            return `
                <div class="message">
                    <span class="date">${message.date.substring(11, 16)}</span>
                    <span class="user">${message.pseudo}: </span>
                    <span class="description">${message.message}</span>
                </div>
            `
        }).join(''); //relie les JSON ensemble pour afficher correctement
        
        //place notre contenu HTML dans la division de class .messages
        const messages = document.querySelector(".messages");
        messages.innerHTML = html;
        
        //auto scroll
        messages.scrollTop = messages.scrollHeight;
    }
    //envoi de la requete
    requeteAjax.send();
}

/**
 * On a une fonction pour envoyer un message au serveur
 * et rafraichir la page
 */
function postMessage(event){

    //stoppe le form post
    event.preventDefault();
    
    //Récupérer les données du formulaire
    const message = document.querySelector('#messageForm');

    //conditionner les données
    const data = new FormData();
    data.append('description', message.value);

    //Configurer une requete AJAX en POST pour envoyer les données
    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open('POST', 'messagerie.scripts/loadMessages.php?task=write');

    //quand la requete sera envoyée ce code s'executera
    requeteAjax.onload = function() {
        message.value = '';
        message.focus();
        getMessages();
    }

    //envoi de la requete
    requeteAjax.send(data);
}

//Event Listener pour executer notre requete post quand le bouton envoi est cliqué
document.querySelector('.formChat').addEventListener('submit', postMessage);

/**
 * Il nous faut une intervale qui demande le rafraichissement
 * des messages toutes les 3 secondes et qui donne 
 * l'illusion du temps réel.
 */
 const interval = window.setInterval(getMessages, 3000);
 getMessages();