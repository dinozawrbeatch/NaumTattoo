class Select {
  constructor(values, body, onChangeCallback, standartTitle) {
    this.choosenValue = null;
    this.values = values;
    this.onChange = onChangeCallback;
    this.body = body;
    this.standartTitle = standartTitle;
  }

  mount() {
    this.body.innerHTML = `
      <span class="choosen">
        ${this.standartTitle}
      </span>
      <img src="./images/open-icon.png" loading="lazy" alt="open" />
      <div class="dropdown_select">
        ${
          this.values.reduce((acc, value) => {
            return acc + `<span class="dropdown_item" data-value="${value.value}">${value.title}</span>\n`;
          }, '')
        }
      </div>
    `
    const dropdown = this.body.querySelector('.dropdown_select');
    this.body.addEventListener('click', e => {
      document.querySelectorAll('.custom_select').forEach(item => {
        if (item === this.body) return;
        item.classList.remove('active_select');
      });
      this.body.classList.toggle('active_select');
    })
    dropdown.addEventListener('click', e => {
      if (e.srcElement.classList.contains('dropdown_item')) {
        this.changeActualValue(e.srcElement.dataset.value, e.srcElement.innerHTML);
      }
    })
  }

  changeActualValue(value, title) {
    this.choosenValue = value;
    this.body.querySelector('.choosen').innerHTML = title;
  }
}

const sizeSelect = new Select(
  [
    { value: '1000', title: 'Маленькая' },
    { value: '2000', title: 'Средняя' },
    { value: '3000', title: 'Большая' },
    { value: '4000', title: 'Рукав' },
  ],
  document.getElementById('size'),
  () => { },
  'Размер тату',
)

const colorSelect = new Select(
  [
    { value: '1000', title: 'Цветная' },
    { value: '2000', title: 'Чёрно-белая' },
  ],
  document.getElementById('color'),
  () => { },
  'Цвет',
);

const locationSelect = new Select(
  [
    { value: '1000', title: 'Шея' },
    { value: '2000', title: 'Спина' },
    { value: '3000', title: 'Рука' },
    { value: '4000', title: 'Нога' },
    { value: '5000', title: 'Живот' },
    { value: '6000', title: 'Грудь' },
  ],
  document.getElementById('location'),
  () => { },
  'Место нанесения',
)

const typeSelect = new Select(
  [
    { value: '1000', title: 'Новая' },
    { value: '2000', title: 'Перекрытие' },
  ],
  document.getElementById('type'),
  () => { },
  'Тип тату',
)

sizeSelect.mount()
colorSelect.mount()
locationSelect.mount()
typeSelect.mount()

const priceHTML = document.getElementById('total_tattoo_price');
priceHTML.innerHTML = '0';

document.getElementById('show_tattoo_price').addEventListener('click', () => {
  let result = 0;
  const selects = [sizeSelect, colorSelect, locationSelect, typeSelect];
  selects.forEach(select => {
    if (select.choosenValue) result += Number(select.choosenValue);
  });

  let currentPrice = 0;
  const updateElement = () => {
    if (currentPrice < result) {
      currentPrice += 100
    } else {
      currentPrice = result;
      priceHTML.innerHTML = currentPrice.toString();
      return;
    }
    priceHTML.innerHTML = currentPrice.toString();
    requestAnimationFrame(updateElement);
  }

  requestAnimationFrame(updateElement);
});