const commonSettings = {
  type: 'loop',
  drag: true,
  snap: true,
  speed: 1000,
  perMove: 1,
  pagination: false,
  autoWidth: true,
  touchMove: false,
}

new Splide('.splide_masters', {
  ...commonSettings,
  perPage: 3,
  gap: 30,
  fixedWidth: 370,
  fixedHeight: 600,
  breakpoints: {
    1600: {
      perPage: 2,
      fixedWidth: 310,
      fixedHeight: 500,
    },
    768: {
      perPage: 1,
      arrows: false
    },
  }
}).mount();

new Splide('.splide_reviews', {
  ...commonSettings,
}).mount();

new Splide('.splide_products', {
  ...commonSettings,
  perPage: 5,
  gap: 30,
  breakpoints: {
    1600: {
      perPage: 3,
    },
    1024: {
      perPage: 2,
    },
    768: {
      arrows: false
    },
  }
}).mount();

function initMap() {
  const map = new ymaps.Map("yandexmap", {
    center: [56.844402, 53.226438],
    zoom: 18
  });
  const marker = new ymaps.Placemark([56.844402, 53.226438], {
    hintContent: 'Расположение',
    balloonContent: 'NaumTattoo'
  });
  map.geoObjects.add(marker);
}

ymaps.ready(initMap);

new WOW().init();

const masterModal = document.getElementById('master_modal');
const closeMasterModalButton = document.getElementById('close_modal');
const masterModalName = masterModal.querySelector('.master_name');

document.querySelectorAll('.master').forEach(item => {
  item.addEventListener('click', e => {
    masterModal.classList.remove('hidden');
    masterModalName.innerHTML = item.querySelector('h2').innerHTML;
  });
});

masterModal.addEventListener('click', e => {
  if (!(e.target.classList.contains('layout') || e.target.id === 'master_modal')) return;
  masterModal.classList.add('hidden');
});

closeMasterModalButton.addEventListener('click', () => {
  masterModal.classList.add('hidden');
});