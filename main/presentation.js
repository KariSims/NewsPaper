function afficheAccueil(kID){
    onglets=document.getElementsByClassName("onglet");
    contenus=document.getElementsByClassName("contenu-principal");
    onglets[kID].className="onglets onglet-select";
    
    // for(i=0; i<onglets.length; i++){
    //     // contenus[i].style.display="none";
    // }
}