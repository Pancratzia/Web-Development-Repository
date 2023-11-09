if (document.querySelector("#mapa")) {

    const lat = 10.0647;
    const lan = -69.35703
    const zoom = 16;
  let map = L.map("mapa").setView([lat, lan], zoom);

  L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
      '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  }).addTo(map);

  L.marker([lat, lan])
    .addTo(map)
    .bindPopup(`
        <h2 class="mapa__heading">&#60;PankraCamp/></h2>
        <p class="mapa__texto">Sambil, Barquisimeto - Venezuela</p></p>
    `)
    .openPopup();
}
