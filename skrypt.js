var ilosc_pol_zalacznikow = 1;
const MAX_ZALACZNIKOW = 3;



function CreateButton() {
   if (ilosc_pol_zalacznikow < MAX_ZALACZNIKOW){
      ilosc_pol_zalacznikow++;

      var nowyPrzycisk = document.createElement('input');
      nowyPrzycisk.setAttribute("type", "file");
      nowyPrzycisk.setAttribute("name", "zalacznik" + ilosc_pol_zalacznikow);
      nowyPrzycisk.setAttribute("onclick", "CreateButton()");

      var nowa_linia = document.createElement('br');

      var pole_zalacznikow = document.getElementById("dodawanie_zalacznikow");
      pole_zalacznikow.appendChild(nowyPrzycisk);
      pole_zalacznikow.appendChild(nowa_linia);
   }
}
