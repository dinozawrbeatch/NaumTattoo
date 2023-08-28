class Select {
    constructor(values, body, standartTitle) {
        this.choosenValue = null;
        this.values = values;
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
        ${this.values.reduce((acc, value, i) => {
            return acc + `<span
              class="dropdown_item"
              data-index=${i}
            >
              ${value.title}
            </span>\n`;
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
                const index = e.srcElement.dataset.index
                this.changeActualValue(this.values[index], this.values[index].title);
            }
        })

        this.changeActualValue(this.values[0], this.values[0].title)
    }

    changeActualValue(value, title) {
        this.choosenValue = value;
        this.body.querySelector('.choosen').innerHTML = title;
    }
}

const sizeSelect = new Select(
    [
        {baw: '2500', color: '3000', title: 'До 5-6 см'},
        {baw: '5000', color: '6000', title: 'До 10 см'},
        {baw: '7000', color: '8000', title: 'До 15 см'},
        {baw: '9000', color: '10000', title: 'До 20 см'},
        {sessions_baw: '8', sessions_color: '10', title: 'Большой проект (рукав)'},
        {sessions_baw: '9', sessions_color: '11', title: 'Большой проект (ногав)'},
        {sessions_baw: '10', sessions_color: '12', title: 'Большой проект (спина)'},
        {sessions_baw: '10', sessions_color: '12', title: 'Большой проект (торс)'},
    ],
    document.getElementById('size'),
    'Размер тату',
);

const colorSelect = new Select(
    [
        {value: 'true', title: 'Цветная'},
        {value: 'false', title: 'Чёрно-белая'},
    ],
    document.getElementById('color'),
    'Цвет',
);

const typeSelect = new Select(
    [
        {value: '1000', title: 'Удаление перманента ремувером'},
        {value: '/2', title: 'Коррекция'},
    ],
    document.getElementById('type'),
    'Тип макияжа',
);

const procedureSelect = new Select(
    [
        {value: '4000', title: 'Брови по технике "растушевка"'},
        {value: '2500', title: 'Рефреш (обновление) бровей'},
        {value: '3000', title: 'Верх.веко межресничка/стрелка'},
        {value: '3500', title: 'Верх.веко межресничка + стрелка'},
        {value: '3500', title: 'Верх.веко стрелка + растушевка (эффект теней)'},
        {value: '4000', title: 'Стрелка верх.веко + ниж.веко'},
        {value: '800', title: '"Мушка" / родинка'},
    ],
    document.getElementById('procedure'),
    'Процедура',
);

sizeSelect.mount();
colorSelect.mount();
typeSelect.mount();
procedureSelect.mount();

const priceHTML = document.getElementById('total_tattoo_price');
let isTattooChoosen = true;
priceHTML.innerHTML = '0';
const sessionBAWPrice = 9000;
const sessionColorPrice = 10000;

const typeButtons = document.querySelectorAll('.calculator_content .selects .tabs button');
const tattooSelects = document.querySelector('.calculator_content .selects .tattooSelects');
const makeupSelects = document.querySelector('.calculator_content .selects .makeupSelects');

typeButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        typeButtons.forEach(item => item.classList.toggle('active'));
        isTattooChoosen = !isTattooChoosen;
        tattooSelects.classList.toggle('hidden')
        makeupSelects.classList.toggle('hidden')
        priceHTML.innerHTML = 0;
        document.querySelector('.tattoo_price_title').innerHTML = isTattooChoosen ?
            `Тату будет стоить <span class="red">примерно</span>:` : `Макияж будет стоить <span class="red">примерно</span>:`
    });
});

document.getElementById('show_tattoo_price').addEventListener('click', () => {
    let result = 0;

    if (isTattooChoosen) {
        const isColor = colorSelect.choosenValue.value;
        const sizeObject = sizeSelect.choosenValue;
        const sizePriceSmallProject = isColor === 'true' ? sizeObject?.color : sizeObject?.baw;
        const sizePriceBigProject = isColor === 'true' ? Number(sizeObject?.sessions_color) * sessionColorPrice : Number(sizeObject?.sessions_baw) * sessionBAWPrice;
        const size = sizeObject.baw ? sizePriceSmallProject : sizePriceBigProject;
        result += Number(size);
    } else {
        result += Number(procedureSelect.choosenValue.value);
        const type = typeSelect.choosenValue.value;
        if (type === '/2') {
            result /= 2;
        } else {
            result += Number(type)
        }
    }

    let currentPrice = 0;
    const increment = result > 40000 ? 500 : result > 20000 ? 200 : 100
    const updateElement = () => {
        if (currentPrice < result) {
            currentPrice += increment
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
